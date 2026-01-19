<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->uuid('candidature_id')->primary();
            $table->uuid('user_id');
            $table->date('date_naissance');
            $table->string('telephone');
            $table->string('ecole_master');
            $table->string('certificat_nationalite')->nullable();
            $table->string('curriculum_vitae')->nullable();
            $table->string('lettre_recommendation_un')->nullable();
            $table->string('lettre_recommendation_deux')->nullable();
            $table->string('lettre_motivation')->nullable();
            $table->string('diplome_master')->nullable();
            $table->string('photo')->nullable();
            $table->string('releve_notes_bac')->nullable();
            $table->string('diplome_bac')->nullable();
            $table->string('resume_projet')->nullable();
            $table->string('recu_paiement')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatures');
    }
};
