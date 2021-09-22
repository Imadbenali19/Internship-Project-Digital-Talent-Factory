<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;
    public $table="ecoles";
    protected $primaryKey = 'id';
    
    public function specialites(){
        return $this->belongsToMany('App\Models\Specialite');
    }

    public function etudiants(){
        return $this->hasMany('App\Models\Etudiant');
    }
}
