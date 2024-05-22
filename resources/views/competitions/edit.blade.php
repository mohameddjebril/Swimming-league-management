@extends('admin.admindashboard')
@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier un competition</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Modifier un competition</h6>
                    <form action="{{ route('competitions.update', $competition->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Titre:</label>
                                    <input type="text" name="titre" placeholder="Titre" class="form-control" value="{{ $competition->titre }}" oninput="limitCharactersNoNumbers(this, 20)">
                                    @error ('titre')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Date de debut:</label>
                                    <input type="date" id="date_debut" name="date_debut" placeholder="Date de debut" class="form-control" value="{{ $competition->date_debut }}">
                                    @error ('date_debut')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Date de fin:</label>
                                    <input type="date" id="date_fin" name="date_fin" placeholder="Date de fin" class="form-control" value="{{ $competition->date_fin }}">
                                    @error ('date_fin')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">delai d'inscription</label>
                                    <input type="text" id="delaiinsc" name="delaiinsc" class="form-control" value="{{ $competition->delaiinsc }}">
                                    @error ('delaiinsc')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">  
                                    <label class="form-label">Session</label>
                                    <select class="form-select" name="sessions" aria-label="Default select example">
                                        <option value="Matin" {{ $competition->sessions == 'Matin' ? 'selected' : '' }}>Matin</option>
                                        <option value="Soir" {{ $competition->sessions == 'Soir' ? 'selected' : '' }}>Soir</option>
                                    </select>
                                    @error ('sessions')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">  
                                    <label class="form-label">Genre</label>
                                    <select class="form-select" name="genre" aria-label="Default select example">
                                        <option value="homme" {{ $competition->genre == 'homme' ? 'selected' : '' }}>homme</option>
                                        <option value="femme" {{ $competition->genre == 'femme' ? 'selected' : '' }}>femme</option>
                                    </select>
                                    @error ('genre')
                                    <div class="text-danger" > {{$message}} </div>
                                    @enderror
                                </div>
                            </div><!-- Col -->


                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Categorie:</label>
                                    <select class="form-select" name="categorie" aria-label="Default select example">
                                        <option selected disabled value="">Choisir categorie</option>
                                        <option value="Ecole"{{ $competition->categorie == 'Ecole' ? 'selected' : '' }}>Ecole</option>
                                        <option value="Pussin"{{ $competition->categorie == 'Pussin' ? 'selected' : '' }}>Pussin</option>
                                        <option value="Binjamin"{{ $competition->categorie == 'Binjamin' ? 'selected' : '' }}>Binjamin</option>
                                        <option value="Minim"{{ $competition->categorie == 'Minim' ? 'selected' : '' }}>Minim</option>
                                        <option value="Junior"{{ $competition->categorie == 'Junior' ? 'selected' : '' }}>Junior</option>
                                        <option value="Sunior"{{ $competition->categorie == 'Sunior' ? 'selected' : '' }}>Sunior</option>
                                    </select>
                                    @error('categorie')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
    
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">lieu:</label>
                                    <input type="text" name="lieu" placeholder="lieu" class="form-control" value="{{ $competition->lieu }}">
                                    @error('lieu')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Epreuve</label>
                                    <select class="form-select" name="epreuves[]" placeholder="presidents">
                                        @foreach ($epreuves as $epreuve)
                                            <option value="{{ $epreuve->id }}" {{ $competition->epreuves->contains($epreuve->id) ? 'selected' : '' }}>
                                                {{ $epreuve->typeEpr }} {{ $epreuve->nomEPR }} {{ $epreuve->description }}
                                            </option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- Col -->

                        </div><!-- Row -->
                        
                        <Button class="btn btn-success" type="submit">Enregister</Button>
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


    <script>
        $(document).ready(function() {
            $('#multiple-select1').select2();
        });
    </script>
