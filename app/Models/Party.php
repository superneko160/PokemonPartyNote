<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'public_code',
        'pokemon_id1',
        'pokemon_id2',
        'pokemon_id3',
        'pokemon_id4',
        'pokemon_id5',
        'pokemon_id6',
    ];

}
