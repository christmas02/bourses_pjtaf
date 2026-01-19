<?php

namespace App\Repositories;

use App\Models\Candidature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRepository
{
    public function userLogin($data)
    {
        try {
            $credentials = $data->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            // Your logic to retrieve user by email goes here
            $user = User::where('email', $data['email'])->first();
            if ($user && $user->confirmation_token !== null) {
                return [
                    'status' => false,
                    'message' => 'Votre compte n\'est pas encore activé. Veuillez vérifier votre email pour le lien d\'activation.'
                ];
            }
            // Tentative de connexion
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                // account actif
                if ($user->is_active == true) {
                    return [
                        'status' => true,
                        'data' => $user,
                        'message' => 'Connexion réussie.'
                    ];
                } else {
                    // Compte incatif
                    return [
                        'status' => false,
                        'message' => 'Echec de connexion.'
                    ];
                }
            }

        } catch (\Throwable $th) {
            Log::error("Error while retrieving user: " . $th->getMessage(), []);
        }
    }

    public function activeAccount($data)
    {
        try {
            $user = User::where('user_id', $data['user_id'])->where('confirmation_token', $data['confirmation_token'])->first();
            if ($user) {
                $user->confirmation_token = null;
                $user->is_active = true;
                $user->save();
                return [
                    'status' => true,
                    'data' => $user,
                    'message' => 'votre compte a bien été confirmé'
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Ce lien  ne semble plus valide, veuillez contacter notre service d\'assistance via info@fondationbenianh.org ou au (+225) 0704436503 ( appels ou whatsapp).'
                ];
            }

        } catch (\Throwable $th) {
            Log::error("Error while activating account: " . $th->getMessage(), []);
        }
    }

    public function userById($user_id)
    {
        return User::where('user_id', $user_id)->first();
    }

    public function userByEmail($email)
    {
        return User::where('email', $email)->first();
    }


    public function createUser($data)
    {
        try {
            $user = new User();
            $user->user_id = $data['user_id'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->role = $data['role'];
            $user->confirmation_token = Str::random(16);
            $user->is_active = 0;

            $user->save();
            return $user;
            // Your logic to create or update a user goes here
        } catch (\Throwable $th) {
            Log::error("Error while creating user: " . $th->getMessage(), []);
        }
    }

    public function update($data)
    {
        try {
            $user = User::where('user_id', $data['user_id'])->first();
            $user->name = $data['name'] ?? $user->name;
            $user->email = $data['email'] ?? $user->email;
            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            $user->save();
            return $user;
            // Your logic to create or update a user goes here
        } catch (\Throwable $th) {
            Log::error("Error while updating user: " . $th->getMessage(), []);
        }
    }

    public function saveNotification($data)
    {
        try {
            // Your logic to save notification goes here

        } catch (\Throwable $th) {
            Log::error("Error while saving notification: " . $th->getMessage(), []);
        }
    }
}