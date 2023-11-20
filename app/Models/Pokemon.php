<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ability',
        'item',
        'teratype',
        'nature',
        'h',
        'a',
        'b',
        'c',
        'd',
        's',
        'move1',
        'move2',
        'move3',
        'move4',
        'note',
    ];
}
