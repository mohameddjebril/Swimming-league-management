@extends('admin.admindashboard')

@section('admin')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modification d'un Club</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Modifier un Club</h6>
                    <form method="POST" action="{{ route('clubs.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Nom :</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="char-input">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Abréviation :</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" id="ab-input">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Adresse :</label>
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Email :</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">N° Téléphone :</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="num-inputtf">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Rôle</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="role">
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="agent" {{ $user->role === 'agent' ? 'selected' : '' }}>Agent</option>
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Présidents</label>
                                    <select class="form-select"  id="exampleFormControlSelect1" name="presidents[]">
                                        @foreach ($presidents as $president)
                                            <option value="{{ $president->id }}" {{ $user->presidents->contains($president->id) ? 'selected' : '' }}>{{ $president->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('presidents')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <Button class="btn btn-success" type="submit">Enregistrer</Button>
                        <a href="{{ route('clubs.index') }}" class="btn btn-info">Annuler</a>
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