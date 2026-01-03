<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professeur extends Model
{
    use HasFactory;

    protected $table = 'professeurs';
    protected $primaryKey = 'ID_Prof';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Nom', 'Prenom', 'Email', 'MotDePasse'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'ID_Prof', 'ID_Prof');
    }
}
