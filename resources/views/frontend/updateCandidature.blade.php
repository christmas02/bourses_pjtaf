@extends('frontend.layout.app')
@section('content')
<div class="row">
    <div class="col-sm-6">@include('frontend.layout.status')</div>
    <div class="col-12 p-0">
        <div>
            <div class="theme-form">
                <form class="wizard-4 ajax-form" id="wizard" action="{{ route('updateCandidature') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="candidature_id" value="{{ $candidature->candidature_id }}">
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                    <ul>
                        <li> <a class="logo text-start ps-0" href="{{ route('connexion') }}"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="logo"><img class="img-fluid for-light" src="../assets/images/logo/logo_dark.png" alt="logo"></a></li>

                        <li class="step-item active" id="item-step-2">
                            <a href="#step-2">
                                <h4>2</h4>
                                <h5>Profil</h5><small>Infos personnelles</small>
                            </a>
                        </li>
                        <li class="step-item active" id="item-step-2">
                            <a href="#step-3">
                                <h4>3</h4>
                                <h5>Documents</h5><small>CV & Recommandations</small>
                            </a>
                        </li>
                        <li class="pb-0 step-item active" id="item-step-1">
                            <a href="#step-4">
                                <h4>4</h4>
                                <h5>Validation</h5><small>Diplômes & Paiement</small>
                            </a>
                        </li>
                        <li><img src="../assets/images/login/icon.png" alt="icon"></li>
                    </ul>

                    <!-- ÉTAPE 2 : INFORMATIONS PERSONNELLES -->
                    <div id="step-2">
                        <div class="wizard-title d-flex align-items-center mb-4">
                            <!-- Avatar à gauche -->
                            <div class="avatar-wrapper me-3 text-center" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="cursor:pointer;">
                                <img src="{{ asset(env('IMAGES_PATH') . '/' . $candidature->photo) }}" alt="Avatar" class="avatar img-thumbnail rounded-circle" style="width: 80px; height: auto;">
                                <p class="small mt-2">Modifier</p>
                            </div>

                            <!-- Titre -->
                            <div>
                                <h2>Informations Personnelles</h2>
                                <h5 class="text-muted mb-0">Détails de votre profil de candidat</h5>
                            </div>
                        </div>
                        <div class="login-main">
                            <div class="theme-form">
                                <div class="form-group mb-3">
                                    <label for="date_naissance">Date de Naissance <span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_naissance" name="date_naissance" type="date" value="{{ $candidature->date_naissance }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telephone">Téléphone <span class="text-danger">*</span></label>
                                    <input class="form-control" id="telephone" name="telephone" type="tel" value="{{ $candidature->telephone }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ecole_master">École de Master <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ecole_master" name="ecole_master" type="text" value="{{ $candidature->ecole_master }}" required>
                                </div>
                                <!-- <button type="button" class="btn btn-primary btn-prev me-3">Précédent</button> -->
                                <button type="button" class="btn btn-primary btn-next">Suivant</button>
                            </div>
                        </div>
                    </div>

                    <!-- ÉTAPE 3 : PIÈCES JOINTES (PARTIE 1) -->
                    <div id="step-3">
                        <div class="wizard-title">
                            <h2>Documents de Candidature</h2>
                            <h5 class="text-muted mb-4">Téléchargez vos documents (Format PDF/Image)</h5>
                        </div>

                        <div class="wizard-step-container">
                            <div class="login-main">
                                <div class="theme-form">
                                    <div class="row">
                                        @php
                                        $docsStep3 = [
                                        'photo' => "Photo d'identité",
                                        'curriculum_vitae' => "Curriculum Vitae (CV)",
                                        'lettre_motivation' => "Lettre de Motivation",
                                        'certificat_nationalite' => "Certificat de Nationalité",
                                        'lettre_recommendation_un' => "Lettre de Recommandation 1",
                                        'lettre_recommendation_deux' => "Lettre de Recommandation 2"
                                        ];
                                        @endphp

                                        @foreach($docsStep3 as $field => $label)
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label fw-bold">{{ $label }}</label>

                                            @if(isset($candidature) && $candidature->$field)
                                            <!-- Affichage du lien vers le fichier actuel -->
                                            <div class="mb-1 p-1 border rounded bg-light d-flex align-items-center justify-content-between">
                                                <a href="{{ env('IMAGES_PATH') }}/{{ $candidature->$field }}" target="_blank" class="text-primary small">
                                                    <i class="fa fa-file-text-o me-1"></i> Voir le document actuel
                                                </a>
                                                <span class="badge bg-success">Enregistré</span>
                                            </div>
                                            <!-- Champ caché pour conserver l'ancien fichier -->
                                            <input type="hidden" name="old_{{ $field }}" value="{{ $candidature->$field }}">
                                            @endif

                                            <input class="form-control" name="{{ $field }}" type="file" @if(!isset($candidature)) required @endif>
                                            <small class="text-muted">Laissez vide pour conserver l'actuel (si modification)</small>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-3">
                                        <button type="button" class="btn btn-primary btn-prev me-3">Précédent</button>
                                        <button type="button" class="btn btn-primary btn-next">Suivant</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ÉTAPE 4 : ACADÉMIQUE & PAIEMENT -->
                    <div id="step-4">
                        <div class="wizard-title">
                            <h2>Validation Finale</h2>
                            <h5 class="text-muted mb-4">Diplômes et preuve de paiement</h5>
                        </div>

                        <div class="wizard-step-container">
                            <div class="login-main">
                                <div class="theme-form">
                                    <div class="row">
                                        @php
                                        $docsStep4 = [
                                        'diplome_master' => "Diplôme de Master",
                                        'diplome_bac' => "Diplôme du BAC",
                                        'releve_notes_bac' => "Relevé de notes BAC",
                                        'projet_soutenu' => "Projet soutenu (Résumé/Fichier)"
                                        ];
                                        @endphp

                                        @foreach($docsStep4 as $field => $label)
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label fw-bold">{{ $label }}</label>

                                            @if(isset($candidature) && $candidature->$field)

                                            <div class="mb-1 p-1 border rounded bg-light d-flex align-items-center justify-content-between">
                                                <a href="{{ env('IMAGES_PATH') }}/{{ $candidature->$field }}" target="_blank" class="text-primary small">
                                                    <i class="fa fa-file-text-o me-1"></i> Voir le document actuel
                                                </a>
                                                <span class="badge bg-success">Enregistré</span>
                                            </div>
                                            <input type="hidden" name="old_{{ $field }}" value="{{ $candidature->$field }}">

                                            @endif

                                            <input class="form-control" name="{{ $field }}" type="file" @if(!isset($candidature)) required @endif>
                                        </div>
                                        @endforeach

                                        <!-- CAS SPÉCIFIQUE : REÇU DE PAIEMENT -->
                                        <div class="col-12 mb-1 mt-2">
                                            <div class="card bg-light-primary border-dashed">
                                                <div class="card-body">
                                                    <label class="form-label text-success fw-bold">Reçu de paiement des frais de dossier</label>

                                                    @if(isset($candidature) && $candidature->recu_paiement)
                                                    <div class="mb-1">
                                                        <a href="{{ env('IMAGES_PATH') }}/{{ $candidature->recu_paiement }}" target="_blank" class="badge bg-success p-2 text-white text-decoration-none">
                                                            <i class="fa fa-check-circle me-1"></i> Reçu déjà transmis (Voir)
                                                        </a>
                                                        <input type="hidden" name="old_recu_paiement" value="{{ $candidature->recu_paiement }}">
                                                    </div>
                                                    @endif

                                                    <input class="form-control bg-white" name="recu_paiement" type="file" @if(!isset($candidature)) required @endif>
                                                    <small class="text-muted d-block mt-1">Veuillez joindre le scan du reçu officiel.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="buttons-right mt-0">
                                        <button type="button" class="btn btn-secondary btn-prev me-3">Précédent</button>
                                        <button type="submit" class="btn btn-primary px-5">Soumettre la candidature</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <!-- Modal Bootstrap pour modifier les infos -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel">Modifier vos informations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <form class="ajax-form" id="editProfileForm" action="{{ route('updateIndoUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="modalName" class="form-label">Nom Complet</label>
                                <input type="text" class="form-control" id="modalName" name="name" value="{{ $user->name }}">
                                <input type="hidden" class="form-control" name="user_id" value="{{ $user->user_id }}">
                            </div>
                            <div class="mb-3">
                                <label for="modalEmail" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" id="modalEmail" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mot de passe </label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="********">
                                <small class="text-muted">Laissez vide pour conserver l'actuel mot de passe</small>
                                <input class="form-control" name="old_password" type="hidden" value="{{ $user->password }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection