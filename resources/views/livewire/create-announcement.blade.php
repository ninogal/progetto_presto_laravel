<div>
    <div class="container my-4 border border-2">
        <div class="row m-5">
            <div class="col-12 col-md-6">
                <form wire:submit.prevent="create">
                    <div>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Titolo dell'annuncio</label>
                        <input wire:model="title" type="text" class="form-control">
                        @error('title') <span class= 'error'>{{$message}}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Testo dell'annuncio</label>
                        <textarea wire:model="body" class="form-control" cols="30" rows="10"></textarea>
                        @error('body') <span class= 'error'>{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Prezzo</label>
                        <input wire:model="price" type="number" class="form-control">
                        @error('price') <span class= 'error'>{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoria dell'annuncio</label>
                        <select wire:model.defer="category" class="form-control">
                            <option selected="true" disabled >Scegli la categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category') <span class= 'error'>{{$message}}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Carica immagini</label>
                        <input wire:model="temporary_images" type="file" name="images"  multiple class="form-control @error("temporary_images.*") is-invalid @enderror"
                        placeholder="Img"/>
                        @error('temporary_images.*') <span class= 'error'>{{$message}}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Pubblica</button>
                </form>
            </div>
            @if(!empty($images))
            <div class="col-12 col-md-6">
                <p class="fw-bold">Photo preview</p>
                <div class="border">
                    <div class="row">
                        @foreach($images as $key=>$image)
                        <div class="col-6 my-3">
                            <div class="image-preview mx-auto rounded" style="background-image: url({{ $image->temporaryUrl() }});"></div>
                            <button type="button" class="btn btn-danger d-block mt-2 mx-auto" wire:click="removeImage({{ $key }})">Delete</button>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
