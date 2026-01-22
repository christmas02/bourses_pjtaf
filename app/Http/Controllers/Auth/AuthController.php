<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Services\CandidatureServicess;
use App\Services\UserService;
use App\Services\Setting;
use App\Services\Files;
use App\Mail\ResetPasswordMail;

class AuthController extends Controller
{
    protected CandidatureServicess $CandidatureService;
    protected UserService $UserService;
    protected Setting $Setting;
    protected Files $Files;

    public function __construct(
        CandidatureServicess $CandidatureService,
        UserService $UserService,
        Setting $Setting,
        Files $Files
    ) {
        $this->CandidatureService = $CandidatureService;
        $this->UserService = $UserService;
        $this->Setting = $Setting;
        $this->Files = $Files;
    }

    # Page de connexion
    public function index()
    {
        return view('auth.connexion');
    }

    #Authentification
    public function login(Request $request)
    {
        try {
            // dd($request->all());
            // Authentification via le service
            $result = $this->UserService->connexion($request);
            // dd($result);
            if (!empty($result['status']) && $result['status'] === true) {

                $authUser = $result['data'];

                // Gestion par rôle
                if ($authUser->role === 'candidat') {

                    // Clôture automatique si la date système est >= 19/02/2026
                    $dateCloture = Carbon::createFromFormat('d/m/Y', '19/02/2026')->startOfDay();
                    if (Carbon::now()->greaterThanOrEqualTo($dateCloture)) {
                        return view('frontend.cloture-des-candidatures');
                    }

                    return redirect()
                        ->route('FormUpdateCandidature')
                        ->with('success', 'Bienvenue sur votre espace de candidature.');
                }

                if ($authUser->role === 'partenaire') {
                    return redirect('/partenaire-dashboard')
                        ->with('success', 'Bienvenue sur le tableau de bord partenaire.');
                }

                if ($authUser->role === 'jury') {
                    return redirect('/jury-dashboard')
                        ->with('success', 'Bienvenue sur le tableau de bord jury.');
                }

                if ($authUser->role === 'administrateur') {
                    return redirect('/admin-dashboard')
                        ->with('success', 'Bienvenue sur le tableau de bord administrateur.');
                }

                // Rôle non reconnu
                return redirect()
                    ->route('connexion')
                    ->with('error', 'Rôle utilisateur non reconnu.');
            }

            // Compte inactif
            return redirect()
                ->route('connexion')
                ->with('error', 'Votre compte est inactif.');
        } catch (\Throwable $th) {
            // Log de l’erreur pour le debug
            Log::error('Erreur lors de la connexion : ' . $th->getMessage());

            return redirect()
                ->route('connexion')
                ->with('error', 'Une erreur est survenue lors de la connexion. Veuillez réessayer.');
        }
    }


    #Mot de pas oublié
    public function verifyEmail()
    {
        return view('auth.verifyEmail');
    }

    // VÉRIFICATION DE L'EMAIL POUR RÉINITIALISATION DU MOT DE PASSE
    public function sendMailForResetPassword(Request $request)
    {
        try {
            // Validation de la requête
            $request->validate([
                'email' => 'required|email'
            ]);

            $data = [
                'email' => $request->email
            ];

            // Récupération de l'utilisateur
            $user = $this->UserService->getUser($data);

            if (!$user) {
                return redirect()->back()->with('error', 'Aucun compte associé à cette adresse email.');
            }

            // 👉 Ici : génération du token et envoi du mail (à implémenter)
            Mail::to($user->email)->send(new ResetPasswordMail($user));

            return redirect()->back()->with(
                'success',
                'Vérifiez votre boite mail, un email de réinitialisation a été envoyé avec succès.'
            );
        } catch (\Throwable $th) {

            // Log technique (serveur)
            Log::error('Erreur lors de la réinitialisation du mot de passe', [
                'exception' => $th,
            ]);

            // Réponse utilisateur (non technique)
            return redirect()->back()->with(
                'error',
                __('messages.server_error')
            );
        }
    }

    public function showResetForm($user_id, Request $request)
    {
        return view('auth.reset-password', [
            'user_id' => $user_id,
            'email' => $request->email
        ]);
    }

    public function saveNewPassword(Request $request)
    {
        try {
            // dd($request->all());
            $data = [
                'user_id' => $request->user_id,
                'email' => $request->email,
                'password' => $request->password,
            ];
            $saved = $this->UserService->updateAccountUser($data);
            // rediger le user sur la vue de connexion
            if ($saved) {
                # code...
                return redirect()->route('connexion')->with('success', 'Votre mot de passe a bien été mis à jour. Veuillez vous connecter.');
            }
            return redirect()->back()->with('error', 'Erreur lors de la modification du mot de passe.');
        } catch (\Throwable $th) {
            // En cas d'erreur, annuler toutes les modifications

            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'error');
        }
    }

    // confirmation de compte candidat
    public function confirm($user_id, $token)
    {
        try {
            $data = [
                'user_id' => $user_id,
                'confirmation_token' => $token,
            ];

            $user = $this->UserService->proccessActiveAccount($data);
            if ($user) {
                return redirect()->route('connexion')->with('success', 'votre compte a bien été confirmé');
            } else {
                return redirect()->route('connexion')->with('error', 'Ce lien  ne semble plus valide, veuillez contacter notre service d\'assistance via info@fondationbenianh.org ou au (+225) 0704436503 ( appels ou whatsapp).');
            }
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'activation de l'utilisateur : " . $th->getMessage(), [
                //'request_data' => $request->all(),
                'stack_trace' => $th->getTraceAsString(),
            ]);
            return redirect()->route('connexion')->with('error', "Une erreur s'est produite, veuillez réessayer plus tard.");
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
