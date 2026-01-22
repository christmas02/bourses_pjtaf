<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PJTAF - Programme Jeunes Talents en Fiscalités. Bourse d'excellence pour les étudiants en Master 2 Fiscalité et Droit des Affaires.">
    <meta name="author" content="TOP TAX International / Fondation Benianh">

    <link rel="icon" href="{{asset('/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}" type="image/x-icon">

    <title>PJTAF 2026 - Programme Jeunes Talents en Fiscalités</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/animate.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">

    <!-- App css (CORRIGÉ ICI) -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">
    <style>
        .hero-dates {
            background: rgba(255, 208, 0, 0.2);
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        @media only screen and (max-width: 575px) {
            .landing-home {
                height: 900px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .landing-home .navbar-toggler {
                padding: none;
                padding-right: 29px !important;
            }
        }

        @media only screen and (max-width: 991px) {
            .feature-section {
                height: 625px !important;
            }
        }
    </style>

</head>

<body class="landing-page">
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <div class="landing-page-wrapper">
        <!-- Section Accueil -->
        <div class="landing-home" id="home">
            <div class="container-fluid">
                <div class="sticky-header">
                    <header>
                        <nav class="navbar navbar-b navbar-dark navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu">
                            <a class="navbar-brand p-0" href="/">
                                <h3 class="text-black mb-0">PJTAF <span class="font-primary">2026</span></h3>
                            </a>
                            <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault">
                                <span></span><span></span><span></span>
                            </button>
                            <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                                <ul class="navbar-nav navbar_nav_modify">
                                    <li class="nav-item"><a class="nav-link active" href="#home">Accueil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#presentation">Le Programme</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#eligibilite">Éligibilité</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#processus">Processus</a></li>
                                </ul>
                            </div>
                            <div class="">
                                <a class="nav-link js-scroll px-4 py-2 bg-light text-dark rounded-pill fw-bold" href="{{ route('connexion') }}">Se Connecter</a>
                            </div>
                        </nav>
                    </header>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10 col-sm-12">
                        <div class="content text-center">
                            <div>
                                <div class="hero-dates text-black">
                                    <i class="fa fa-calendar me-2"></i> Candidatures : 19 Janvier au 19 Février 2026
                                </div>
                                <h1 class="text-center text-black">
                                    Programme Jeunes Talents <br> en <span class="font-primary text-uppercase">Fiscalités</span> (PJTAF)
                                </h1>
                                <p class="text-black mt-4 f-20 px-lg-5">
                                    Bourses & Accélérateur de Jeunes Talents porté par <strong>TOP TAX International</strong> en partenariat avec la <strong>Fondation Benianh International</strong>.
                                </p>

                                <div class="mt-5">
                                    <a class="btn btn-primary btn-apply me-3" href="{{ route('candidature') }}">Cliquez ici pour candidater</a>
                                </div>
                            </div>
                        </div>

                        <div class="star-animate">
                            <img class="img-fluid" src="{{asset('/assets/images/landing/Vector.png')}}" alt="">
                        </div>

                        <div class="screen-1 mt-5">
                            <div class="card p-4 bg-white shadow-lg text-dark text-start border-0">
                                <div class="row text-center">
                                    <div class="col-md-4 border-end">
                                        <h4 class="font-primary fw-bold">15 Mois</h4>
                                        <p class="mb-0">Formation & Immersion</p>
                                    </div>
                                    <div class="col-md-4 border-end">
                                        <h4 class="font-primary fw-bold">10 à 15</h4>
                                        <p class="mb-0">Bénéficiaires sélectionnés</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="font-primary fw-bold">BAC+5</h4>
                                        <p class="mb-0">Diplôme requis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Présentation Section -->
        <section class="demo-section section-py-space" id="presentation">
            <div class="title text-center">
                <h5>À PROPOS</h5>
                <h2 class="mb-lg-2 mb-0">Objectifs Stratégiques</h2>
            </div>
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 text-center h-100 shadow-sm border-0">
                            <div class="mb-3"><i class="fa fa-graduation-cap fa-3x font-primary"></i></div>
                            <h5>Recrutement d'Excellence</h5>
                            <p>Identifier les meilleurs diplômés BAC+5 en Fiscalité et Droit des Affaires en Côte d'Ivoire.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 text-center h-100 shadow-sm border-0">
                            <div class="mb-3"><i class="fa fa-rocket fa-3x font-primary"></i></div>
                            <h5>Incubation Pratique</h5>
                            <p>Mise en situation réelle via des cabinets de conseil juridique, fiscalité et avocats.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 text-center h-100 shadow-sm border-0">
                            <div class="mb-3"><i class="fa fa-handshake-o fa-3x font-primary"></i></div>
                            <h5>Insertion Durable</h5>
                            <p>Accompagnement vers un emploi stable pour contribuer à la création de valeur économique.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Éligibilité Section -->
        <section class="section-py-space feature-section light-bg" id="eligibilite">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title text-center">
                            <h5>CONDITIONS</h5>
                            <h2 class="mb-lg-2 mb-0">Critères d'Éligibilité</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="feature-box common-card bg-feature">
                            <div class="feature-icon bg-white">
                                <div><i class="fa fa-flag font-primary"></i></div>
                            </div>
                            <h5 class="text-center">Nationalité</h5>
                            <p class="mb-0 text-center">Être impérativement de nationalité Ivoirienne.</p>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="feature-box common-card bg-feature">
                            <div class="feature-icon bg-white">
                                <div><i class="fa fa-book font-primary"></i></div>
                            </div>
                            <h5 class="text-center">Diplôme BAC+5</h5>
                            <p class="mb-0 text-center">Master 2 en Fiscalité ou en Droit des Affaires.</p>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="feature-box common-card bg-feature">
                            <div class="feature-icon bg-white">
                                <div><i class="fa fa-clock-o font-primary"></i></div>
                            </div>
                            <h5 class="text-center">Disponibilité</h5>
                            <p class="mb-0 text-center">S'engager sur la durée totale du programme (15 mois).</p>
                        </div>
                    </div>
                    <!-- Section Documents à fournir -->
                    <div class="row mt-5 justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm p-4 p-md-5">
                                <h3 class="font-primary mb-4 text-center text-md-start">Documents à fournir</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled doc-list">
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Certificat de nationalité</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> CV actualisé</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Photo d’identité (récente)</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Diplôme de Master 2 ou attestation de réussite</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Diplômes obtenus et relevés de notes (depuis le BAC)</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled doc-list">
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> 02 lettres de recommandation (Professeurs principaux)</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Lettre de motivation et d’engagement</li>
                                            <li class="mb-3 d-flex align-items-start"><i class="fa fa-file-text-o font-primary me-3 mt-1"></i> Résumé du projet de soutenance (max 3 pages)</li>
                                        </ul>

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
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>

        <!-- Processus Section -->
        <section class="application-section section-py-space" id="processus">
            <div class="title text-center">
                <h5>ÉTAPES</h5>
                <h2 class="mb-lg-2 mb-0">Processus de Sélection</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mx-auto">
                        <div class="list-group list-group-flush shadow-sm rounded">
                            <div class="list-group-item d-flex align-items-center p-3">
                                <span class="badge bg-primary rounded-circle me-3">1</span> Appel à candidatures en ligne
                            </div>
                            <div class="list-group-item d-flex align-items-center p-3">
                                <span class="badge bg-primary rounded-circle me-3">2</span> Pré-sélection administrative
                            </div>
                            <div class="list-group-item d-flex align-items-center p-3">
                                <span class="badge bg-primary rounded-circle me-3">3</span> Évaluation académique par un Jury
                            </div>
                            <div class="list-group-item d-flex align-items-center p-3">
                                <span class="badge bg-primary rounded-circle me-3">4</span> Entretiens individuels
                            </div>
                            <div class="list-group-item d-flex align-items-center p-3">
                                <span class="badge bg-primary rounded-circle me-3">5</span> Sélection finale & Notification
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="landing-footer section-py-space" id="footer">
            <div class="custom-container text-center">
                <h2 class="f-w-600 mb-4 text-white">Prêt à propulser votre carrière en fiscalité ?</h2>
                <div class="btn-footer">
                    <a class="btn btn-lg btn-primary btn-apply" href="{{ route('candidature') }}">Candidater maintenant</a>
                </div>
                <p class="mt-5 f-w-500 text-white">© 2026 PJTAF - TOP TAX International & Fondation Benianh International.</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('/assets/js/animation/wow/wow.min.js')}}"></script>
    <script src="{{asset('/assets/js/landing_sticky.js')}}"></script>
    <script src="{{asset('/assets/js/landing.js')}}"></script>

    <script>
        // Initialisation de Feather Icons
        feather.replace();
        // Initialisation WOW
        new WOW().init();
    </script>
</body>

</html>