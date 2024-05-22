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
                <div class="d-flex justify-content-between mb-2">
                    <input type="text" id="searchInput" class="form-control" placeholder="Rechercher..." style="width: 80%;">
                    <button id="printButton" class="btn btn-primary">Imprimer</button>
                </div>
                <div class="table-responsive" id="tablesContainer">
                    @php
                        $sortedAthletes = $athcomps->flatten()->where('validation', 'accept')->sortBy(function($athcomp) {
                            return $athcomp->athletes->min('temp_eng');
                        });
                        $chunkedAthletes = $sortedAthletes->chunk(8);
                    @endphp
                    @foreach ($chunkedAthletes as $chunkIndex => $chunk)
                        <table class="table table-hover mb-4 chunk-table" id="dataTable-{{ $chunkIndex }}">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Titre competition</th>
                                    <th>Club</th>
                                    <th>Athlete</th>
                                    <th>Genre</th>
                                    <th>Epreuve</th>
                                    <th>Session de competition</th>
                                    <th>Temp d'engagement</th>
                                    <th>Validation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chunk as $athcomp)
                                    @foreach ($athcomp->athletes->sortBy('temp_eng') as $athlete)
                                        <tr style="text-align: center;">
                                            <td>
                                                @foreach ($athcomp->competitions as $competition)
                                                    {{ $competition->titre }}
                                                @endforeach
                                            </td>
                                            <td>{{ $athlete->club_name }}</td>
                                            <td>{{ $athlete->nom }}</td>
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
                                                @foreach ($athcomp->competitions as $competition)
                                                    {{ $competition->sessions }}
                                                @endforeach
                                            </td>
                                            <td>{{ $athlete->temp_eng }}</td>
                                            <td>{{ $athcomp->validation }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#tablesContainer tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $('#printButton').on('click', function() {
            var originalContent = document.body.innerHTML;
            var printContent = document.getElementById('tablesContainer').innerHTML;

            document.body.innerHTML = '<html><head><title>Print</title></head><body>' + printContent + '</body></html>';
            window.print();
            document.body.innerHTML = originalContent;
        });
    });
</script>
