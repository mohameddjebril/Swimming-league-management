@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Athletes competition</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des athletes competition</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
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
                                <th>Titre competition</th>
                                <th>Session de competition</th>
                                <th>Genre</th>
                                <th>Epreuve</th>
                                <th>Athlete</th>
                                <th>Temp d'engagement</th>
                                <th>Club</th>
                                <th>validation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($athcomps as $athcomp)
                                @if($athcomp->validation == 'en attente')
                                    <tr style="text-align: center;">
                                        <td>
                                            @foreach ($athcomp->competitions as $competition)
                                                {{ $competition->titre }} || {{ $competition->categorie }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->competitions as $competition)
                                                {{ $competition->sessions }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->competitions as $competition)
                                                {{ $competition->genre }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->competitions as $competition)
                                                @foreach ($competition->epreuves as $epreuve)
                                                    {{ $epreuve->nomEPR }}  {{ $epreuve->distance }}  {{ $epreuve->description }}
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->athletes as $athlete)
                                                {{ $athlete->nom }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->athletes as $athlete)
                                                {{ $athlete->temp_eng }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($athcomp->athletes as $athlete)
                                                {{ $athlete->club_name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $athcomp->validation}}</td>
                                        <td>
                                            <a class="btn text-info" href="{{ url('/admin/Accept_athcomps', $athcomp->id) }}">
                                                <i class="bi bi-check-circle"></i>
                                            </a>
                                            <a class="btn text-danger" href="{{ url('/admin/Reject_athcomps', $athcomp->id) }}">
                                                <i class="bi bi-x-circle"></i>
                                            </a>
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
