@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajout d'une Club</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Ajout d'une Club</h6>
                <form action="{{route('clubs.store')}}" method="post" >
                  @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Nom :</label>
                                    <input type="text" name="name"  class="form-control" id="char-input">
                                      @error ('name')
                                          <div class="text-danger" > {{$message}} </div>
                                      @enderror												
                                    </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Abriviation :</label>
                                    <input type="text" name="username"  class="form-control" id="ab-input">
                                      @error ('username')
                                          <div class="text-danger" > {{$message}} </div>
                                      @enderror												
                                    </div>
                            </div><!-- Col -->

                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Adresse :</label>
                                    <input type="text"  name="address" class="form-control" placeholder="1234 Main St">
                                      @error ('address')
                                          <div class="text-danger" > {{$message}} </div>
                                      @enderror												</div>
                            </div>
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Email :</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror												</div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Password :</label>
                                    <input type="password" name="password" class="form-control" required autocomplete="new-password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror												</div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror												</div>
                            </div>
                            
                            
                            
                            <!-- Col -->

                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">N° telephone :</label>
                                    <input type="text" name="phone" placeholder="n° telephone de Presidents" id="num-inputtf" class="form-control">
                                      @error('phone')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
  											</div>
                            </div><!-- Col -->

                            <!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Role</label>
                                <select class="form-select" id="exampleFormControlSelect1" name="role" placeholder="Role">
                                    
                                    <option selected="" disabled="">Select the Role</option>
                                    <option>admin</option>
                                    <option>agent</option>
                                    <option>user</option>
                                </select>
                            </div>
                            </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">President</label>
                                <select class="form-select"  name="presidents[]" placeholder="presidents">

                                    @foreach ($presidents as $president)
                                    <option value="{{$president->id}}">{{$president->nom}}</option>  
                                    @endforeach
                                </select>
                            </div>

                        </div>  <!-- Col -->
                        </div><!-- Row -->
                    <!-- Row -->
                    <Button class="btn btn-success" type="submit">Enregister</Button>
                    <a href="{{route('clubs.index')}}" class="btn btn-info">Annuler</a>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection 

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const charInputs = document.querySelectorAll('#char-input');
    const charabInputs = document.querySelectorAll('#ab-input');
    const numTfInputs = document.querySelectorAll('#num-inputtf');

    // Function to allow only characters
    charInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-zA-Z]/g, '').slice(0, 30);;
        });
    });

    // Function to allow only characters
    charabInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-zA-Z]/g, '').slice(0, 3);;
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