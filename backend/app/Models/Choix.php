<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choix extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'ID_Question';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Num_Ordre',
        'Point_Question',
        'Enonce_Question',
        'ID_Quiz',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'ID_Quiz', 'ID_Quiz');
    }
    public function choixes()
    {
        return $this->hasMany(Choix::class, 'ID_Question', 'ID_Question');
    }

    public function resultats()
    {
        return $this->hasMany(Resultat::class, 'ID_Question', 'ID_Question');
    }
}
