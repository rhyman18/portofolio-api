<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'icon',
        'cert_link',
        'cert_desc',
        'cert_img',
    ];

    public $timestamps = false;
}
