<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJTAF - Bourse Jeunes Talents TOP TAX</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('/assets/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">
    <style>
        /* Style personnalisé pour aérer encore plus et correspondre à vos images */
        .login-card .login-main {
            width: 700px !important;
            padding: 20px !important;
            border-radius: 10px;
            box-shadow: 0 0 37px rgba(8, 21, 66, 0.05);
            margin: 0 auto;
            background-color: #fff;
        }



        .wizard-4 .action-bar {
            display: none !important;
        }

        /* Cache toutes les étapes par défaut sauf la première */
        div[id^="step-"] {
            display: none;
        }

        #step-1 {
            display: block;
        }

        /* Style pour l'indicateur d'étape active dans le wizard */
        .wizard-4 ul li.active h4 {
            background-color: #006666;
            color: #fff;
        }

        .wizard-4 ul li.disabled h4 {
            background-color: #006666 !important;
            color: #fff;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .buttons-right {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
            padding: auto;
            /* Pour espacer légèrement des autres contenus */
        }

        .step-item.active a {
            font-weight: bold;
            color: var(--theme-deafult);
        }

        .step-item.active h4::before {
            font-size: 12px;
            position: absolute;
            left: 5px;
            top: -3px;
            content: "\e64c";
            font-family: "themify";
            background-color: #fff;
            color: var(--theme-deafult);
            border-radius: 15px;
            padding: 2px;
            border: 1px solid;
            color: #fff;
            background: var(--theme-deafult);
        }

        .form-check-input:checked {
            background-color: #ff0501 !important;
            border-color: #ff0501 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        @yield('content')

        <!-- Scripts nécessaires -->
        <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <script src="{{asset('/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/assets/js/icons/feather-icon/feather.min.js')}}"></script>
        <script src="{{asset('/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
        <script src="{{asset('/assets/js/config.js')}}"></script>
        <script src="{{asset('/assets/js/form-wizard/form-wizard-five.js')}}"></script>
        <script src="{{asset('/assets/js/tooltip-init.js')}}"></script>
        <script src="{{asset('/assets/js/script.js')}}"></script>

        <script>
            $(document).ready(function() {
                let currentStep = 0;
                const steps = $('div[id^="step-"]');
                const stepItems = $('.step-item');

                // --- FONCTION DE NAVIGATION ---
                function showStep(index) {
                    // Masquer tout
                    steps.hide();
                    stepItems.removeClass('active');

                    // Afficher l'étape actuelle
                    $(steps[index]).show();
                    $(stepItems[index]).addClass('active');

                    currentStep = index;
                    window.scrollTo(0, 0); // Remonter en haut de page
                }

                // Initialisation
                showStep(0);

                // Boutons Suivant
                $('.btn-next').on('click', function() {
                    if (currentStep < steps.length - 1) {
                        showStep(currentStep + 1);
                    }
                });

                // Boutons Précédent
                $('.btn-prev').on('click', function() {
                    if (currentStep > 0) {
                        showStep(currentStep - 1);
                    }
                });

                // --- TRAITEMENT AJAX ---
                $(document).on('submit', '.ajax-form', function(e) {
                    e.preventDefault();

                    const $form = $(this);
                    const $submitBtn = $form.find('button[type="submit"]');
                    const formData = new FormData(this);
                    const originalBtnHtml = $submitBtn.html();

                    // Reset visuel
                    $form.find('.is-invalid').removeClass('is-invalid');
                    $form.find('.invalid-feedback').remove();

                    $submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Envoi...');

                    $.ajax({
                        url: $form.attr('action'),
                        method: $form.attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json'
                        },
                        success: function(response) {
                            if (typeof showAjaxAlert === 'function') {
                                showAjaxAlert('success', response.message);
                            }
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }
                        },
                        error: function(xhr) {
                            $submitBtn.prop('disabled', false).html(originalBtnHtml);

                            if (xhr.status === 422) {
                                const errors = xhr.responseJSON.errors;
                                let firstErrorField = null;

                                $.each(errors, function(fieldName, messages) {
                                    let $input = $form.find(`[name="${fieldName}"], [name="${fieldName}[]"]`).first();

                                    if ($input.length > 0) {
                                        if (!firstErrorField) firstErrorField = $input;

                                        $input.addClass('is-invalid');
                                        let errorMsg = `<div class="invalid-feedback d-block fw-bold">${messages[0]}</div>`;

                                        // Placement du message
                                        if ($input.closest('.card-body').length && $input.attr('type') === 'file') {
                                            $input.after(errorMsg);
                                        } else {
                                            $input.after(errorMsg);
                                        }
                                    }
                                });

                                // --- LOGIQUE DE RETOUR A L'ERREUR ---
                                if (firstErrorField) {
                                    // 1. Trouver l'étape qui contient le champ en erreur
                                    const errorStepDiv = firstErrorField.closest('div[id^="step-"]');
                                    const errorStepId = errorStepDiv.attr('id');

                                    // 2. Trouver l'index de cette étape
                                    const errorStepIndex = steps.index(errorStepDiv);

                                    // 3. Naviguer vers cette étape
                                    showStep(errorStepIndex);

                                    // 4. Focus et scroll vers le champ
                                    setTimeout(() => {
                                        firstErrorField.focus();
                                        $('html, body').animate({
                                            scrollTop: firstErrorField.offset().top - 150
                                        }, 500);
                                    }, 300);
                                }

                                if (typeof showAjaxAlert === 'function') {
                                    showAjaxAlert('danger', "Veuillez corriger les erreurs.");
                                }

                            } else {
                                const errorTxt = xhr.responseJSON?.message || "Une erreur est survenue.";
                                if (typeof showAjaxAlert === 'function') {
                                    showAjaxAlert('danger', errorTxt);
                                }
                            }
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>