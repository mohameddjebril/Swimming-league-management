@extends('agent.agentdashboard')
@section('agent')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajout un athlete</li>
    </ol>
</nav>
<div class="row">
					<div class="col-md-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Ajout un athlete</h6>
                <form action="{{route('agent.athletes.store')}}" method="POST" class="mt-4" enctype="multipart/form-data">
                @csrf
										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
                                                    <label class="form-label">Nom:</label>
                                                    <input type="text" id="char-input" name="nom" placeholder="Nom" class="form-control">
                                                    @error ('nom')
                                                        <div class="text-danger" > {{$message}} </div>
                                                    @enderror
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
                                                    <label class="form-label">Prenom:</label>
                                                    <input type="text" id="char-input" name="prenom" placeholder="Prénom" class="form-control">
                                                    @error ('prenom')
                                                        <div class="text-danger" > {{$message}} </div>
                                                    @enderror
												</div>
											</div>
                                            
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">N° de carte :</label>
                                                    <input type="text" name="n_carte" placeholder="n° carte " id="num-input" class="form-control">
                                                      @error('n_carte')
                                                          <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                              </div>
                                            </div>
                                            
                                            <!-- Col -->
                                           
										</div><!-- Row -->
										<div class="row">
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Date de naissance:</label>
                                                    {{-- <input type="date" class="form-control"  id="date_naissance"  name="date_naissance" required data-toggle="tooltip" data-placement="top" title="Tooltip on top"> --}}
                                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                                </div>
                                            </div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">  
                                                    <label class="form-label">Groupe sanguin:</label>
                                                    <select class="form-select" name="groupage" aria-label="Default select example">
                                                    <option selected disabled value="">groupe sanguin </option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                  </select>
                                                @error ('groupeage')
                                                    <div class="text-danger" > {{$message}} </div>
                                                @enderror
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
                                                    <label class="form-label">Address :</label>
                                                    <input type="text" name="adress" placeholder="Adresse" class="form-control">
                                                @error ('adress')
                                                    <div class="text-danger" > {{$message}} </div>
                                                @enderror
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Email address:</label>
                                                    <input type="email" name="email" placeholder="Adresse mail" class="form-control">
                                            @error ('email')
                                                <div class="text-danger" > {{$message}} </div>
                                            @enderror
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">N° telephone :</label>
                                                    <input type="text" name="n_telephone" placeholder="n° telephone de Presidents" id="num-inputtf" class="form-control">
                                                      @error('n_telephone')
                                                          <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                              </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Categorie:</label>
                                                    <input type="text" id="categorie" name="categorie" placeholder="categorie" class="form-control" readonly >
                                                    @error ('categorie')
                                                        <div class="text-danger" > {{$message}} </div>
                                                    @enderror
                                                </div>
                                            </div>
										</div>
                                        
                                       
                                        
                                        <!-- Row -->
										<div class="row">
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
                                                    <label class="form-label">Date de debut:</label>
                                                    <input type="date" id="date_debut" name="date_debut" placeholder="Date de debut" class="form-control" >
                                                    @error ('date_debut')
                                                        <div class="text-danger" > {{$message}} </div>
                                                    @enderror
												</div>
											</div><!-- Col -->
                                            <div class="col-sm-4">
												<div class="mb-3">
                                                    <label class="form-label">Date de fin:</label>
                                                    <input type="date" id="date_fin" name="date_fin" placeholder="Date de fin" class="form-control">
                                                    @error ('date_debut')
                                                        <div class="text-danger" > {{$message}} </div>
                                                    @enderror
												</div>
											</div>

                                            <!-- Col -->


                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Temp d'engagement:</label>
                                                    <input type="text" id="temp_eng" name="temp_eng" placeholder="Temp d'engagement" class="form-control" >
                                                    @error('temp_eng')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
												<div class="mb-3">
                                                    {{-- <label class="form-label">Photo :</label>
                                                    <input type="file" class="form-control" name="photo"> --}}
                                                    <label class="form-label" for="formFile">photo</label>
                                                    <input class="form-control" name="photo" type="file" id="image"> 
                                                    </div>
											</div><!-- Col -->
                                            <div class="mb-3">
                                                <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_img/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                                            </div>
                                            
                                            
										</div><!-- Row -->
                                        <Button class="btn btn-success" type="submit">Enregister</Button>
                                        <a href="{{route('agent.athletes.index')}}" class="btn btn-info">Annuler</a>
									</form>
               	
            </div>
						</div>
					</div>
				</div>
        @endsection

 
        <script>
            // Wrap the code inside a DOMContentLoaded event listener
            document.addEventListener("DOMContentLoaded", function() {
                // Function to calculate age and update category
                function updateCategory() {
                    var dateOfBirthInput = document.getElementById('date_naissance');
                    var categoryInput = document.getElementById('categorie');
        
                    if (dateOfBirthInput.value) {
                        var dob = new Date(dateOfBirthInput.value);
                        var today = new Date();
                        var age = today.getFullYear() - dob.getFullYear();
        
                        // Check if the birthday has occurred this year
                        if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                            age--;
                        }
        
                        // Update the category based on age ranges
                        if (age < 10) {
                            categoryInput.value = 'Ecole';
                        } else if (age === 11) {
                            categoryInput.value = 'Poussin';
                        } else if (age >= 12 && age <= 14) {
                            categoryInput.value = 'Benjamin';
                        } else if (age >= 15 && age <= 16) {
                            categoryInput.value = 'Minime';
                        } else if (age >= 17 && age <= 18) {
                            categoryInput.value = 'Junior';
                        } else {
                            categoryInput.value = 'Senior';
                        }
                    }
                }
        
                // Attach the updateCategory function to the change event of the date input
                var dateOfBirthInput = document.getElementById('date_naissance');
                if (dateOfBirthInput) {
                    dateOfBirthInput.addEventListener('change', updateCategory);
                }
            });
        </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        jQuery('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                });
            });
        </script>

<script>
    function formatNumberWithComma(input) {
        // Remove any characters that are not digits or commas
        input.value = input.value.replace(/[^0-9,]/g, '');

        // Split the input value by commas
        // let parts = input.value.split(',');

        // Format each part separately
        for (let i = 0; i < parts.length; i++) {
            parts[i] = parts[i].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        // Join the parts back together
        input.value = parts.join(',');
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const charInputs = document.querySelectorAll('#char-input');
    const numInputs = document.querySelectorAll('#num-input');
    const numTfInputs = document.querySelectorAll('#num-inputtf');

    // Function to allow only characters
    charInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-zA-Z]/g, '').slice(0, 30);;
        });
    });

    // Function to allow only numbers
    numInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '').slice(0, 18);;
        });
    });

    // Function to allow only numbers
    numTfInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^0-9]/g, '').slice(0, 10);;
        });
    });

});


</script>       
