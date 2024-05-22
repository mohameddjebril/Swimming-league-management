@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Clubs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des clubs</li>
    </ol>
</nav>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="inovo-button">
                <a  href="{{ route('clubs.create') }}" class="btn btn-info btn-rounded">Ajouter</a>
             </div>
            </div>
        <div class="card-body">
      <div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
       @if (session()->has('success'))
    <div id="successMessage" class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
@endif
@if (session()->has('error'))
<div id="successMessage" class="alert alert-danger text-center my-2">{{ session()->get('error') }}</div>
@endif
<tr>
    {{-- <th>#</th> --}}
    <th>Nom</th>
    <th>Abriviation</th>
    <th>Email</th>
    <th>n tele</th>
    <th>Adress</th>
    {{-- <th>Role</th> --}}
    <th>President</th>
    <th>Action</th>
</tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        @if ($user->role === 'agent')
            <tr>
                {{-- <td>{{ $loop->index +1 }}</td> --}}
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                {{-- <td>{{ $user->role }}</td> --}}
                <td>
                    @foreach ($user->presidents as $president)
                        {{ $president->nom }} 
                    @endforeach
                </td>
                <td>
                    <a class="btn text-info" href="{{ route('clubs.edit', [$user->id]) }}"><i class="bi bi-pencil-square"></i></a>
                    <!-- Button to trigger modal -->
                    <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $user->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteConfirmationModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer ces présidents ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <form action="{{ route('clubs.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endif
    @endforeach    
    </tbody>
  </table>
</div>
</div>
</div>
 </div> 

</div>
@endsection
