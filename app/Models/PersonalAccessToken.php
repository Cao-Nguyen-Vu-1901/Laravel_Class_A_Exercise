<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalAccessToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'expires_at',
    ];
}
