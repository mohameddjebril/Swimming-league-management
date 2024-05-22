<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epreuves extends Model
{
    use HasFactory;
    protected $fillable = ['nomEPR', 'typeEpr','distance','description'];

}
