<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $primaryKey = 'ID_Quiz';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Titre_Quiz', 'Duree_Minutes', 'Date_Creation', 'ID_Module', 'ID_Prof'];

    public function module() { return $this->belongsTo(Module::class, 'ID_Module', 'ID_Module'); }
    public function professeur() { return $this->belongsTo(Professeur::class, 'ID_Prof', 'ID_Prof'); }
    public function questions() { return $this->hasMany(Question::class, 'ID_Quiz', 'ID_Quiz'); }
    public function sessions() { return $this->hasMany(Session_Quiz::class, 'ID_Quiz', 'ID_Quiz'); }
    public function statistiques() { return $this->hasMany(Statistique::class, 'ID_Quiz', 'ID_Quiz'); }
}
