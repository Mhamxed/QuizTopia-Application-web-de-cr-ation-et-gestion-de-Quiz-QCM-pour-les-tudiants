<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultat extends Model
{
    use HasFactory;
    protected $table = 'resultats';
    protected $primaryKey = 'ID_Resultat';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'Points_Obtenus',
        'ID_Question',
        'ID_Session',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class, 'ID_Question', 'ID_Question');
    }
    public function sessionQuiz()
    {
        return $this->belongsTo(Session_Quiz::class, 'ID_Session', 'ID_Session');
    }
}
