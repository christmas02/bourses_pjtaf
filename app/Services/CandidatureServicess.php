<?php

namespace App\Services;

use App\Mail\NotificationActivationAccount;
use App\Mail\ValidReceptionCandidature;
use App\Repositories\CandidatRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CandidatureServicess
{
    protected $candidatRepository;
    protected $userRepository;

    public function __construct(
        CandidatRepository $candidatuRepository,
        UserRepository $userRepository,
    ) {
        $this->candidatRepository = $candidatuRepository;
        $this->userRepository = $userRepository;
    }
    public function saveCandidature($user, $candidature)
    {
        try {
            DB::beginTransaction();
            // create a new user role
            $newUser = $this->userRepository->createUser($user);
            // create a new candidature
            $newCandida = $this->candidatRepository->saveCandidature($candidature);
            // if the candidature is saved successfully, send two emails de notification
            // Activation account email to candidate
            Mail::to($user['email'])->send(new NotificationActivationAccount($newUser));
            // Valid reception candidature
            Mail::to($user['email'])->send(new ValidReceptionCandidature($newUser));
            // Commit de la transaction SQL
            DB::commit();

            return true;
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error("Error save candidature : " . $th->getMessage());
        }
    }

    public function profilCandidat($user_id)
    {
        try {
            // info user
            $user = $this->userRepository->userById($user_id);
            // info candidature
            $candidature = $this->candidatRepository->Candidature($user_id);
            return [
                'user' => $user,
                'candidature' => $candidature
            ];
        } catch (\Exception $th) {
            Log::error("Error profil candidature : " . $th->getMessage());
        }
    }

    public function updateCandidature($data)
    {
        try {
            return $this->candidatRepository->updateCandidature($data);
        } catch (\Exception $th) {
            Log::error("Error update candidature : " . $th->getMessage());
        }
    }
}
