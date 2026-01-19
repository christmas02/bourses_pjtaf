@extends('auth.layout')
@section('content')
<!-- login page start-->
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-xl-7"><img class="bg-img-cover bg-center" src="../assets/images/login/2.jpg" alt="looginpage"></div>

    <div class="col-xl-5 p-0">
      <div class="login-card login-dark">
        <div>
          <div class="d-flex justify-content-center">
            <a class="logo text-start" href="/"> <img class="img-fluid for-dark" src="{{asset('/assets/images/logo/logo.png')}}" alt="looginpage" style="width: 300px; height: auto;"><img class="img-fluid for-light" src="{{asset('/assets/images/logo/logo_dark.png')}}" alt="looginpage" style="width: 300px; height: auto;"></a>
          </div>
          <div class="login-main">
            <form class="theme-form" action="{{ route('sendmailforResetPassword') }}" method="POST">
              @csrf

              <h4>Veuillez renseigner une adresse e-mail valide</h4>
              <p>afin de recevoir un mail pour mettre à jour votre mot de passe.</p>
              <p>Pour tout besoin d’assistance contacter via info@fondationbenianh.org ou <br>(+225) 07 04 43 65 03 ( appels ou whatsapp)</p>

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
                <label class="col-form-label">Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" required placeholder="nom@exemple.com">

                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mb-0">

                <button class="btn btn-primary btn-block w-100" type="submit">Mise à jour</button>
              </div>

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