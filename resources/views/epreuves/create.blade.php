@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ajout un epreuve</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Ajout un epreuve</h6>
                <form action="{{ route('epreuves.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Type de l'épreuve:</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="typeEpr" value="individual" class="form-check-input" id="individual" checked>
                                        <label class="form-check-label" for="individual">Individual</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="typeEpr" value="collective" class="form-check-input" id="collective">
                                        <label class="form-check-label" for="collective">Collective</label>
                                    </div>
                                </div>
                                @error('typeEpr')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Individual Fields -->
                    <div id="individual-fields" class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Nom epreuve:</label>
                                <input type="text" name="nomEPR" placeholder="nomEPR" class="form-control" id="char-input">
                                @error('nomEPR')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label class="form-label">Distance (M):</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="50 m" class="form-check-input" id="checkInline1">
                                        <label class="form-check-label" for="checkInline1">50</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="100 m" class="form-check-input" id="checkInline2">
                                        <label class="form-check-label" for="checkInline2">100</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="200 m" class="form-check-input" id="checkInline3">
                                        <label class="form-check-label" for="checkInline3">200</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="400 m" class="form-check-input" id="checkInline4">
                                        <label class="form-check-label" for="checkInline4">400</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="800 m" class="form-check-input" id="checkInline5">
                                        <label class="form-check-label" for="checkInline5">800</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="1500 m" class="form-check-input" id="checkInline6">
                                        <label class="form-check-label" for="checkInline6">1500</label>
                                    </div>
                                </div>
                                @error('distance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Collective Fields -->
                    <div id="collective-fields" class="row d-none">
                    
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Description:</label>
                                <input type="text" name="description" placeholder="description" class="form-control">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <Button class="btn btn-success" type="submit">Enregistrer</Button>
                    <a href="{{ route('epreuves.index') }}" class="btn btn-info">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formTypeRadios = document.querySelectorAll('input[name="typeEpr"]');
        const individualFields = document.getElementById('individual-fields');
        const collectiveFields = document.getElementById('collective-fields');

        formTypeRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'individual') {
                    individualFields.classList.remove('d-none');
                    collectiveFields.classList.add('d-none');
                } else {
                    individualFields.classList.add('d-none');
                    collectiveFields.classList.remove('d-none');
                }
            });
        });

        // Trigger change event on page load to set the initial state
        document.querySelector('input[name="typeEpr"]:checked').dispatchEvent(new Event('change'));
    });
</script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const charInputs = document.querySelectorAll('#char-input');

    // Function to allow only characters
    charInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-zA-Z]/g, '').slice(0, 30);;
        });
    });
});
</script>  
