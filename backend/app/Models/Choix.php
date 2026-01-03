<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    use HasFactory;

    // Table name (optional if it matches the plural of the class)
    protected $table = 'choixes';

    // Primary key
    protected $primaryKey = 'ID_Choix';

    // Mass-assignable fields
    protected $fillable = [
        'Texte_Choix',
        'Est_Correct',
        'ID_Resultat',
        'ID_Question',
    ];

    // Relationships

    /**
     * A choix belongs to one question
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'ID_Question', 'ID_Question');
    }

    /**
     * A choix belongs to one resultat
     */
    public function resultat()
    {
        return $this->belongsTo(Resultat::class, 'ID_Resultat', 'ID_Resultat');
    }
}
