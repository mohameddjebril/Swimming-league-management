@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modifier une épreuve</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Modifier une épreuve</h6>
                <form action="{{ route('epreuves.update', $epreuve->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Type de l'épreuve:</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="typeEpr" value="individual" class="form-check-input" id="individual" {{ $epreuve->typeEpr === 'individual' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="individual">Individual</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="typeEpr" value="collective" class="form-check-input" id="collective" {{ $epreuve->typeEpr === 'collective' ? 'checked' : '' }}>
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
                    <div id="individual-fields" class="row {{ $epreuve->typeEpr === 'individual' ? '' : 'd-none' }}">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Nom épreuve:</label>
                                <input type="text" name="nomEPR" placeholder="nomEPR" class="form-control" value="{{ $epreuve->nomEPR }}" id="char-input">
                                @error('nomEPR')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label class="form-label">Distance (M):</label>
                                <div>
                                    @php
                                        $distances = explode(', ', $epreuve->distance);
                                    @endphp
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="50 m" class="form-check-input" id="checkInline1" {{ in_array('50 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline1">50</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="100 m" class="form-check-input" id="checkInline2" {{ in_array('100 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline2">100</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="200 m" class="form-check-input" id="checkInline3" {{ in_array('200 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline3">200</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="400 m" class="form-check-input" id="checkInline4" {{ in_array('400 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline4">400</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="800 m" class="form-check-input" id="checkInline5" {{ in_array('800 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline5">800</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="distance[]" value="1500 m" class="form-check-input" id="checkInline6" {{ in_array('1500 m', $distances) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline6">
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
                        <div id="collective-fields" class="row {{ $epreuve->typeEpr === 'collective' ? '' : 'd-none' }}">
                        
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <input type="text" name="description" placeholder="description" class="form-control" value="{{ $epreuve->description }}">
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <button class="btn btn-success" type="submit">Enregistrer</button>
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