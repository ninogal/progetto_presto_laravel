<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $category=1;
    public $price;
    public $temporary_images;
    public $images=[];
    public $announcement;

    protected $rules = [
      'title' => "required|min:4|max:25",
      'body' => "required|min:4|max:300",
      'category' => "required",
      'price' => "required",
      'images.*' => "image|required|max:2048",
      'temporary_images.*' => "image|required|max:2048",
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è obbligatorio',
        'min' => 'Il campo :attribute è troppo corto',
        'max' => 'Il campo :attribute è troppo lungo',
        'images.*.image' => 'Il file dev\'essere un\'immagine',
        'temporary_images.*.image' => 'Il file dev\'essere un\'immagine',
        'temporary_images.*.max' => 'Il file è troppo grande',
    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|required|max:2048'
        ])){
            foreach ($this->temporary_images as $image){
                $this->images[]=$image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->validate();

        $category = Category::find($this->category);

        $this->announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price'=> $this->price,
            'user_id'=> Auth::id()
        ]);

        if(count($this->images)){
            foreach($this->images as $image){
                /*$this->announcement->images()->create(["path"=>$image->store("images", "public")]);*/
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(["path"=>$image->store($newFileName, 'public')]);
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->cleanForm();

        session()->flash('message', "Post creato con successo");

    }

    protected function cleanForm(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->temporary_images = '';
        $this->images = [];

    }

    public function render()
    {
        return view('livewire.create-announcement');
    }


}
