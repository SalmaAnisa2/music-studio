<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AaStudio extends Model
{
    protected $table = 'aa_studios'; // Ini harus sama dengan nama tabel

    protected $fillable = [
        'name',
        'description',
        'price_per_hour',
    ];
}
