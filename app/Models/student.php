<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

public function user(){
        return $this->belongsTo(user::class);
}
public function registeration(){
    return $this->hasMany(registeration::class);
}
}
