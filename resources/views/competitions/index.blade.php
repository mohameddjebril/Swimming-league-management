@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">competitions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des competitions</li>
    </ol>
</nav>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="inovo-button">
                <a  href="{{ route('competitions.create') }}" class="btn btn-info btn-rounded">Ajouter<i class="fas fa-user-plus"></i></a>
             </div>
            </div>
        <div class="card-body">
<div class="table-responsive">
  <table id="dataTableExample" class="table table-hover">
    <thead>
       @if (session()->has('success'))
    <div id="successMessage" class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
@endif
@if (session()->has('error'))
<div id="successMessage" class="alert alert-danger text-center my-2">{{ session()->get('error') }}</div>
@endif
<tr style="text-align: center;">
            <th>titre</th>
            <th>date_debut</th>
            <th>date_fin</th>
            <th>delai d'inscription</th>
            <th>Session</th>
            <th>genre</th>
            <th>Categorie</th>
            <th>lieu</th>
            <th>Epreuve</th>
            <th>Actions</th>
        
</tr>
    </thead>
    <tbody>
    @foreach ($competitions as $competitions)
    <tr style="text-align: center;">
                <td>{{ $competitions->titre }}</td>
                <td>{{ $competitions->date_debut }}</td>
                <td>{{ $competitions->date_fin }}</td>
                <td>{{ $competitions->delaiinsc }}</td>
                <td>{{ $competitions->sessions}}</td>
                <td>{{ $competitions->genre}}</td>
                <td>{{ $competitions->categorie}}</td>
                <td>{{ $competitions->lieu}}</td>
                <td>
                    @foreach ($competitions->epreuves as $epreuve)
                        {{ $epreuve->nomEPR }}  {{ $epreuve->distance }}  {{ $epreuve->description }}
                    @endforeach
                </td>
                <td>
                    <a class="btn text-info" href="{{ route('competitions.edit', $competitions->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $competitions->id }}">
                        <i class="bi bi-trash"></i>
                    </button>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirmationModal{{$competitions->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette competition
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    
                    <!-- Form to delete presidents -->
                    <form action="{{ route('competitions.destroy', $competitions->id) }}" method="post">
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
@section('scripts')

@endsection
























