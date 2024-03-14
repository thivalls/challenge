<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;

    // possibilidade de fazer cast de data via model
    //    protected $casts = [
    //        'created_at' => 'datetime:d/m/Y',
    //    ];

    protected $fillable = [
        'id',
        'user_id',
        'file_name'
    ];
}
