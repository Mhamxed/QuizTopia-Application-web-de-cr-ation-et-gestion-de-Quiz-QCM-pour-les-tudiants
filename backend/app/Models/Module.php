<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $primaryKey = 'ID_Module';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Nom_Module'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'ID_Module', 'ID_Module');
    }
}
