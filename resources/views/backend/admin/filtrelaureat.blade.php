@extends('backend.admin.layout')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h4>Filtre des Lauréats</h4>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('administrateur') }}">
                            <svg class="stroke-icon">
                                <use href="{{asset('/assets/svg/icon-sprite.svg')}}#stroke-home"></use>
                            </svg></a></li>
                    <li class="breadcrumb-item">Filtre des Lauréats</li>

                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row size-column">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">

                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-3">Filtre par STIM affiliation Yango</h4>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3">
                            <button class="btn btn-primary emailbox" type="button" data-bs-toggle="modal" data-bs-target="#compose_mail">
                                <i class="fa fa-plus"></i>Rédiger un e-mail
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive custom-scrollbar">
                        <table class="display" id="export-button">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Yango</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListCandidatureNoteStimAffYango as $item)
                                <tr data-type="{{$item->status}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nom_complet}}</td>
                                    <td>{{$item->date_naissance}}</td>
                                    <td>{{$item->lieu_naissance}}</td>
                                    <td>{{$item->lieu_residence}}</td>
                                    <td>{{$item->adresse_email}}</td>
                                    <td>{{$item->numero_telephone}}</td>
                                    <td>
                                        @if($item->affiliation == "oui" || $item->partenaireYango == "oui")
                                        <span class="badge badge-success">Oui</span>
                                        @else
                                        <span class="badge badge-secondary">Non</span>
                                        @endif

                                    </td>

                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="/admin/dossierCandidature/{{$item->identifiant_candidatur}}"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Yango</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">

                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3">Filtre par moyenne bulletin</h4>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive custom-scrollbar">
                        <table class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Moy Bul</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListCandidatureNoteStimByMoyenAp as $item)
                                <tr data-type="{{$item->status}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nom_complet}}</td>
                                    <td>{{$item->date_naissance}}</td>
                                    <td>{{$item->lieu_naissance}}</td>
                                    <td>{{$item->lieu_residence}}</td>
                                    <td>{{$item->adresse_email}}</td>
                                    <td>{{$item->numero_telephone}}</td>
                                    <td>{{$item->moyenne_generalBp}}</td>

                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="/admin/dossierCandidature/{{$item->identifiant_candidatur}}"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Moy Bul</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">

                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3">Filtre par Moyenne du BAC</h4>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive custom-scrollbar">
                        <table class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Moy BAC</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListCandidatureNoteStimBy as $item)
                                <tr data-type="{{$item->status}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nom_complet}}</td>
                                    <td>{{$item->date_naissance}}</td>
                                    <td>{{$item->lieu_naissance}}</td>
                                    <td>{{$item->lieu_residence}}</td>
                                    <td>{{$item->adresse_email}}</td>
                                    <td>{{$item->numero_telephone}}</td>
                                    <td>{{$item->moyenne_bac}}</td>

                                    <td>
                                        <ul class="action">
                                            <li class="edit"> <a href="/admin/dossierCandidature/{{$item->identifiant_candidatur}}"><i class="icon-pencil-alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Date de naissance</th>
                                    <th>Lieu de naissance</th>
                                    <th>Lieu de residence</th>
                                    <th>E-mail</th>
                                    <th>Téléphone</th>
                                    <th>Moy BAC</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="compose_mail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5">Rédiger un E-mail</h3>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body compose-modal">
                                <form action="/admin/sendEmail" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="composeTo">Destinataire :</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="composeTo" name="to" type="email" required>
                                            <div class="add-bcc">
                                                <div class="d-flex gap-2">
                                                    <a class="btn" data-bs-toggle="collapse" href="#collapseCc" role="button" aria-expanded="false" aria-controls="collapseCc">Cc</a>
                                                    <a class="btn" data-bs-toggle="collapse" href="#collapseBcc" role="button" aria-expanded="false" aria-controls="collapseBcc">Bcc</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="collapse row mb-3" id="collapseCc">
                                        <label class="col-sm-2 col-form-label" for="composeCc">Cc :</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="composeCc" name="cc" type="email">
                                        </div>
                                    </div>

                                    <div class="collapse row mb-3" id="collapseBcc">
                                        <label class="col-sm-2 col-form-label" for="composeBcc">Bcc :</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="composeBcc" name="bcc" type="email">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="composeSubject">Sujet :</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="composeSubject" name="subject" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="message">Message :</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Écrivez votre message ici..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Envoyer</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        console.log("Initialisation des tableaux...");
        $('table.display').each(function(index) {
            console.log("Tableau détecté #" + (index + 1), this);
            if (!$.fn.DataTable.isDataTable(this)) {
                $(this).DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    responsive: true
                });
                console.log("DataTable appliqué.");
            } else {
                console.log("Déjà initialisé.");
            }
        });
    });
</script>

@endsection