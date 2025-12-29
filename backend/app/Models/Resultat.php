<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultat extends Model
{
    use HasFactory;

    // Table name (Laravel would guess "resultats", but we set it explicitly)
    protected $table = 'resultats';

    // Custom primary key
    protected $primaryKey = 'ID_Resultat';

    // Primary key is auto-incrementing
    public $incrementing = true;

    // Primary key type
    protected $keyType = 'int';

    // Mass assignable fields
    protected $fillable = [
        'Points_Obtenus',
        'ID_Question',
        'ID_Session',
    ];

    /**
     * Relation: Resultat belongs to a Question
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'ID_Question', 'ID_Question');
    }

    /**
     * Relation: Resultat belongs to a SessionQuiz
     */
    public function sessionQuiz()
    {
        return $this->belongsTo(Session_Quiz::class, 'ID_Session', 'ID_Session');
    }
}
