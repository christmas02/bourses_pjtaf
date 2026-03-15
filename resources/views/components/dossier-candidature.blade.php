<!-- user profile first-style start-->
<div class="col-sm-12">
    <div class="card hovercard text-center">
        <!-- <div class="cardheader"></div> -->
        <br><br>
        <div class="user-image">
            <div class="avatar">
                @if ($candidature->photo)
                    <img class="img-fluid sm-100-w" src="{{ env('IMAGES_PATH') }}/{{ $candidature->photo }}"
                        alt="">
                @else
                    <img class="img-thumbnail rounded-circle me-3" alt=""
                        src="{{ asset('assets/images/user/7.jpg') }}">
                @endif
            </div>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="ttl-info text-start">
                                <h6 class="mb-3"><i class="fa fa-envelope me-2"></i>Email</h6>
                                <strong>{{ $candidature->user->email ?? 'Non spécifié' }}</strong>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                    <div class="user-designation">
                        <div class="title"><strong>{{ $candidature->user->name ?? 'Non spécifié' }}</strong></div>
                        <div class="desc">{{ $candidature->date_naissance ?? 'Non spécifiée' }}</div>
                        
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="ttl-info text-start">
                                <h6 class="mb-3"><i class="fa fa-phone me-2"></i>Téléphone</h6>
                                <strong>{{ $candidature->telephone ?? 'Non spécifié' }}</strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>

            <div class="follow">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="ttl-info text-start">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="ttl-info text-start">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                        <div class="user-designation">
                            <div class="title mb-3 text-center">
                                <h6 class="mb-3">Etablissement:</h6>
                                <strong>{{ $candidature->ecole_master ?? 'Non spécifié' }}</strong>
                            </div>

                        </div>

                    </div><br>

                    <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="ttl-info text-start">

                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="ttl-info text-start">

                                </div>
                            </div>

                        </div>
                    </div><br>
                    <div class="col-sm-12 col-lg-12 order-sm-2 order-xl-3">
                        <div class="row my-1">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <hr class="my-1">
                            </div>
                            <div class="col-4"></div>
                        </div><br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
