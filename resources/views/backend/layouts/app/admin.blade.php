<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un programme de bourses dédié à la promotion et à la valorisation des compétences dans le digital, le numérique et les sciences fondamentales appliquées">
    <meta name="keywords" content="Programme de bourses, promotion des compétences, valorisation des talents, formation académique, soutien éducatif">
    <meta name="author" content="Yango">
    <link rel="icon" href="{{asset('/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}" type="image/x-icon">
    <title>PJTAF - Programme Jeunes Talents en Fiscalités</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/echart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/date-picker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/js-datatables/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/owlcarousel.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/dropzone.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/datatable-extension.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">

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
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('backend.layouts.header.admin');
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('backend.layouts.sidebar.admin');
            <!-- Page Sidebar Ends-->
            <div class="page-body">

                @yield('content')
                <!-- modale profil update -->
                <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Mise à jour de votre profil</h5>
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
                                                        <div class="col-6">
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->user_id}}">
                                                            <input class="form-control" type="text" name="name" required value="{{ Auth::user()->name}}">
                                                            @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Email</label>
                                                    <input class="form-control" type="email" name="email" required="" value="{{ Auth::user()->email}}">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Rôle</label>
                                                    <input class="form-control" type="text" name="role" required value="{{ Auth::user()->role}}" readonly>
                                                    @error('role')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Mot de passe</label>
                                                    <div class="form-input position-relative">
                                                        <input class="form-control" type="password" name="password" placeholder="*********">
                                                        @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="show-hide"><span class="show"></span></div>
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
            </div>

            <!-- footer start-->
           @include('backend.layouts.footer.admin')
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('/assets/js/datatable/datatable-extension/custom.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{asset('/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{asset('/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('/assets/js/sidebar-pin.js')}}"></script>
    <script src="{{asset('/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{asset('/assets/js/slick/slick.js')}}"></script>
    <script src="{{asset('/assets/js/header-slick.js')}}"></script>
    <script src="{{asset('/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('/assets/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/esl.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/config.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/pie-chart/facePrint.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/pie-chart/testHelper.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/pie-chart/custom-transition-texture.js')}}"></script>
    <script src="{{asset('/assets/js/chart/echart/data/symbols.js')}}"></script>
    <!-- calendar js-->


    <script src="{{asset('/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('/assets/js/dashboard/dashboard_3.js')}}"></script>

    <script src="{{asset('/assets/js/js-datatables/simple-datatables@latest.js')}}"></script>
    <script src="{{ asset('assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/custom-list-product.js') }}"></script>
    <script src="{{asset('/assets/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('/assets/js/ecommerce.js')}}"></script>


    <script src="{{asset('/assets/js/tooltip-init.js')}}"></script>

    <script src="{{asset('/assets/js/height-equal.js')}}"></script>
    <script src="{{asset('/assets/js/modalpage/validation-modal.js')}}"></script>


    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('/assets/js/script.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('table.display').each(function() {
                if (!$.fn.DataTable.isDataTable(this)) {
                    $(this).DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                        responsive: true
                    });
                }
            });
        });
    </script>
<!-- Section pour scripts personnalisés -->
    @yield('scripts')
</body>

</html>