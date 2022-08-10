<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacione extends Model
{
    use HasFactory;
    public function scopeNombres($query, $nombre){
        if($nombre){
            return $query->where('nombre','like',"%$nombre%");
        }

    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
