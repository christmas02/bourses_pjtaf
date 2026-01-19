<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidatureRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        // On récupère l'ID de l'utilisateur à ignorer pour l'email
       
        return [
    
            'date_naissance' => 'required|date',
            'telephone'      => 'required|string|max:20',
            'ecole_master'   => 'required|string|max:255',

            // TOUS LES FICHIERS sont maintenant 'nullable'
            'photo'                      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'curriculum_vitae'           => 'nullable|file|mimes:pdf|max:3072',
            'lettre_motivation'          => 'nullable|file|mimes:pdf|max:3072',
            'certificat_nationalite'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:3072',
            'lettre_recommendation_un'   => 'nullable|file|mimes:pdf|max:2048',
            'lettre_recommendation_deux' => 'nullable|file|mimes:pdf|max:2048',
            'diplome_master'             => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'diplome_bac'                => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'releve_notes_bac'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'projet_soutenu'             => 'nullable|file|mimes:pdf|max:5120',
            'recu_paiement'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }

    /**
     * Messages d'erreur personnalisés en français.
     */
    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'mimes'    => 'Le fichier :attribute doit être au format :values.',
            'max'      => 'Le fichier :attribute ne doit pas dépasser :max ko.',
            'image'    => 'Le fichier :attribute doit être une image.',
            'before'   => 'Vous devez avoir au moins 15 ans pour postuler.',
            'min'      => 'Le mot de passe doit contenir au moins :min caractères.',
        ];
    }

    /**
     * Noms conviviaux pour les attributs.
     */
    public function attributes(): array
    {
        return [
            'date_naissance'             => 'Date de Naissance',
            'telephone'                  => 'Téléphone',
            'ecole_master'               => 'École de Master',
            'photo'                      => "Photo d'identité",
            'curriculum_vitae'           => 'CV',
            'lettre_motivation'          => 'Lettre de Motivation',
            'certificat_nationalite'     => 'Certificat de Nationalité',
            'lettre_recommendation_un'   => 'Première lettre de recommandation',
            'lettre_recommendation_deux' => 'Deuxième lettre de recommandation',
            'diplome_master'             => 'Diplôme de Master',
            'diplome_bac'                => 'Diplôme du BAC',
            'releve_notes_bac'           => 'Relevé de notes BAC',
            'projet_soutenu'             => 'Projet soutenu',
            'recu_paiement'              => 'Reçu de paiement',
        ];
    }
}