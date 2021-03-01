<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSymbol extends Model
{
    use HasFactory;
    protected $fillable=[
        'text',
        'x',
        'y',
        'id_room',
        'id_symbol'
    ];
}
