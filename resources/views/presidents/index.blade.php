@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Presidents</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des presidents</li>
    </ol>
</nav>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="inovo-button">
                <a  href="{{ route('presidents.create') }}" class="btn btn-info btn-rounded">Ajouter</a>
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
    <th>#</th>
    <th>Nom</th>
    <th>n_telephone</th>
    <th>Email</th>
    <th>Adress</th>
    <th>Action</th>
</tr>
    </thead>
    <tbody>
     @foreach ($presidents as $presidents)
    <tr>
        <td>{{ $presidents->id }}</td>
        <td>{{ $presidents->nom }}</td>
        <td>{{ $presidents->n_telephone }}</td>
        <td>{{ $presidents->email }}</td>
        <td>{{ $presidents->adress }}</td>
        <td>
            <a class="btn text-info" href="{{ route('presidents.edit', $presidents->id) }}"   ><i class="bi bi-pencil-square"></i></a>
            <!-- Button to trigger modal -->
            <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $presidents->id }}">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteConfirmationModal{{ $presidents->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
                            
                            <!-- Form to delete presidents -->
                            <form action="{{ route('presidents.destroy', $presidents->id) }}" method="post">
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
@endforeach
    </tbody>
  </table>
</div>
</div>
</div>
 </div> 

</div>
@endsection
