@extends('auth.layout')
@section('content')
<!-- login page start-->
<div class="container-fluid">
  <div class="row">
    <!-- <div class="col-xl-5">
      <img class="bg-img-cover bg-center" src="{{asset('/assets/images/login/01.png')}}" alt="looginpage">
      <img class="bg-img-cover bg-center" src="{{asset('/assets/images/login/3.jpg')}}" alt="looginpage">
    </div> -->
    <div class="col-xl-7"><img class="bg-img-cover bg-center" src="../assets/images/login/2.jpg" alt="looginpage"></div>

    <div class="col-xl-5 p-0">
      <div class="login-card login-dark">
        <div>
          <div class="d-flex justify-content-center">
            <a class="logo text-start" href="/"> <img class="img-fluid for-dark" src="{{asset('/assets/images/logo/logo.png')}}" alt="looginpage" style="width: 300px; height: auto;"><img class="img-fluid for-light" src="{{asset('/assets/images/logo/logo_dark.png')}}" alt="looginpage" style="width: 300px; height: auto;"></a>
          </div>
          <div class="login-main">
            <form class="theme-form" action="{{route('login')}}" method="POST">
              @csrf
              <h4>Connectez-vous à votre espace</h4>
              <p>
                Pour toute assistance, contactez-nous via
                <a href="mailto:info@fondationbenianh.org">info@fondationbenianh.org</a> ou au <br>
                <strong><a href="tel:0704436503">(+225) 07 04 43 65 03</a></strong> (Appels ou WhatsApp)
              </p>

              @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif

              @if(session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
              @endif

              <div class="form-group">
                <label class="col-form-label">Adresse e-mail <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" required
                  pattern="^(?!.*https?:\/\/)([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$"
                  title="L'adresse e-mail ne doit pas contenir de lien"
                  placeholder="exemple@gmail.com">
              </div>

              <div class="form-group">
                <label class="col-form-label">Mot de passe <span class="text-danger">*</span></label>
                <div class="form-input position-relative">
                  <!-- Suppression de value="motdepasse" pour des raisons de sécurité et d'ergonomie -->
                  <input class="form-control" type="password" name="password" required placeholder="*********">
                  <div class="show-hide"><span class="show">Voir</span></div>
                </div>
              </div>

              <div class="form-group mb-0">
                <button class="btn btn-primary btn-block w-100" type="submit">Se connecter</button>
                <p class="mt-4 mb-0 text-center">
                  Mot de passe oublié ? <a class="ms-2" href="{{ route('verifyEmail') }}">Réinitialiser l'accès</a>
                </p>
              </div>

              <h6 class="text-muted mt-4 or">Nouveau candidat ?</h6>

              <div class="social mt-4">
                <p class="text-center">
                  Vous n'avez pas encore de compte ? <br>
                  <a class="btn btn-outline-secondary mt-2" href="{{ route('candidature') }}">Créer un compte</a>
                </p>
              </div> <!-- Ajout de la fermeture de la div social qui manquait -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- latest jquery-->
  <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
  <!-- Bootstrap js-->
  <script src="{{asset('/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <!-- feather icon js-->
  <script src="{{asset('/assets/js/icons/feather-icon/feather.min.js')}}"></script>
  <script src="{{asset('/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
  <!-- scrollbar js-->
  <!-- Sidebar jquery-->
  <script src="{{asset('/assets/js/config.js')}}"></script>
  <!-- Plugins JS start-->
  <!-- calendar js-->
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{asset('/assets/js/script.js')}}"></script>
</div>
@endsection