@extends('auth.layout')
@section('content')

<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <!-- Maintenance start-->
    <div class="error-wrapper maintenance-bg">
        <div class="container">
            <ul class="maintenance-icons">
                <!-- <li><i class="fa fa-cog"></i></li>
                <li><i class="fa fa-cog"></i></li>
                <li><i class="fa fa-cog"></i></li> -->
                <div class="d-flex justify-content-center">
                    <a class="logo text-start" href="/">
                        <img class="img-fluid for-dark" src="{{asset('/assets/images/logo/logo.png')}}" alt="looginpage" style="width: 300px; height: auto;">
                        <img class="img-fluid for-light" src="{{asset('/assets/images/logo/logo_dark.png')}}" alt="looginpage" style="width: 300px; height: auto;">
                    </a>
                    <br>
                    <br>
                </div>
            </ul>
            <div class="maintenance-heading">
                <h2 class="headline">CLÔTURE</h2>
            </div>
            <h4 class="sub-content">
                La période de candidature au programme <strong>Bourses & Accélérateur de Jeunes Talents TOP TAX International</strong> est désormais clôturée.
                Si vous avez soumis votre candidature, vous recevrez un e-mail concernant son évolution prochainement.<br>
                Merci pour votre participation et votre intérêt !
            </h4>
            <div>
                <a class="btn btn-primary-gradien btn-lg text-light" href="/">RETOUR À L'ACCUEIL</a>
            </div>

        </div>
    </div>
    <!-- Maintenance end-->
</div>

@endsection