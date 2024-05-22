<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presidents extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'n_telephone', 'email', 'adress'];
}
