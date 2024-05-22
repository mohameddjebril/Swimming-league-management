@extends('agent.agentdashboard')
@section('agent')
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
                @if (session()->has('success'))
                    <div id="successMessage" class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('error'))
                    <div id="successMessage" class="alert alert-danger text-center my-2">{{ session()->get('error') }}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover">
                        <thead>
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
                            @foreach ($competitions as $competition)
                                <tr style="text-align: center;">
                                    <td>{{ $competition->titre }}</td>
                                    <td>{{ $competition->date_debut }}</td>
                                    <td>{{ $competition->date_fin }}</td>
                                    <td>{{ $competition->delaiinsc }}</td>
                                    <td>{{ $competition->sessions }}</td>
                                    <td>{{ $competition->genre }}</td>
                                    <td>{{ $competition->categorie}}</td>
                                    <td>{{ $competition->lieu}}</td>
                                    <td>
                                        @foreach ($competition->epreuves as $epreuve)
                                            {{ $epreuve->nomEPR }}  {{ $epreuve->distance }}  {{ $epreuve->description }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('athcomps.inscricomp') }}" class="btn btn-primary">Inscrire</a>
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
