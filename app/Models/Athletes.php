<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athletes extends Model
{
    use HasFactory;
    protected $fillable = 
    ['nom', 'prenom','n_carte', 'date_naissance', 'photo', 
    'groupage', 'adress', 'email', 'n_telephone','categorie','date_debut','date_fin','validation','genre','temp_eng','club_name'];



    public function users() {
        return $this->belongsToMany(User::class, 'user_athlete', 'athlete_id', 'user_id');
    }
}