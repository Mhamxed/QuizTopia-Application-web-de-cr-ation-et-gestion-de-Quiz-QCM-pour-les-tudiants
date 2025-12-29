<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    // Custom primary key
    protected $primaryKey = 'ID_Question';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Num_Ordre',
        'Point_Question',
        'Enonce_Question',
        'ID_Quiz',
    ];

    /**
     * A Question belongs to a Quiz
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'ID_Quiz', 'ID_Quiz');
    }

    /**
     * A Question has many Resultats
     */
    public function resultats()
    {
        return $this->hasMany(Resultat::class, 'ID_Question', 'ID_Question');
    }
}
