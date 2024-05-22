@extends('agent.agentdashboard')

@section('agent')

<div class="row profile-body">
    <div class="d-none d-md-block col-md-7 col-xl-7 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Athletes</h6>
                    <form method="POST" action="{{ route('athcomps.store') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Titre competition</label>
                            <select class="form-control" id="competitionSelect" name="competitions[]" placeholder="titre">
                                <option selected disabled value="">Titre competition</option>
                                @foreach ($competitions as $competition)
                                <option value="{{ $competition->id }}" data-sessions="{{ $competition->sessions }}" data-genre="{{ $competition->genre }}" data-epreuves="{{ json_encode($competition->epreuves) }}">
                                    {{ $competition->titre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Session de competition</label>
                                    <input type="text" class="form-control" id="sessionField" name="sessions" placeholder="sessions" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="genreField" name="genre" placeholder="genre" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Epreuve</label>
                            <select class="form-control" id="epreuveSelect" name="epreuves[]" placeholder="Epreuve" readonly>
                                <!-- Options will be populated dynamically -->
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Athlete</label>
                                    <select class="form-select" id="athleteSelect" name="athletes[]" placeholder="Athlete">
                                        <option selected disabled value="">Athlete</option>
                                        @foreach ($athletes as $athlete)
                                        @if($athlete->validation == 'accept' && $athlete->club_name == auth()->user()->name )
                                        {{-- @if($athlete->validation == 'accept') --}}
                                        <option value="{{ $athlete->id }}" data-temp="{{ $athlete->temp_eng }}" data-user="{{ $athlete->club_name }}">{{ $athlete->nom }} || {{ $athlete->genre }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Temp d'engagement</label>
                                    <input type="text" class="form-control" id="tempEngagement" name="temp_eng[]" placeholder="Temp d'engagement" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Temp d'engagement</label>
                                    <input type="text" class="form-control" id="clubEng" name="club_name[]" placeholder="club " readonly>
                                </div>
                            </div>


                            
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="{{ route('athcomps.inscricomp') }}" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#competitionSelect').change(function() {
            var selectedOption = $(this).find(':selected');
            var sessions = selectedOption.data('sessions');
            var genre = selectedOption.data('genre');
            var epreuves = selectedOption.data('epreuves');

            $('#sessionField').val(sessions);
            $('#genreField').val(genre);

            // Clear and populate the Epreuve select element
            $('#epreuveSelect').empty();
            if (epreuves && epreuves.length > 0) {
                epreuves.forEach(function(epreuve) {
                    $('#epreuveSelect').append('<option value="' + epreuve.id + '">' + epreuve.nomEPR + ' || ' + epreuve.distance + ' || ' + epreuve.description + '</option>');
                });
            }
        });

        $('#athleteSelect').change(function() {
            var tempEng = $(this).find(':selected').data('temp');
            var clubName = $(this).find(':selected').data('user');
            $('#tempEngagement').val(tempEng);
            $('#clubEng').val(clubName);
        });
    });
</script>
