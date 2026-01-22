@extends('frontend.layout.app')
@section('content')
<div class="row">
    <div class="col-sm-6">@include('frontend.layout.status')</div>
    <div class="col-12 p-0">
        <div>
            <div class="theme-form">
                <form class="wizard-4 ajax-form" id="wizard" action="{{ route('saveCandidature') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul>
                        <li> <a class="logo text-start ps-0" href="{{ route('connexion') }}"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="logo"><img class="img-fluid for-light" src="../assets/images/logo/logo_dark.png" alt="logo"></a></li>
                        <li class="step-item active" id="item-step-1">
                            <a href="#step-1">
                                <h4>1</h4>
                                <h5>Compte</h5><small>Identifiants de connexion</small>
                            </a>
                        </li>
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

                    <!-- ÉTAPE 1 : CRÉATION DU COMPTE -->
                    <div id="step-1">
                        <div class="wizard-title">
                            <h2>Créer votre compte</h2>
                            <h5 class="text-muted mb-4">Informations de base pour votre accès</h5>
                        </div>
                        <div class="login-main">
                            <div class="theme-form">
                                <div class="form-group mb-3">
                                    <label for="name">Nom Complet <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Ex: Jean Dupont" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Adresse Email <span class="text-danger">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="nom@exemple.com" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Mot de passe <span class="text-danger">*</span></label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="********" required>
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>

                                <div class="buttons-right">
                                    <button type="button" class="btn btn-primary btn-next">Suivant</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ÉTAPE 2 : INFORMATIONS PERSONNELLES -->
                    <div id="step-2">
                        <div class="wizard-title">
                            <h2>Informations Personnelles</h2>
                            <h5 class="text-muted mb-4">Détails de votre profil de candidat</h5>
                        </div>
                        <div class="login-main">
                            <div class="theme-form">
                                <div class="form-group mb-3">
                                    <label for="date_naissance">Date de Naissance <span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_naissance" name="date_naissance" type="date" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telephone">Téléphone <span class="text-danger">*</span></label>
                                    <input class="form-control" id="telephone" name="telephone" type="tel" placeholder="+225 00 00 00 00 00" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ecole_master">École de Master <span class="text-danger">*</span></label>
                                    <input class="form-control" id="ecole_master" name="ecole_master" type="text" placeholder="Nom de l'établissement" required>
                                </div>
                                <button type="button" class="btn btn-primary btn-prev me-3">Précédent</button>
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
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Photo d'identité</label>
                                            <input class="form-control" name="photo" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Curriculum Vitae (CV)</label>
                                            <input class="form-control" name="curriculum_vitae" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lettre de Motivation</label>
                                            <input class="form-control" name="lettre_motivation" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Certificat de Nationalité</label>
                                            <input class="form-control" name="certificat_nationalite" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lettre de Recommandation 1</label>
                                            <input class="form-control" name="lettre_recommendation_un" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Lettre de Recommandation 2</label>
                                            <input class="form-control" name="lettre_recommendation_deux" type="file">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-prev me-3">Précédent</button>
                                    <button type="button" class="btn btn-primary btn-next">Suivant</button>
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
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Diplôme de Master</label>
                                            <input class="form-control" name="diplome_master" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Diplôme du BAC</label>
                                            <input class="form-control" name="diplome_bac" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Relevé de notes BAC</label>
                                            <input class="form-control" name="releve_notes_bac" type="file">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Projet soutenu (Résumé/Fichier)</label>
                                            <input class="form-control" name="resume_projet" type="file">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="card bg-light-primary">
                                                <div class="card-body">
                                                    <label class="form-label text-success fw-bold">Reçu de paiement des frais de dossier</label>
                                                    <input class="form-control" name="recu_paiement" type="file">
                                                    <small class="text-muted">Veuillez joindre le scan du reçu officiel.</small>
                                                </div>
                                            </div>
                                            <!-- Encadré Paiement -->
                                            <div class="p-3 mt-4 rounded-3 border-start border-primary border-4 bg-light shadow-sm">
                                                <h6 class="fw-bold text-dark mb-2">Frais de candidature : 25 000 FCFA</h6>
                                                <p class="mb-0 small text-muted">
                                                    <img src="https://financesao.com/wp-content/uploads/2025/06/WAVE-recrute-pour-ce-poste-12-Decembre-2024.png" alt="Wave" height="20" class="me-2">
                                                    Paiement via <strong>Wave</strong> au : <span class="badge bg-primary fs-6">07 04 43 65 03</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="buttons-right">
                                        <button type="button" class="btn btn-primary btn-prev me-3">Précédent</button>
                                        <button type="submit" class="btn btn-primary">Soumettre</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection