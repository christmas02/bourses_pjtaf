@extends('backend.layouts.app.admin')
@section('content')
<style type="text/css">
    .login-card {
        min-height: 10vh !important;
    }

    .login-card .login-main {
        width: 850px;
        padding: 40px;
        border-radius: 10px;
        -webkit-box-shadow: 0 0 37px rgba(8, 21, 66, 0.05);
        box-shadow: 0 0 37px rgba(8, 21, 66, 0.05);
        margin: 0 auto;
        background-color: #fff;
    }

    /* Styles pour les écrans mobiles */
    @media (max-width: 768px) {
        .login-card .login-main {
            width: 90%;
            padding: 20px;
            top: 0px !important;
        }

        .wizard-4 .step-container {
            width: 100%;
            margin: 0;
            padding: 10px;

        }
    }
</style>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h4>Liste des collaborateurs</h4>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">
                            <svg class="stroke-icon">
                                <use href="{{asset('/assets/svg/icon-sprite.svg')}}#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Tableau de bord</li>
                    <li class="breadcrumb-item active">Liste des collaborateurs</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
                        Ajouter</button>

                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive custom-scrollbar">
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>E-mail</th>
                                    <th>Rôle</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collaborateurs as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td> {{$item->role}}</td>
                                    <td>

                                        @if($item->is_actif == true)
                                        <span class="badge badge-light-success">Actif</span>
                                        @else
                                        <span class="badge badge-light-secondary">Désactivé</span>
                                        @endif

                                    </td>
                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="#" data-bs-toggle="modal" data-original-title="edite" data-bs-target="#editeModal{{$item->user_id}}"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>E-mail</th>
                                    <th>Rôle</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Modale ajout-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajoute collaborateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-toggle-wrapper">
                                        <div class="login-card login-dark">

                                            <div class="login-main">
                                                <form class="theme-form" action="{{ route('createCollaborateur') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="col-form-label pt-0">Nom collaborateur</label>
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <input class="form-control" type="text" name="name" required="" placeholder="Nom">
                                                                @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Email</label>
                                                        <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Rôle</label>
                                                        <select class="form-control" name="role" required="">
                                                            <option value="">Sélectionnez un rôle</option>
                                                            <option value="jury">Jury</option>
                                                            <option value="admin">Administrateur</option>
                                                            <option value="partenaire">Partenaire</option>
                                                        </select>
                                                        @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-input position-relative">
                                                            <input class="form-control" type="hidden" name="password" value="00000000">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <br>
                                                        <button class="btn btn-primary btn-block w-100" type="submit">Inscription</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modale update-->
                    @foreach($collaborateurs as $item)
                    <div class="modal fade" id="editeModal{{$item->user_id}}" tabindex="-1" role="dialog" aria-labelledby="editeModal{{$item->user_id}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Mise à jour collaborateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-toggle-wrapper">
                                        <div class="login-card login-dark">

                                            <div class="login-main">
                                                <form class="theme-form" action="{{ route('createCollaborateur') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="col-form-label pt-0">Nom collaborateur</label>
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                                                <input class="form-control" type="text" name="name" required="" value="{{$item->name}}">
                                                                @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Email</label>
                                                        <input class="form-control" type="email" name="email" required="" value="{{$item->email}}">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Rôle</label>
                                                        <select class="form-control" name="role" required="">
                                                            <option value="jury" @if($item->role == 'jury') selected @endif>Jury</option>
                                                            <option value="administrateur" @if($item->role == 'administrateur') selected @endif>Administrateur</option>
                                                            <option value="partenaire" @if($item->role == 'partenaire') selected @endif>Partenaire</option>
                                                        </select>
                                                        @error('role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label pt-0">Mot de passe</label>
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                                                <input class="form-control" type="password" name="password" placeholder="Laisser vide pour ne pas changer le mot de passe">
                                                                @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group mb-0">
                                                        <br>
                                                        <button class="btn btn-primary btn-block w-100" type="submit">Mise à jour</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Container-fluid Ends-->

@endsection