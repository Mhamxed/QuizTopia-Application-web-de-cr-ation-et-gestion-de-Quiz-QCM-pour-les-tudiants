<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    use HasFactory;

    protected $table = 'statistiques';
    protected $primaryKey = 'ID_Stats';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['Score_Moyen','Taux_Reussite','Date_Calcul','ID_Quiz'];

    public function quiz() { return $this->belongsTo(Quiz::class, 'ID_Quiz', 'ID_Quiz'); }
}
