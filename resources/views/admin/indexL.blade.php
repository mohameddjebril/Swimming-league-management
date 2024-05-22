
@extends('admin.admindashboard')
@section('admin')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Athletes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des athletes</li>
    </ol>
</nav>
   <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
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
            <th>groupage</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>n_telephone</th>
            <th>Catégorie</th>
            <th>date_debut</th>
            <th>date_fin</th>
            <th>validation</th>
            <th>Temp d'egagement</th>
            <th>genre</th>
            <th>Club</th>
        
</tr>
    </thead>
    <tbody>
    @foreach ($athletes as $athlete)
    <tr style="text-align: center;">
                
                <td>
                    {{-- <img src="{{ asset( 'storage/'.$athlete->photo) }}" alt="Athlete Photo" style="width: 50px; height: 50px;"> --}}
                    <img class="wd-100 rounded-circle" src="{{ (!empty($athlete->photo)) ? url('upload/admin_img/'.$athlete->photo) : url('upload/no_image.jpg') }}" alt="profile">
                </td>


                <td>{{ $athlete->nom }}</td>
                <td>{{ $athlete->prenom }}</td>
                <td>{{ $athlete->n_carte }}</td>
                <td>{{ $athlete->date_naissance }}</td>
                <td>{{ $athlete->groupage }}</td>
                <td>{{ $athlete->adress }}</td>
                <td>{{ $athlete->email }}</td>
                <td>{{ $athlete->n_telephone }}</td>
                <td>{{ $athlete->categorie}}</td>
                <td>{{ $athlete->date_debut}}</td>
                <td>{{ $athlete->date_fin}}</td>
                <td>{{ $athlete->validation}}</td>
                <td>{{ $athlete->temp_eng}}</td>
                <td>{{ $athlete->genre}}</td>
                <td>
                    @foreach ($athlete->users as $user)
                        {{ $user->name }} 
                    @endforeach
                </td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
 </div> 
</div>
@endsection
