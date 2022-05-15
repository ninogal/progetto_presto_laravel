<x-layout>
    <div class="container my-5 cardDetail">
        <div class="row align-items-center">
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
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
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
            <div class="col-12 col-md-6 ps-md-3">
                <h1 class="my-3">{{ $announcement->title }}</h1>
                <p class="my-3">{{ $announcement->body }}</p>
                <p class="prezzo fs-2 my-3">€ {{ $announcement->price }}</p>
                <span class="tag tag-color my-5">{{ $announcement->category->name }}</span>
                <div class="float-end pt-3 mt-5 me-3">
                    <p>{{$announcement->created_at->timezone('Europe/Rome')->format('d/m/y H:i:s') }}</p>
                    <p>Author: {{ $announcement->user->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-none d-lg-flex">
        <div class="row">
            <h1>Gli ultimi annunci di questa categoria: </h1>
            @foreach($relateds as $related)
            <div class="col-4 d-flex">
                <x-card :announcement="$related"/>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row d-lg-none">
        <div id="carouselExampleControls" class="carousel carousel-dark slide " data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($relateds as $related)
                <div class="carousel-item  @if($loop->first) active @endif">
                    <x-card :announcement="$announcement"/>
                </div>
                @empty
                <p class="lead">Non ci sono annunci per questa ricerca</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</x-layout>
