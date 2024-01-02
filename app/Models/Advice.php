<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;

    protected $fillable = ['advice', 'user_id'];

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function feelings(){
        return $this->hasMany(\App\Models\Feeling::class, 'advice_id','id');
    }

}
