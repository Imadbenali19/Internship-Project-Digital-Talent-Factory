<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    public $table="specialites";
    protected $primaryKey = 'id';
    
    public function ecoles(){
        return $this->belongsToMany('App\Models\Ecole');
    }

    public function etudiants(){
        return $this->hasMany('App\Models\Etudiant');
    }
}
