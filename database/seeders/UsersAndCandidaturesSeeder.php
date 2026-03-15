<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersAndCandidaturesSeeder extends Seeder
{
    public function run()
    {
        $users = [];

        // 2 Admin
        for ($i = 1; $i <= 2; $i++) {
            $users[] = [
                'user_id' => Str::uuid(),
                'name' => "Admin $i",
                'email' => "admin$i@test.com",
                'role' => 'admin',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // 3 Jury
        for ($i = 1; $i <= 3; $i++) {
            $users[] = [
                'user_id' => Str::uuid(),
                'name' => "Jury $i",
                'email' => "jury$i@test.com",
                'role' => 'jury',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // 3 Partenaires
        for ($i = 1; $i <= 3; $i++) {
            $users[] = [
                'user_id' => Str::uuid(),
                'name' => "Partenaire $i",
                'email' => "partenaire$i@test.com",
                'role' => 'partenaire',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // 10 Candidats
        $prenoms = [
            'Kouassi',
            'Koffi',
            'Yao',
            'Konan',
            'N’Guessan',
            'Aya',
            'Aminata',
            'Fatou',
            'Mariame',
            'Adama',
            'Awa',
            'Mariam',
            'Salimata',
            'Souleymane'
        ];

        $noms = [
            'Kone',
            'Traore',
            'Ouattara',
            'Kouame',
            'Bamba',
            'Toure',
            'Kouadio',
            'Yeo',
            'Sangare',
            'Diallo',
            'Coulibaly',
            'Kone',
            'Koffi'
        ];
        $candidats = [];
        for ($i = 1; $i <= 10; $i++) {

            $uuid = Str::uuid();

            $users[] = [
                'user_id' => $uuid,
                'name' => $prenoms[array_rand($prenoms)] . ' ' . $noms[array_rand($noms)],
                'email' => "candidat$i@test.com",
                'role' => 'candidat',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];

            $candidats[] = $uuid;
        }

        DB::table('users')->insert($users);

        // Création des 10 candidatures
        $candidatures = [];

        foreach ($candidats as $index => $user_id) {

            $i = $index + 1;

            $candidatures[] = [
                'candidature_id' => Str::uuid(),
                'user_id' => $user_id,
                'date_naissance' => '1995-0' . rand(1, 9) . '-' . rand(10, 28),
                'telephone' => '07' . rand(00000000, 99999999),
                'ecole_master' => [
                    'Université Félix Houphouët-Boigny',
                    'INP-HB Yamoussoukro',
                    'Université Nangui Abrogoua',
                    'Université Alassane Ouattara',
                    'Université Virtuelle de Côte d’Ivoire'
                ][array_rand([
                    'Université Félix Houphouët-Boigny',
                    'INP-HB Yamoussoukro',
                    'Université Nangui Abrogoua',
                    'Université Alassane Ouattara',
                    'Université Virtuelle de Côte d’Ivoire'
                ])],

                'certificat_nationalite' => "certificat_nationalite.pdf",
                'curriculum_vitae' => "cv.pdf",
                'lettre_recommendation_un' => "recommandation1.pdf",
                'lettre_recommendation_deux' => "recommandation2.pdf",
                'lettre_motivation' => "lettre_motivation.pdf",
                'diplome_master' => "diplome_master.pdf",
                'photo' => "photo.jpg",
                'releve_notes_bac' => "releve_notes_bac.pdf",
                'diplome_bac' => "diplome_bac.pdf",
                'resume_projet' => "resume_projet.pdf",
                'recu_paiement' => "recu_paiement.pdf",

                'status' => ['pending', 'accepted', 'rejected'][array_rand(['pending', 'accepted', 'rejected'])],

                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('candidatures')->insert($candidatures);
    }
}
