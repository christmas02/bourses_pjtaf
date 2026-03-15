@extends('backend.layouts.app.admin')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Tableau de bord</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('/assets/svg/icon-sprite.svg') }}#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tableau de bord</li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xl-12 col-md-12 box-col-12">
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-project border-b-primary border-2"><span class="f-light f-w-500 f-14">Candidature</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ $ListCandidature->count() }}</h2><span class="f-12 f-w-400">(This month)</span>
                                    </div>
                                    <div class="product-sub bg-primary-light">
                                        <svg class="invoice-icon">
                                            <use href="../assets/svg/icon-sprite.svg#color-swatch"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Complete border-b-secondary border-2"><span class="f-light f-w-500 f-14">Lauréats</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ $ListCandidature->where('status', 'VALIDE')->count() }}</h2><span class="f-12 f-w-400">(This month) </span>
                                    </div>
                                    <div class="product-sub bg-secondary-light">
                                        <svg class="invoice-icon">
                                            <use href="../assets/svg/icon-sprite.svg#add-square"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                    <li class="bubble"></li>
                                    <li class="bubble"></li>
                                    <li class="bubble"> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">

                        <div class="row">
                            <div class="col-6">
                                <h4 class="mb-3">La liste des lauréats</h4>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-3">
                                {{-- <button class="btn btn-primary emailbox" type="button" data-bs-toggle="modal"
                                    data-bs-target="#compose_mail">
                                    <i class="fa fa-plus"></i>Rédiger un e-mail
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive custom-scrollbar">
                            <table class="display" id="export-button">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Nom complet</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>Date de naissance</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListCandidature as $item)
                                        <tr data-type="{{ $item->status }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($item->photo)
                                                    <img class="img-fluid table-avtar"
                                                        src="{{ env('IMAGES_PATH') }}/{{ $item->photo }}" alt="profile">
                                                @else
                                                    <img class="img-fluid table-avtar"
                                                        src="{{ asset('assets/images/user/1.jpg') }}" alt="profile">
                                                @endif
                                            </td>


                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->email }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->date_naissance }}</td>
                                            <td>
                                                @if ($item->status == 'VALIDE')
                                                    <span
                                                        class="badge {{ $loop->iteration <= 30 ? 'badge-success' : 'badge-light-primary' }}">
                                                        {{ $loop->iteration <= 30 ? 'Lauréat' : $item->status }}
                                                    </span>
                                                @elseif($item->status == 'pending')
                                                    <span class="badge badge-light-warning">EN ATTENTE</span>
                                                @else
                                                    <span class="badge badge-light-danger">REFUSÉ</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a
                                                            href="{{ route('dossier.candidature', $item->user_id) }}"><i
                                                                class="icon-pencil-alt"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
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
    <!-- Container-fluid Ends-->

    <script>
        // Filter functionality
        document.getElementById('filterType').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('#export-button tbody tr');

            rows.forEach(row => {
                if (!filterValue || row.dataset.type === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
