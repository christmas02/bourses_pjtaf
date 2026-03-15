<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repositories\CandidatRepository;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    protected CandidatRepository $CandidatRepository;
    protected UserRepository $userRepository;


    public function __construct(CandidatRepository $CandidatRepository, UserRepository $userRepository)
    {
        $this->CandidatRepository = $CandidatRepository;
        $this->userRepository = $userRepository;
    }

    //
    public function index()
    {
        try {
            #Affichage de la liste des candidatures
            $ListCandidature = $this->CandidatRepository->getAllCandidats();
            // dd($ListCandidature);
            return view('backend.admin.index', compact('ListCandidature'));
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error("Erreur lors de l'affichage du tableau de bord admin : " . $th->getMessage(), []);
            // Affichage d'une page d'erreur générique
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #Affichage du dossier de candidature d'un candidat
    public function dossierCandidature($user_id)
    {
        try {
            $candidature = $this->CandidatRepository->Candidature($user_id);
            // dd($candidature);
            if (!$candidature) {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.candidature_not_found')
                ], 404);
            }
            return view('backend.admin.dossierCandidature', compact('candidature'));
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'affichage du dossier de candidature : " . $th->getMessage(), []);
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #Affichage de la liste des collaborateurs
    public function listeCollaborateurs()
    {
        try {
            #Affichage de la liste des collaborateurs
            $collaborateurs = $this->userRepository->listUser();
            // dd($collaborateurs);
            return view('backend.admin.listeCollaborateurs', compact('collaborateurs'));
        } catch (\Throwable $th) {
            // Log de l'erreur
            Log::error("Erreur lors de l'affichage de la liste des collaborateurs : " . $th->getMessage(), []);
            // Affichage d'une page d'erreur générique
            return response()->json([
                'success' => false,
                'message' => __('messages.server_error')
            ], 500);
        }
    }

    #Création d'un collaborateur
    // public function createCollaborateur(Request $request)
    // {
    //     try {
    //         $data = $request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|email|unique:users,email',
    //             'password' => 'nullable|string|min:8',
    //             'role' => 'required|in:jury,admin,partenaire',
    //         ]);


    //         if (isset($data['user_id'])) {

    //             $data = [
    //                 'name' => $data['name'],
    //                 'email' => $data['email'],
    //                 'role' => $data['role'],
    //             ];
    //             if (isset($request->password) && !empty($request->password)) {
    //                 $data['password'] = $request->password;
    //             }

    //             $this->userRepository->update($data);
    //             return redirect()->back()->with('success', 'Collaborateur mis à jour avec succès');
    //         } else {

    //             $data = [
    //                 'user_id' => (string) Str::uuid(),
    //                 'name' => $data['name'],
    //                 'email' => $data['email'],
    //                 'password' => Hash::make($request->password),
    //                 'role' => $data['role'],
    //             ];
    //             $this->userRepository->createUser($data);

    //             return redirect()->back()->with('success', 'Collaborateur créé avec succès');
    //         }
    //     } catch (\Throwable $th) {
    //         Log::error("Erreur lors de la création du collaborateur : " . $th->getMessage(), []);
    //         return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du collaborateur');
    //     }
    // }

    public function createCollaborateur(Request $request)
    {
        try {
            // 1. FIX: Ajout de 'user_id' dans la validation pour détecter le mode update
            $data = $request->validate([
                'user_id'  => 'nullable|string',
                'name'     => 'required|string|max:255',
                'email'    => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($request->user_id, 'user_id'),
                ],
                'password' => 'nullable|string|min:8',
                'role'     => 'required|in:jury,admin,partenaire',
            ]);

            if (!empty($data['user_id'])) {

                // 2. FIX: Construire $updateData séparément pour ne pas écraser $data
                $updateData = [
                    'user_id' => $data['user_id'],
                    'name'  => $data['name'],
                    'email' => $data['email'],
                    'role'  => $data['role'],
                ];

                if (!empty($request->password)) {
                    // 3. FIX: Hasher le mot de passe également lors de la mise à jour
                    $updateData['password'] = Hash::make($request->password);
                }

                // 4. FIX: Passer l'identifiant à update() pour cibler le bon utilisateur
                $this->userRepository->update($updateData);

                return redirect()->back()->with('success', 'Collaborateur mis à jour avec succès');
            } else {

                // 5. FIX: Vérifier que le mot de passe est fourni en mode création
                if (empty($data['password'])) {
                    return redirect()->back()->withErrors(['password' => 'Le mot de passe est obligatoire pour la création.'])->withInput();
                }

                $createData = [
                    'user_id'  => (string) Str::uuid(),
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role'     => $data['role'],
                ];

                $this->userRepository->createUser($createData);

                return redirect()->back()->with('success', 'Collaborateur créé avec succès');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // 6. FIX: Distinguer les erreurs de validation des autres exceptions
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            Log::error("Erreur lors de la création du collaborateur : " . $th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du collaborateur');
        }
    }


    // Envoie de mail par l'admin
    public static function sendEmail(Request $request)
    {
        try {
            // Récupération des données du formulaire
            $email = $request->input('to');
            $objet = $request->input('subject');
            $message = $request->input('message');
            $user = User::where('email', $email)->first();
            $name = $user->name;

            // Envoi de l'e-mail
            UserRepository::adminSendMail($email, $name, $message, $objet);

            return redirect()->back()->with('success', 'E-mail envoyé avec succès');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'e-mail');
        }
    }
}
