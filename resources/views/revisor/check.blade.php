<x-layout>
 <div>
     @if(session()->has('message'))
     <div class="alert alert-success">
         {{ session('message') }}
     </div>
     @endif
 </div>
 <h1 class="text-center">index degli annunci</h1>
 <div class="container my-3">
  <div class="row">
      <div class="col-12">
         <a href="{{route('revisor.index')}}" class="btn btn-dark my-3">Articoli da revisionare</a>
      </div>
  </div>
</div>
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
                     <td>{{$announcement->title}} <i class="{{ $announcement->is_accepted ? "bi bi-check2-circle text-success" : "bi bi-x-circle text-danger"}}"></i> </td>
                     <td>{{$announcement->user->name}}</td>
                     <td>{{$announcement->created_at->timezone('Europe/Rome')->format('d/m/y') }}</td>
                     <td class="d-flex justify-content-between">
                       <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary">Visualizza</a>
                       <form action="{{route('revisor.undo_announcement', ["announcement"=>$announcement])}}" method='POST'>
                        @csrf
                        @method('PATCH')
                        <button type='submit' class="btn btn-dark shadow">Undo</button>
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
 
</x-layout>
