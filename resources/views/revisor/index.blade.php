<x-layout>
    <div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <h1 class="text-center my-5">{{(App\Models\Announcement::toBeRevisionedCount()) > 0 ? "Ecco gli annunci da revisionare" : "Non ci sono annunci da revisionare"}}</h1>
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <a href="{{route('revisor.check')}}" class="btn btn-dark my-3">Indice Articoli</a>
            </div>
        </div>
    </div>
    @if((App\Models\Announcement::toBeRevisionedCount()) > 0)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Autore</th>
                            <th scope="col">Creato il</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($announcements as $announcement)
                          <tr>
                            <th scope="row">{{$announcement->id}}</th>
                            <td>{{$announcement->title}}</td>
                            <td>{{$announcement->user->name}}</td>
                            <td>{{$announcement->created_at->timezone('Europe/Rome')->format('d/m/y') }}</td>
                            <td class="d-flex justify-content-between">
                                <a href="{{ route('revisor.show', compact('announcement')) }}" class="btn btn-primary">Visualizza</a>
                                <form action="{{route('revisor.accept_announcement', ["announcement"=>$announcement, 'value'=>'true'])}}" method='POST'>
                                    @csrf
                                    @method('PATCH')
                                    <button type='submit' class="btn btn-success shadow">Accetta</button>
                                </form>
                                <form action="{{route('revisor.reject_announcement', ["announcement"=>$announcement, 'value'=>'true'])}}" method='POST'>
                                    @csrf
                                    @method('PATCH')
                                    <button type='submit' class="btn btn-danger shadow">Rifiuta</button>
                                </form>
                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>

            </div>
        </div>
        {{ $announcements->links() }}
    </div>
    @else

    @endif

</x-layout>
