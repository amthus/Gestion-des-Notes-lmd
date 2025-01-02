<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Note extends Model
{
    use HasFactory;

    protected $dates = ['date_evaluation'];

    protected $fillable = [
        'etudiant_id',
        'ec_id',
        'note',
        'session',
        'date_evaluation',
    ];

    // Relation avec l'étudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function ec()
    {
        return $this->belongsTo(EC::class, 'ec_id');
    }

    public function getDateEvaluationAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    // Dans le modèle Note
    public function scopeMoyenneParUE($query, $etudiant_id, $ue_id)
    {
        // Récupère toutes les notes de l'étudiant pour les ECs associés à l'UE donnée
        $notes = $query->where('etudiant_id', $etudiant_id)
            ->whereHas('ec', function ($query) use ($ue_id) {
                $query->where('ue_id', $ue_id);
            })
            ->get();

        $totalNotes = 0;
        $totalCoefficients = 0;

        foreach ($notes as $note) {
            $ec = $note->ec;
            $totalNotes += $note->note * $ec->coefficient; // Multiplication de la note par le coefficient
            $totalCoefficients += $ec->coefficient;
        }

        // Si le total des coefficients est supérieur à zéro, on calcule la moyenne pondérée
        return $totalCoefficients > 0 ? $totalNotes / $totalCoefficients : 0;
    }

}
