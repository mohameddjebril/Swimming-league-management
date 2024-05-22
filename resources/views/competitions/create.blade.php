@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajout une compétition</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Ajout une compétition</h6>
                <form action="{{ route('competitions.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Titre:</label>
                                <input type="text" name="titre" placeholder="Titre" class="form-control" >
                                @error('titre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Date de début:</label>
                                <input type="date" id="date_debut" name="date_debut" placeholder="Date de début" class="form-control">
                                @error('date_debut')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Date de fin:</label>
                                <input type="date" id="date_fin" name="date_fin" placeholder="Date de fin" class="form-control">
                                @error('date_fin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Délai d'inscription</label>
                                <input type="text" id="delaiinsc" name="delaiinsc" class="form-control" readonly>
                                @error('delaiinsc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Session</label>
                                <select class="form-select" name="sessions" aria-label="Default select example">
                                    <option selected disabled value="">Choisir session</option>
                                    <option value="Matin">Matin</option>
                                    <option value="Soir">Soir</option>
                                </select>
                                @error('sessions')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Genre</label>
                                <select class="form-select" name="genre" aria-label="Default select example">
                                    <option selected disabled value="">Choisir genre</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                                @error('genre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Categorie:</label>
                                <select class="form-select" name="categorie" aria-label="Default select example">
                                    <option selected disabled value="">Choisir categorie</option>
                                    <option value="Ecole">Ecole</option>
                                    <option value="Pussin">Pussin</option>
                                    <option value="Binjamin">Binjamin</option>
                                    <option value="Minim">Minim</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Sunior">Sunior</option>
                                </select>
                                @error('categorie')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">lieu:</label>
                                <input type="text" name="lieu" placeholder="lieu" class="form-control" >
                                @error('lieu')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Épreuve</label>
                                <select class="form-select" name="epreuves[]" placeholder="Epreuves">
                                    @foreach ($epreuves as $epreuve)
                                        <option value="{{ $epreuve->id }}">{{ $epreuve->nomEPR }} {{ $epreuve->description }} {{ $epreuve->distance }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button class="btn btn-success" type="submit">Enregistrer</button>
                    <a href="{{ route('competitions.index') }}" class="btn btn-info">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateRegistrationDeadline() {
            var startDateInput = document.getElementById('date_debut');
            var registrationDeadlineInput = document.getElementById('delaiinsc');

            if (startDateInput.value) {
                var startDate = new Date(startDateInput.value);
                var currentDate = new Date();

                console.log("Start Date:", startDate);
                console.log("Current Date:", currentDate);

                // Calculate the difference in milliseconds
                var difference = startDate - currentDate;

                console.log("Difference in milliseconds:", difference);

                // Convert milliseconds to days
                var numberOfDays = Math.floor(difference / (1000 * 60 * 60 * 24));

                console.log("Number of days:", numberOfDays);

                // Update the registration deadline input field
                registrationDeadlineInput.value = numberOfDays + " jours";
            }
        }

        // Attach the updateRegistrationDeadline function to the change event of the date_debut input
        document.getElementById('date_debut').addEventListener('change', updateRegistrationDeadline);
    });
</script>

