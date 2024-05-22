@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modification d'une President</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Modification d'une President</h6>
                <form action="{{route('presidents.update',$presidents->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom :</label>
                                    <input type="text" value="{{ $presidents->nom }}" name="nom" placeholder="Nom de Presidents" class="form-control" id="char-input">
                                      @error ('nom')
                                          <div class="text-danger" > {{$message}} </div>
                                      @enderror												
                                    </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">N° telephone :</label>
                                    <input type="text" value="{{ $presidents->n_telephone }}" name="n_telephone" placeholder="n° telephone de Presidents" id="num-inputtf" class="form-control">
                                      @error('n_telephone')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
  											</div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Email :</label>
                                    <input type="email" value="{{ $presidents->email }}" name="email" class="form-control" placeholder="name@example.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror												</div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Adresse :</label>
                                    <input type="text" value="{{ $presidents->adress }}" name="adress" class="form-control" placeholder="1234 Main St">
                                      @error ('adress')
                                          <div class="text-danger" > {{$message}} </div>
                                      @enderror												</div>
                            </div><!-- Col -->
                            <!-- Col -->
                        </div><!-- Row -->
                    <!-- Row -->
                    <Button class="btn btn-success" type="submit">Modifier</Button>
                    <a href="{{route('presidents.index')}}" class="btn btn-info">Annuler</a>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection 

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const charInputs = document.querySelectorAll('#char-input');
    const numTfInputs = document.querySelectorAll('#num-inputtf');

    // Function to allow only characters
    charInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-zA-Z]/g, '').slice(0, 30);;
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








































{{-- 
<form action="{{route('presidents.update',$presidents->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="Modaledit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header btn-danger">
                    <h5 class="modal-title" id="Modaledit">Ajout d'une President</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>                   
                </div>
                <div class="modal-body">
                    @method('put')
                    <div class="form-group mb-3">
                        <input type="text" value="{{ $presidents->nom }}" name="nom" placeholder="Nom de Presidents" class="form-control" onkeyup="lettersOnly(this)" oninput="limitCharactersNoNumbers(this, 30)">
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" value="{{ $presidents->n_telephone }}" name="n_telephone" placeholder="n° telephone de Presidents" oninput="allowNumbersOnly(this, 10)" class="form-control">
                        @error('n_telephone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" value="{{ $presidents->email }}" name="email" class="form-control" placeholder="name@example.com">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input type="text" value="{{ $presidents->adress }}" name="adress" class="form-control" placeholder="1234 Main St">
                        @error('adress')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <Button class="btn btn-success" type="submit">Modifier</Button>
                    <a href="{{route('presidents.index')}}" class="btn btn-info">Annuler</a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</form> --}}