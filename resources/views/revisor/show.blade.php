<x-layout>


    <div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <h1 class="text-center">{{$announcement ? "Ecco l'annuncio da revisionare" : "Non ci sono annunci da revisionare"}}</h1>
    <div class="container my-5 cardDetail">
        <div class="row">
            <div class="col-12 col-md-6 p-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if (count($announcement->images)>0)
                            @foreach($announcement->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{ $image->getUrl(400,300) }}" class="d-block w-100" alt="...">
                            </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200" class="d-block w-100" alt="...">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center ps-md-3">
                <div class="container border mt-4 p-1">
                    <div class="row">
                        <h4 class="text-center">Revisione Immagini</h4>
                        <div class="col-6">
                            <p>Adulti: <i class="{{ $image->adult }}"></i> </p>
                            <p>Satira: <i class="{{ $image->spoof }}"></i> </p>
                            <p>Medicina: <i class="{{ $image->medical }}"></i> </p>
                        </div>
                        <div class="col-6">
                            <p>Violenza: <i class="{{ $image->violence }}"></i> </p>
                            <p>Contenuti ammiccanti: <i class="{{ $image->racy }}"></i> </p>
                        </div>
                    </div>
                    <h4 class="text-center">Tags</h4>
                    <div class="row">
                                @if($image->labels)
                                    @foreach($image->labels as $label)
                                    <p class="col-2">{{ $label }}</p>
                                    @endforeach
                                @endif
                    </div>
                </div>
                <h1 class="my-5">{{ $announcement->title }}</h1>
                <p>{{ $announcement->body }}</p>
                <p class="prezzo fs-2">€ {{ $announcement->price }}</p>
                <p>{{$announcement->created_at->timezone('Europe/Rome')->format('d/m/y H:i:s') }}</p>
                <p>Author: {{ $announcement->user->name }}</p>
            </div>
        </div>
        <div class="row d-flex mb-3">
         <div class="col-6 d-flex justify-content-center">
            <form action="{{route('revisor.accept_announcement', ["announcement"=>$announcement,'value'=>'false'])}}" method='POST'>
                @csrf
                @method('PATCH')
                <button type='submit' class="btn btn-success shadow">Accetta</button>
            </form>
         </div>
         <div class="col-6 d-flex justify-content-center">
            <form action="{{route('revisor.reject_announcement', ["announcement"=>$announcement,'value'=>'false'])}}" method='POST'>
               @csrf
               @method('PATCH')
               <button type='submit' class="btn btn-danger shadow">Rifiuta</button>
           </form>
        </div>
        </div>
    </div>


</x-layout>
