<!DOCTYPE html>
<html lang="fr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Un programme de bourses dédié à la promotion et à la valorisation des compétences dans le digital, le numérique et les sciences fondamentales appliquées">
  <meta name="keywords" content="Programme de bourses, promotion des compétences, valorisation des talents, formation académique, soutien éducatif">
  <meta name="author" content="Yango">
  <title>Yango Fellowship - Programme bourse d'étude</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/feather-icon.css')}}">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{asset('/assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">
</head>

<body>

  @yield('content')

  <script>
    $(document).ready(function() {
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
</body>

</html>