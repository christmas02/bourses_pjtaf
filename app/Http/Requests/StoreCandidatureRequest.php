<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatureRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Modifier si vous avez des restrictions spécifiques
    }

    /**
     * Règles de validation.
     */
    public function rules(): array
    {
        return [
            // --- Données de l'Utilisateur (Table Users) ---
            'name'     => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email'    => ['required', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => 'required|string|min:8', // Ajoutez '|confirmed' si vous avez un champ password_confirmation

            // --- Données Personnelles (Table Candidatures) ---
            'date_naissance' => 'required|date|before:-15 years', // Doit avoir au moins 15 ans
            'telephone'      => ['required', 'regex:/^[0-9]{10}$/'],
            'ecole_master'   => 'required|string|max:255',

            // --- Fichiers (Validation PDF et Images) ---
            'photo'                      => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2Mo
            'curriculum_vitae'           => 'nullable|file|mimes:pdf|max:3072', // Max 3Mo
            'lettre_motivation'          => 'nullable|file|mimes:pdf|max:3072',
            'certificat_nationalite'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:3072',
            'lettre_recommendation_un'   => 'nullable|file|mimes:pdf|max:2048',
            'lettre_recommendation_deux' => 'nullable|file|mimes:pdf|max:2048',
            'diplome_master'             => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'diplome_bac'                => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'releve_notes_bac'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'projet_soutenu'             => 'nullable|file|mimes:pdf|max:5120', // Max 5Mo
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
            'unique'   => 'Cette adresse email est déjà utilisée.',
            'email'    => 'Veuillez entrer une adresse email valide.',
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
            'name'                       => 'Nom Complet',
            'email'                      => 'Adresse Email',
            'password'                   => 'Mot de passe',
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