<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrow extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_parent',
        'position_parent',
        'id_child',
        'position_child'
    ];
}
