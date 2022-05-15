<x-layout>
    <div class="container my-5">
        @if(count($announcements)> 0)
        <h1>Ecco gli annunci per la categoria: {{ $announcements->first()->category->name }}</h1>
        @endif
        <div class="row">
            @forelse($announcements as $announcement)
            <div class="col-4">
                <x-card :announcement="$announcement"/>
            </div>
            @empty
            <div class="col-12">
                <h1 class="text-center"><b>Nessun annuncio presente</b></h1>
                <h2 class="text-center mt-5"><b>Pubblicane uno!</b></h2>
                <div class="text-center my-5"> <a href="{{ route('announcements.create') }}" class="btn btn-primary w-25">Crea annuncio</a></div>
                <img class="w-25" src="/img/confused.png" alt="">
            </div>
            @endforelse
        </div>
        {{ $announcements->links() }}
    </div>
</x-layout>
