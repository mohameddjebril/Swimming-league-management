@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Epreuves</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des epreuves</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="inovo-button">
                    <a href="{{ route('epreuves.create') }}" class="btn btn-info btn-rounded">Ajouter</a>
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div id="successMessage" class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('error'))
                    <div id="successMessage" class="alert alert-danger text-center my-2">{{ session()->get('error') }}</div>
                @endif

                <div class="table-responsive">
                    <h5>Individuel Epreuves</h5>
                    <table id="dataTableIndividual" class="table">
                        <thead>
                            <tr style="text-align: center;">
                                {{-- <th>Type</th> --}}
                                <th>Nom épreuve</th>
                                <th>Distance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($epreuves as $epreuve)
                                @if ($epreuve->typeEpr == 'individual')
                                    <tr style="text-align: center;">
                                        {{-- <td>{{ $epreuve->typeEpr }}</td> --}}
                                        <td>{{ $epreuve->nomEPR }}</td>
                                        <td>
                                            @if(is_array(explode(', ', $epreuve->distance)))
                                                @foreach (explode(', ', $epreuve->distance) as $distance)
                                                    {{ $distance }},
                                                @endforeach
                                            @else
                                                {{ $epreuve->distance }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn text-info" href="{{ route('epreuves.edit', $epreuve->id) }}"><i class="bi bi-pencil-square"></i></a>
                                            <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $epreuve->id }}"><i class="bi bi-trash"></i></button>
                                            <div class="modal fade" id="deleteConfirmationModal{{ $epreuve->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Vous êtes sûr de vouloir supprimer cette épreuve ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('epreuves.destroy', $epreuve->id) }}" method="post">
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


                
                <div class="table-responsive mt-5">
                    <h5>Collectif Epreuves</h5>
                    <table id="dataTableCollective" class="table">
                        <thead>
                            <tr style="text-align: center;">
                                <th>Type</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($epreuves as $epreuve)
                                @if ($epreuve->typeEpr == 'collective')
                                    <tr style="text-align: center;">
                                        <td>{{ $epreuve->typeEpr }}</td>
                                        <td>{{ $epreuve->description }}</td>
                                        <td>
                                            <a class="btn text-info" href="{{ route('epreuves.edit', $epreuve->id) }}"><i class="bi bi-pencil-square"></i></a>
                                            <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $epreuve->id }}"><i class="bi bi-trash"></i></button>
                                            <div class="modal fade" id="deleteConfirmationModal{{ $epreuve->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Vous êtes sûr de vouloir supprimer cette épreuve ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('epreuves.destroy', $epreuve->id) }}" method="post">
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
