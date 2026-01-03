<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory;

    protected $table = 'groupes';
    protected $primaryKey = 'ID_Groupe';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Nom_Groupe'];

    public function etudiants() { return $this->hasMany(Etudiant::class, 'id_Groupe', 'ID_Groupe'); }
}
