<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competitions extends Model
{
    use HasFactory;
    protected $fillable = ['titre','date_debut','date_fin','delaiinsc'
    ,'sessions','genre','categorie','lieu' ];
    
    public function epreuves() {
        return $this->belongsToMany(Epreuves::class, 'epreuve_competition', 'competition_id', 'epreuve_id');
    }
}

