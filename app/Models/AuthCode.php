<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'user_id',
        'app_client_id',
        'expired'
    ];
    public function app_client(){
        return $this->belongsTo(AppClient::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
