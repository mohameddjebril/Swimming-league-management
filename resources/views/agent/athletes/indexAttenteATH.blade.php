
@extends('agent.agentdashboard')
@section('agent')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Athletes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des athletes</li>
    </ol>
</nav>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        {{-- <div class="card-body">
        <div class="inovo-button">
            <a  href="{{ route('agent.athletes.create') }}" class="btn btn-info btn-rounded">Ajouter<i class="fas fa-user-plus"></i></a>
         </div>
        </div> --}}
        <div class="card-body">
<div class="table-responsive">
  <table id="dataTableExample" class="table table-hover">
    <thead>
       @if (session()->has('success'))
    <div id="successMessage" class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
@endif
@if (session()->has('error'))
<div id="successMessage" class="alert alert-danger text-center my-2">{{ session()->get('error') }}</div>
@endif
<tr style="text-align: center;">

            <th>Photo</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>num carte</th>
            <th>Date de naissance</th>
            <th>Genre</th>
            <th>groupage</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>N° telephone</th>
            <th>Catégorie</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>validation</th>
            <th>temp</th>
            <th>Actions</th>
        
</tr>
    </thead>
    <tbody>
    @foreach ($athletes as $athlete)
    @if($athlete->validation == 'en attente')
    <tr style="text-align: center;">
                
                <td>
                    {{-- <img src="{{ asset( 'storage/'.$athlete->photo) }}" alt="Athlete Photo" style="width: 50px; height: 50px;"> --}}
                    <img class="wd-100 rounded-circle" src="{{ (!empty($athlete->photo)) ? url('upload/admin_img/'.$athlete->photo) : url('upload/no_image.jpg') }}" alt="profile">
                </td>


                <td>{{ $athlete->nom }}</td>
                <td>{{ $athlete->prenom }}</td>
                <td>{{ $athlete->n_carte }}</td>
                <td>{{ $athlete->date_naissance }}</td>
                <td>{{ $athlete->genre }}</td>
                <td>{{ $athlete->groupage }}</td>
                <td>{{ $athlete->adress }}</td>
                <td>{{ $athlete->email }}</td>
                <td>{{ $athlete->n_telephone }}</td>
                <td>{{ $athlete->categorie}}</td>
                <td>{{ $athlete->date_debut}}</td>
                <td>{{ $athlete->date_fin}}</td>
                <td>{{ $athlete->validation}}</td>
                <td>{{ $athlete->temp_eng }}</td>
                <td>
                    <button class="btn text-info-success read-athlete"
                            data-bs-toggle="modal" 
                            data-bs-target="#readData"
                            data-id="{{ $athlete->id }}"
                            data-nom="{{ $athlete->nom }}"
                            data-prenom="{{ $athlete->prenom }}"
                            data-date_naissance="{{ $athlete->date_naissance }}"
                            data-groupeage="{{ $athlete->groupeage }}"
                            data-adress="{{ $athlete->adress }}"
                            data-email="{{ $athlete->email }}"
                            data-club=" @foreach ($athlete->users as $user)
                            {{ $user->name }} 
                        @endforeach"
                            data-photo="{{ asset($athlete->photo) }}">
                        <i class="bi bi-eye"></i>
                    </button>
                    <a class="btn text-info" href="{{ route('agent.athletes.edit', $athlete->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <button class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $athlete->id }}">
                        <i class="bi bi-trash"></i>
                    </button>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirmationModal{{$athlete->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ces  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    
                    <!-- Form to delete presidents -->
                    <form action="{{ route('agent.athletes.destroy', $athlete->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="readData">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" id="myForm">
                         <div class="card imgholder">
                            <!-- You can include the athlete's photo here if available -->
                            <img src="{{ asset('storage/'.$athlete->photo) }}" alt="Athlete Photo" width="200" height="200" class="showImg">

                        </div> 

                        <div class="inputField">
                            <div>
                                <label for="readName">Nom:</label>
                                <input type="text" id="readName" disabled>
                            </div>
                            <div>
                                <label for="readPrenom">Prenom:</label>
                                <input type="text" id="readPrenom" disabled>
                            </div>
                            <div>
                                <label for="readDateNaissance">Date de naissance:</label>
                                <input type="text" id="readDateNaissance" disabled>
                            </div>
                            <div>
                                <label for="readGroupeage">groupe sanguin:</label>
                                <input type="text" id="readGroupeage" disabled>
                            </div>
                            <div>
                                <label for="readAdress">Adresse:</label>
                                <input type="text" id="readAdress" disabled>
                            </div>
                            <div>
                                <label for="readEmail">Email:</label>
                                <input type="text" id="readEmail" disabled>
                            </div>
                            <div>
                                <label for="readClubs">Club:</label>
                                <input type="text" id="readClubs" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
 </div> 
</div>
@endsection
@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

<script>
    $(document).ready(function () {
        $('.read-athlete').on('click', function () {
            var id = $(this).data('id');
            var nom = $(this).data('nom');
            var prenom = $(this).data('prenom');
            var dateNaissance = $(this).data('date_naissance');
            var groupeage = $(this).data('groupeage');
            var adress = $(this).data('adress');
            var email = $(this).data('email');
            var club = $(this).data('club');
            var photo = $(this).data('photo');

            // Update modal content
            $('#readName').val(nom);
            $('#readPrenom').val(prenom);
            $('#readDateNaissance').val(dateNaissance);
            $('#readGroupeage').val(groupeage);
            $('#readAdress').val(adress);
            $('#readEmail').val(email);
            $('#readClubs').val(club);
            $('.showImg').attr('src', photo);
        });
    });
</script> 
@endsection
