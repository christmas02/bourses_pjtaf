@extends('backend.layouts.app.admin')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Dossier Candidature</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('/assets/svg/icon-sprite.svg') }}#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Tableau de bord</li>
                        <li class="breadcrumb-item active">Dossier candidature</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts--><br><br>
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">

                <x-dossier-candidature :candidature="$candidature" />

                <div class="col-sm-12">
                    @php
                        $documents = [
                            ['label' => 'Certificat', 'field' => 'certificat_nationalite'],
                            ['label' => 'CV', 'field' => 'curriculum_vitae'],
                            ['label' => 'Diplôme BAC', 'field' => 'diplome_bac'],
                            ['label' => 'Relevé notes BAC', 'field' => 'releve_notes_bac'],
                            ['label' => 'Projet étude', 'field' => 'resume_projet'],
                            ['label' => 'Lettre recommandation 1', 'field' => 'lettre_recommendation_un'],
                            ['label' => 'Lettre recommandation 2', 'field' => 'lettre_recommendation_deux'],
                            ['label' => 'Lettre motivation', 'field' => 'lettre_motivation'],
                            ['label' => 'Diplôme Master', 'field' => 'diplome_master'],
                            ['label' => 'Reçu paiement', 'field' => 'recu_paiement'],
                        ];

                        $documentsSplit = array_chunk($documents, ceil(count($documents) / 2));
                    @endphp


                    <div class="row">

                        @foreach ($documentsSplit as $docs)
                            <div class="col-lg-6 col-xl-6">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h4 class="mb-0 f-w-600">Liste des documents</h4>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="taskadd">
                                            <div class="table-responsive custom-scrollbar">

                                                <table class="table">
                                                    <tbody>

                                                        @foreach ($docs as $doc)
                                                            <tr>
                                                                <td style="width:5%;">

                                                                    @if ($candidature->{$doc['field']})
                                                                        @php
                                                                            $extension = pathinfo(
                                                                                $candidature->{$doc['field']},
                                                                                PATHINFO_EXTENSION,
                                                                            );
                                                                        @endphp

                                                                        @if (in_array($extension, ['pdf']))
                                                                            <img class="img-fluid"
                                                                                src="{{ asset('assets/images/faq/3.jpg') }}"
                                                                                style="max-width:50%;">
                                                                        @else
                                                                            <img class="img-fluid"
                                                                                src="{{ env('IMAGES_PATH') }}/{{ $candidature->{$doc['field']} }}"
                                                                                style="max-width:50%;">
                                                                        @endif
                                                                    @else
                                                                        <img class="img-fluid"
                                                                            src="{{ asset('assets/images/faq/33.jpg') }}"
                                                                            style="max-width:50%;">
                                                                    @endif

                                                                </td>

                                                                <td style="width:90%;">
                                                                    <p class="task_desc_0">{{ $doc['label'] }}</p>
                                                                </td>

                                                                <td style="width:5%;">
                                                                    @if ($candidature->{$doc['field']})
                                                                        <a href="{{ env('IMAGES_PATH') }}/{{ $candidature->{$doc['field']} }}"
                                                                            target="_blank">
                                                                            <i class="icon-eye"></i>
                                                                        </a>
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>

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
