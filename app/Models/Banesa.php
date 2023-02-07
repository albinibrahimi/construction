<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'm2', 'objektid', 'kati', 'statusi', 'description'
    ];
}
