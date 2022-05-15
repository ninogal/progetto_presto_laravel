<x-layout>
    <x-slot name="title">Homepage</x-slot>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif


    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <img class="img-fluid" src="/img/logo.png" alt="">
                </div>
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-12 col-md-6">
                        <form class="d-flex mainSearch" action="{{ route('announcements.search') }}" method="GET">
                            <input class="form-control form-control-2" name="searched" type="search" placeholder="search...">
                            <button class="icon" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </header>


    <!--SEARCH BAR-->
    <div class="container">
        <section id="cardSection">
            <div class="container my-5">
                <div class="row d-none d-lg-flex my-5 justify-content-between">
                    <h1 class="text my-3 py-3">{{ __('navbar.ourads')}}</h1>
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
                    <div id="carouselExampleControls" class="carousel carousel-dark slide " data-bs-ride="carousel">
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
            </div>
        </div>
    </section>

</x-layout>
