<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbooks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'platform',
        'message',
    ];
}
