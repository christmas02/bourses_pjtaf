<?php

namespace App\Repositories;

use App\Models\Candidature;
use Illuminate\Support\Facades\Log;

class CandidatRepository
{
    public static function saveCandidature($data)
    {
        try{
            $candidature = new Candidature();
            $candidature->candidature_id = $data['candidature_id'];
            $candidature->user_id = $data['userId'];
            $candidature->date_naissance = $data['date_naissance'];
            $candidature->telephone = $data['telephone'];
            $candidature->ecole_master = $data['ecole_master'];
            $candidature->certificat_nationalite = $data['certificat_nationalite'];
            $candidature->curriculum_vitae = $data['curriculum_vitae'];
            $candidature->lettre_recommendation_un = $data['lettre_recommendation_un'];
            $candidature->lettre_recommendation_deux = $data['lettre_recommendation_deux'];
            $candidature->lettre_motivation = $data['lettre_motivation'];
            $candidature->diplome_master = $data['diplome_master'];
            $candidature->photo = $data['photo'];
            $candidature->releve_notes_bac = $data['releve_notes_bac'];
            $candidature->diplome_bac = $data['diplome_bac'];
            $candidature->resume_projet = $data['resume_projet'];
            $candidature->recu_paiement = $data['recu_paiement'];
            $candidature->status = 'pending';
            $candidature->save();

            return $candidature;

        }catch (\Throwable $th) {
            Log::error("Erreur lors de l'enregistrement du dossier de candidature : " . $th->getMessage(), []);
            throw $th; // Renvoyer l'exception si nécessaire
        }
    }

    public function Candidature($user_id)
    {
        return Candidature::where('user_id', $user_id)->first();
    }

    public function updateCandidature($data)
    {
        try {
            $candidature = Candidature::where('candidature_id', $data['candidature_id'])->first();
            $candidature->user_id = $data['userId'];
            $candidature->date_naissance = $data['date_naissance'];
            $candidature->telephone = $data['telephone'];
            $candidature->ecole_master = $data['ecole_master'];
            $candidature->certificat_nationalite = $data['certificat_nationalite'];
            $candidature->curriculum_vitae = $data['curriculum_vitae'];
            $candidature->lettre_recommendation_un = $data['lettre_recommendation_un'];
            $candidature->lettre_recommendation_deux = $data['lettre_recommendation_deux'];
            $candidature->lettre_motivation = $data['lettre_motivation'];
            $candidature->diplome_master = $data['diplome_master'];
            $candidature->photo = $data['photo'];
            $candidature->releve_notes_bac = $data['releve_notes_bac'];
            $candidature->diplome_bac = $data['diplome_bac'];
            $candidature->resume_projet = $data['resume_projet'];
            $candidature->recu_paiement = $data['recu_paiement'];
            $candidature->status = 'pending';
            $candidature->save();
            return $candidature;

        } catch (\Throwable $th) {
            Log::error("Erreur lors de la mise a jour du dossier de candidature : " . $th->getMessage(), []);
            throw $th; // Renvoyer l'exception si nécessaire
        }
    }
}