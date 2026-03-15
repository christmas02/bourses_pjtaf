<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{asset('/assets/images/logo/logo.png')}}" alt="" style="max-width: 89%;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
        <div class="toggle-sidebar">
            <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
        </div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{asset('/assets/images/logo/logo-icon.png')}}" alt="" style="max-width: 89%;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                    <a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{asset('/assets/images/logo/logo-icon.png')}}" alt="" style="max-width: 89%;"></a>
                    <div class="mobile-back text-end">
                        <span>Back </span>
                        <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Épinglé</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-1">Général</h6>
                    </div>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i>
                    <a class="sidebar-link sidebar-title" href="{{ route('admin.dashboard') }}">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg>
                        <svg class="fill-icon">
                            <!-- <use href="../assets/svg/icon-sprite.svg#fill-home"></use> -->
                        </svg><span class="">Tableau de bord</span></a>
                </li>

                {{-- <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="#">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                        </svg><span>Filtre Lauréats</span></a>
                </li>
                <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="#">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                        </svg><span>Aspirants candidats</span></a>
                </li> --}}
                @if(Auth::user()->role === 'admin')
                <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('liste.collaborateurs') }}">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                        </svg><span>Collaborateurs</span></a>
                </li>
                @endif
                {{-- <li class="sidebar-list">
                    <i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title link-nav" href="#">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                        </svg><span>Gestion des litiges</span></a>
                </li>
                
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                        <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
                        </svg><span class="">Paramètres</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="#">Programmes</a></li>
                    </ul>
                </li> --}}
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </ul>
        </div>
    </nav>
</div>