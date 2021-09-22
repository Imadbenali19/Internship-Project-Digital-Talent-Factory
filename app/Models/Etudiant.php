<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    public $table="etudiants";
    protected $primaryKey = 'id';

    public function ecole(){
        return $this->belongsTo('App\Models\Ecole');
    }

    public function specialite(){
        return $this->belongsTo('App\Models\Specialite');
    }
}
