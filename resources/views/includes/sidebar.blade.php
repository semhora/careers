<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs js-left-col left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('panel') }}" class="site_title"><i class="fa fa-location-arrow"></i> <span>SEM HORA</span></a>
        </div>
        <div class="clearfix"></div>

        <div class="profile" style="width: 100%; float: left; margin-bottom: 15px;">
            <div class="profile_pic">
                <img src="{{ (Auth::user()->avatar_url ? Auth::user()->avatar_url['thumbnail'] : '/images/user.png' ) }}" alt="..." style="padding: 1px;" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bem vindo(a),</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>


        <!-- Barra lateral -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('panel') }}"><i class="fa fa-dashboard"></i> Ínicio</a></li>
                    @if( \Auth::user()->role != 'user' )
                    <li><a><i class="fa fa-home"></i> Eventos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="{{ url('panel/events/new') }}">Criar evento</a></li>
                            <li><a href="{{ url('panel/events') }}">Meus eventos</a></li>
                        </ul>
                    </li>
                    @endif
                    @if( \Auth::user()->role == 'admin' )
                        <li><a><i class="fa fa-files-o"></i> Categorias <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li><a href="{{ url('panel/categories/new') }}">Criar categoria</a></li>
                                <li><a href="{{ url('panel/categories') }}">Todas as categorias</a></li>
                            </ul>
                        </li>
                    @endif
                    @if( \Auth::user()->role == 'user' )
                        <li><a href="{{ url('panel/events/confirmeds') }}"><i class="fa fa-home"></i> Eventos</a></li>
                    @endif
                    <li><a href="{{ url('panel/profile') }}"><i class="fa fa-edit"></i> Meu Perfil</a></li>
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i>Sair</a>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>