<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    use HasFactory;

    protected $fillable = ['feeling', 'advice_id', 'user_id'];

    public $timestamps = false;

    public function advice(){
        return $this->belongsTo(\App\Models\Advice::class, 'advice_id', 'id');
    }

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}