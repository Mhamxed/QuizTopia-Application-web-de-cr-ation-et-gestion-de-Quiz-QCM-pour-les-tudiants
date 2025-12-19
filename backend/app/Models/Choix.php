<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    protected $table = 'choixes';
    protected $primaryKey = 'ID_Choix';
    public $timestamps = true;

    // CREATE
    public static function createChoix(string $texteChoix, bool $estCorrect, int $idResultat, int $idQuestion): Choix
    {
        $choix = new self();
        $choix->Texte_Choix = $texteChoix;
        $choix->Est_Correct = $estCorrect;
        $choix->ID_Resultat = $idResultat;
        $choix->ID_Question = $idQuestion;
        $choix->save();

        return $choix;
    }

    // READ ALL
    public static function getAllChoix()
    {
        return self::all();
    }

    // READ ONE
    public static function getChoixById(int $id): ?Choix
    {
        return self::find($id);
    }

    // UPDATE
    public static function updateChoix(int $id, ?string $texteChoix = null, ?bool $estCorrect = null, ?int $idResultat = null, ?int $idQuestion = null): ?Choix
    {
        $choix = self::find($id);
        if (!$choix) {
            return null;
        }

        if ($texteChoix !== null) $choix->Texte_Choix = $texteChoix;
        if ($estCorrect !== null) $choix->Est_Correct = $estCorrect;
        if ($idResultat !== null) $choix->ID_Resultat = $idResultat;
        if ($idQuestion !== null) $choix->ID_Question = $idQuestion;

        $choix->save();
        return $choix;
    }

    // DELETE
    public static function deleteChoix(int $id): bool
    {
        $choix = self::find($id);
        if (!$choix) {
            return false;
        }

        return $choix->delete();
    }

}
