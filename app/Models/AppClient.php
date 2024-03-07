<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppClient extends Model
{
    use HasFactory;

    public function auth_code(){
     $this->hasMany(AuthCode::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
