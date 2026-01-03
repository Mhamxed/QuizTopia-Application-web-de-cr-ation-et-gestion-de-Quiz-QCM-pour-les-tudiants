<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';
    protected $primaryKey = 'ID_Etudiant';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Nom','Prenom','Email','MotDePasse','id_Groupe'];

    public function groupe() { return $this->belongsTo(Groupe::class, 'id_Groupe', 'ID_Groupe'); }
    public function sessions() { return $this->hasMany(Session_Quiz::class, 'ID_Etu', 'ID_Etudiant'); }
}
