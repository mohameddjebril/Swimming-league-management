<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athcomps extends Model
{
    use HasFactory;
    protected $fillable = ['validation'];

    public function competitions() {
        return $this->belongsToMany(competitions::class, 'competition_athcomp', 'athcomp_id', 'competition_id');
    }
    public function epreuves() {
        return $this->belongsToMany(Epreuves::class, 'epreuve_athcomp', 'athcomp_id', 'epreuve_id');
    }
    public function athletes() {
        return $this->belongsToMany(Athletes::class, 'athlete_athcomp', 'athcomp_id', 'athlete_id');
    }
}


