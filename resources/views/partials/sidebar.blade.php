<div class="main-sidebar">
    <a href="{{ url('/dashboard') }}">
        <img class="main-sidebar-logo" src="{{ asset('assets/img/logos/logo1.svg') }}" alt="">
    </a>
    <div class="main-sidebar-head">
    <div class="main-sidebar-head-username">
        <span>Bienvenido</span>
        @if(\Auth::check())
            {{  Auth::user()->name }} {{ Auth::user()->lastname }}
        @endif
    </div>
    <div class="main-sidebar-head-amount">
        <span>$30.000</span>
        <a href="#" class="btn-custom no-shadow small">Abonar saldo</a>
    </div>
    </div>
    <div class="main-sidebar-menu">
    <ul>
        <li><a href="{{ url('/cuenta') }}">Cuenta</a></li>
        <li><a href="{{ url('/envios') }}">Envíos</a></li>
        <li><a href="{{ url('/mis-ordenes') }}">Mis ordenes</a></li>
        <li><a href="{{ url('/mi-billetera') }}">Mi billetera</a></li>
        <li><a href="#">Analíticos</a></li>
        <li><a href="#" class="sidebardrop">Ajustes</a></li>
    </ul>
    </div>
    <div class="main-sidebar-footer">
    <a href="{{ url('/logout') }}" class="logout-link">
        <img src="assets/img/icons/logout.png">
        Cerrar sesión
    </a>
    <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Soporte</a>
    </div>
</div>

<div class="main-sidebar main-sidebar-sidebardrop">
    <a href="{{ url('/dashboard') }}">
        <img class="main-sidebar-logo" src="{{ asset('assets/img/logos/logo1.svg') }}" alt="">
    </a>
    <div class="main-sidebar-head">
 
    <div class="main-sidebar-head-amount">
        <a href="#" class="btn-custom no-shadow small sidebardrop">Volver</a>
    </div>
    </div>
    <div class="main-sidebar-menu">
    <ul>
        <li>Ajustes:</li>
        <li><a href="{{ url('/cuenta') }}">Usuario</a></li>
        <li>Interaciones:</li>
        <li><a href="{{ url('/mis-tiendas') }}">Mis tiendas</a></li>
        <li><a href="{{ url('/mis-proveedores') }}">Mis proveedores</a></li>
        <li><a href="{{ url('/') }}">Apis</a></li>
        <li><a href="{{ url('/mi-libreta') }}">Mi libreta</a></li>
        <li><a href="{{ url('/empaques') }}">Empaques</a></li>
        <li><a href="{{ url('/notificaciones') }}">Notificaciones</a></li>
    </ul>
    </div>
    <div class="main-sidebar-footer">
    <a href="{{ url('/logout') }}" class="logout-link">
        <img src="assets/img/icons/logout.png">
        Cerrar sesión
    </a>
    <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Soporte</a>
    </div>
</div>