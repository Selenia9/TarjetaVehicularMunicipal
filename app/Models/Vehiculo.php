<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes;
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function organizacion () {
        return $this->belongsTo('App\Models\Organizacione', 'organizacion_id');
      }
      public function propietario () {
        return $this->belongsTo('App\Models\propietario', 'propietario_id');
      }
      protected $dates =['deleted_at'];
}
