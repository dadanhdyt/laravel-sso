<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesToken extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'app_client_id',
        'akses_token',
        'expired'
    ];
}
