<x-layout>
<div class="container">
    <div class="row d-none d-lg-flex my-5 justify-content-between">
        @if(count($announcements)>0)
        <h1>Ecco i risultati della ricerca: </h1>
        @endif
        @forelse($announcements as $announcement)
        <div class="col-4">
            <x-card :announcement="$announcement"/>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">
                <p class="lead">Non ci sono annunci per questa ricerca</p>
            </div>
        </div>
        @endforelse
    </div>

     {{-- CAROSELLO --}}
     <div class="row d-lg-none">
        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">              
                @forelse($announcements as $announcement)
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

    {{ $announcements->links() }}
</div>
</x-layout>