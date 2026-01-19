<?php

namespace App\Services;

use App\Repositories\CandidatRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $candidatRepository;
    protected $userRepository;

    public function __construct(CandidatRepository $candidatuRepository,
                                UserRepository $userRepository,){
        $this->candidatRepository = $candidatuRepository;
        $this->userRepository = $userRepository;
    }

    public function connexion($data)
    {
        try {
            return $this->userRepository->userLogin($data);
            // les verfification sur le role de l utilisateur tu peut les faire  dans ton controller
            // ex: if($response['data']->role == 'candidat') { ... }
            //  return [
            //      'status' => true,
            //      'data' => $user,
            //      'message' => 'votre compte a bien été confirmé'
            //  ];
        } catch (\Exception $th) {
            //throw $th;
            Log::error("Error while login : " . $th->getMessage(), []);

        }
    }

    public function proccessActiveAccount($data)
    {
        try {
            return $this->userRepository->activeAccount($data);
        } catch (\Exception $th) {
            Log::error("Error while activating account : " . $th->getMessage(), []);
        }
    }

    public function updateAccountUser($data)
    {
        try {
            return $this->userRepository->update($data);
        } catch (\Exception $th) {
            Log::error("Error while updating account user : " . $th->getMessage(), []);
        }
    }

    public function getUser($data)
    {
        try {
            if (isset($data['user_id'])) {
                return $this->userRepository->userById($data['user_id']);
            } elseif (isset($data['email'])) {
                return $this->userRepository->userByEmail($data['email']);
            } else {
                throw new \Exception("Invalid parameters: user_id or email required");
            }
        } catch (\Exception $th) {
            Log::error("Error while retrieving user info : " . $th->getMessage(), []);
        }
    }
}