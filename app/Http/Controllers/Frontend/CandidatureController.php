<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Services\CandidatureServicess;
use App\Services\Setting;
use App\Services\Files;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    protected CandidatureServicess $CandidatureService;
    protected Setting $Setting;
    protected Files $Files;
    protected UserService $UserService;

    public function __construct(
        CandidatureServicess $CandidatureService,
        Setting $Setting,
        Files $Files,
        UserService $UserService
    ) {
        $this->CandidatureService = $CandidatureService;
        $this->Setting = $Setting;
        $this->Files = $Files;
        $this->UserService = $UserService;
    }

    #FORMULAIRE DE CANDIDATURE
    public function index()
    {
        return view('frontend.candidature');
    }

    #FORMULAIRE DE MISE A JOUR CANDIDATURE
    public function FormUpdateCandidature()
    {
        try {
            $authUser = Auth::user();

            $profil = $this->CandidatureService->profilCandidat($authUser->user_id);
            $user = $profil['user'];
            $candidature = $profil['candidature'];

            return view('frontend.updateCandidature', compact('user', 'candidature'));
        } catch (\Throwable $th) {

            Log::error('Erreur FormUpdateCandidature : ' . $th->getMessage());

            return redirect()
                ->route('connexion')
                ->with('error', 'Votre session a expiré ou une erreur est survenue.');
        }
    }


    #PAGE DE NOTIFICATION DE CANDIDATURE
    public function notifCandidature()
    {
        try {
            return view('frontend.notifCandidature');
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #PAGE DE NOTIFICATION UPDATE DE CANDIDATURE
    public function notifUpdateCandidature()
    {
        try {
            return view('frontend.notifUpdateCandidature');
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #SAVE CANDIDATURE
    public function saveCandidature(StoreCandidatureRequest $request)
    {
        try {
            #Transfert et upload du fichier
            $uploadedFiles = [];

            $fileFields = [
                'photo',
                'curriculum_vitae',
                'lettre_motivation',
                'certificat_nationalite',
                'lettre_recommendation_un',
                'lettre_recommendation_deux',
                'diplome_master',
                'diplome_bac',
                'releve_notes_bac',
                'resume_projet',
                'recu_paiement',
            ];

            foreach ($fileFields as $field) {
                $uploadedFiles[$field] = $request->hasFile($field)
                    ? Files::uploadFile($request->file($field))
                    : null;
            }

            #Formatage des données
            $dateCandidature = [
                'candidature_id' => $this->Setting->generateUuid(),
                'userId' => $this->Setting->generateUuid(),
                'date_naissance' => $request->date_naissance,
                'telephone' => $request->telephone,
                'ecole_master' => $request->ecole_master,
                'photo' => $uploadedFiles['photo'],
                'curriculum_vitae' => $uploadedFiles['curriculum_vitae'],
                'lettre_motivation' => $uploadedFiles['lettre_motivation'],
                'certificat_nationalite' => $uploadedFiles['certificat_nationalite'],
                'lettre_recommendation_un' => $uploadedFiles['lettre_recommendation_un'],
                'lettre_recommendation_deux' => $uploadedFiles['lettre_recommendation_deux'],
                'diplome_master' => $uploadedFiles['diplome_master'],
                'diplome_bac' => $uploadedFiles['diplome_bac'],
                'releve_notes_bac' => $uploadedFiles['releve_notes_bac'],
                'resume_projet' => $uploadedFiles['resume_projet'],
                'recu_paiement' => $uploadedFiles['recu_paiement'],
                'is_active' => true,
            ];
            // dd($dateCandidature);
            $dateUser = [
                'user_id' => $dateCandidature['userId'],
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'candidat',
                'confirmation_token' => Str::random(16),
                'is_active' => true,
            ];

            #Sauvegarde des données via le service
            $saved = $this->CandidatureService->saveCandidature($dateUser, $dateCandidature);

            #Vérification simple
            if ($saved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Candidat créée avec succès !',
                    'redirect' => route('notifCandidature')
                ], 200);
            } else {
                // Supprimer les fichiers si échec
                foreach ($uploadedFiles as $filePath) {
                    Files::deleteFile($filePath);
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de la création de la candidature.'
                ], 500);
            }


            //code...
        } catch (\Throwable $th) {
            Log::error("Erreur lors de la création de la candidature : " . $th->getMessage(), [
                'request_data' => $request->all(),
                'stack_trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #UPDATE CANDIDATURE
    public function updateCandidature(UpdateCandidatureRequest $request)
    {
        try {
            // dd($request->all());
            $fields = [
                'photo',
                'curriculum_vitae',
                'lettre_motivation',
                'certificat_nationalite',
                'lettre_recommendation_un',
                'lettre_recommendation_deux',
                'diplome_master',
                'diplome_bac',
                'releve_notes_bac',
                'resume_projet',
                'recu_paiement',
            ];

            $uploadedFiles = [];

            foreach ($fields as $field) {
                if ($request->hasFile($field)) {
                    // Upload du nouveau fichier
                    $uploadedFiles[$field] = Files::uploadFile($request->file($field));
                } else {
                    // Conserver l'ancien fichier si présent
                    $uploadedFiles[$field] = $request->input('old_' . $field, null);
                }
            }

            // Formatage des données
            $dateCandidature = [
                'candidature_id' => $request->candidature_id,
                'userId' => $request->user_id,
                'date_naissance' => $request->date_naissance,
                'telephone' => $request->telephone,
                'ecole_master' => $request->ecole_master,
                'photo' => $uploadedFiles['photo'],
                'curriculum_vitae' => $uploadedFiles['curriculum_vitae'],
                'lettre_motivation' => $uploadedFiles['lettre_motivation'],
                'certificat_nationalite' => $uploadedFiles['certificat_nationalite'],
                'lettre_recommendation_un' => $uploadedFiles['lettre_recommendation_un'],
                'lettre_recommendation_deux' => $uploadedFiles['lettre_recommendation_deux'],
                'diplome_master' => $uploadedFiles['diplome_master'],
                'diplome_bac' => $uploadedFiles['diplome_bac'],
                'releve_notes_bac' => $uploadedFiles['releve_notes_bac'],
                'resume_projet' => $uploadedFiles['resume_projet'],
                'recu_paiement' => $uploadedFiles['recu_paiement'],
                'is_active' => true,
            ];

            // Sauvegarde via le service
            $saved = $this->CandidatureService->updateCandidature($dateCandidature);

            if ($saved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Candidat mis à jour avec succès !',
                    'redirect' => route('notifUpdateCandidature')
                ], 200);
            } else {
                // Supprimer les fichiers si échec
                foreach ($uploadedFiles as $filePath) {
                    if ($filePath) {
                        Files::deleteFile($filePath);
                    }
                }
                return response()->json([
                    'success' => false,
                    'message' => __('messages.server_error')
                ], 500);
            }
        } catch (\Throwable $th) {
            Log::error("Erreur lors de la mise à jour de la candidature : " . $th->getMessage(), [
                'request_data' => $request->all(),
                'stack_trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #UPDATE USER
    public function updateIndoUser(Request $request)
    {
        try {
            // dd($request->all());
            $dateUser = [
                'user_id'   => $request->user_id,
                'name'      => $request->name,
                'email'     => $request->email,
                'role'      => 'candidat',
                'is_active' => true,
            ];

            if (isset($request->password)) {
                $dateUser['password'] = $request->password;
            }

            // Sauvegarde via le service
            $saved = $this->UserService->updateAccountUser($dateUser);

            if ($saved) {
                return response()->json([
                    'success' => true,
                    'message' => 'Candidat mis à jour avec succès !'
                    // 'redirect' => route('notifCandidature')
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur lors de la mise à jour du candidat.'
                ], 500);
            }
        } catch (\Throwable $th) {
            Log::error("Erreur lors de la mise à jour de l'user : " . $th->getMessage(), [
                'request_data' => $request->all(),
                'stack_trace' => $th->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }
}
