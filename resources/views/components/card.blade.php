{{-- <div class="col-12 col-lg-4 d-flex justify-content-center">
    <div class="card my-3" style="width: 25em;">
        <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" class="card-img-top" alt="{{ $announcement->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $announcement->title }}</h5>
            <p class="card-text">{{ strlen($announcement->body) > 10 ? (substr($announcement->body, 0,10) . "...") : $announcement->body }}</p>
            <span class="d-flex justify-content-center">
                <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-card">Visualizza</a>
            </span>
        </div>
    </div>
</div>

--}}
{{-- <div class="card px-0">
    <div class="card-header">
        <a href="{{ route('announcements.show', compact('announcement')) }}">
            <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="rover"/>
        </a>
    </div>
    <div class="card-body">
        <span class="tag tag-color">{{ $announcement->category->name }}</span>
        <a class="text-decoration-none" href="{{ route('announcements.show', compact('announcement')) }}">
            <h4 class="mt-3" >{{ $announcement->title }}</h4>
        </a>
        <p class="prezzo fw-bold">€ {{ $announcement->price }}</p>
        <div class="card-footer">
            <small class="text-muted">Creato: {{ $announcement->created_at->timezone('Europe/Rome')->diffForHumans() }}</small>
        </div>
    </div>
</div> --}}


<div class="card my-3">
    <a href="{{ route('announcements.show', compact('announcement')) }}">
        <img class="card-img-top" src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200' }}" alt="rover"/>
    </a>
    <div class="card-body m-2">
        <span class="tag tag-color">{{ $announcement->category->name }}</span>
        <a class="text-decoration-none" href="{{ route('announcements.show', compact('announcement')) }}">
            <h5 class="mt-3 text-dark text-uppercase" >{{ $announcement->title }}</h5>
        </a>
        <p class="card-text">{{ strlen($announcement->body) > 35 ? (substr($announcement->body, 0,35) . "...") : $announcement->body }}</p>
        <p class="prezzo fw-bold">€ {{ $announcement->price }}</p>
    </div>
    <div class="card-footer footer-color">
        <small class="text-white float-end">Creato: {{ $announcement->created_at->timezone('Europe/Rome')->diffForHumans() }}</small>
    </div>
</div>
