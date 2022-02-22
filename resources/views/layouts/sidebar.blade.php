<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu Utama</li>
                
                @role('admin')
                <li>
                    <a href="{{route('home')}}" class="{{(request()->is('home')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Beranda
                    </a>
                </li>
                <li>
                    <a href="{{route('angkatan.index')}}" class="{{(request()->is('angkatan*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-date"></i>
                            Angkatan
                    </a>
                </li>
                <li>
                    <a href="{{route('siswa.index')}}" class="{{(request()->is('siswa*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-study"></i>
                            Alumni
                    </a>
                </li>
                <li>
                    <a href="{{route('testimoni.index')}}" class="{{(request()->is('testimoni*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-gift"></i>
                            Testimoni
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="metismenu-icon pe-7s-power"></i>Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>   
                @endrole
                @role('user')
                <li>
                    <a href="{{route('home')}}" class="{{(request()->is('home')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Beranda
                    </a>
                </li>
                <li>
                    <a href="{{route('testimoni.index')}}" class="{{(request()->is('testimoni')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-gift"></i>
                            Testimoni, Kesan & Pesan
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="metismenu-icon pe-7s-power"></i>Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>            
                @endrole
            </ul>
        </div>
    </div>
</div> 