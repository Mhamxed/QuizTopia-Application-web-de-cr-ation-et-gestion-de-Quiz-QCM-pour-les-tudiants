<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session_Quiz extends Model
{
    use HasFactory;

    protected $table = 'session_quizzes';
    protected $primaryKey = 'ID_Session';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Date_Passage','Score_Obtenu','Duree_Effective','ID_Etu','ID_Quiz'];

    public function etudiant() { return $this->belongsTo(Etudiant::class, 'ID_Etu', 'ID_Etudiant'); }
    public function quiz() { return $this->belongsTo(Quiz::class, 'ID_Quiz', 'ID_Quiz'); }
    public function resultats() { return $this->hasMany(Resultat::class, 'ID_Session', 'ID_Session'); }
}
