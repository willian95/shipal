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
        <li><a href="#">Ajustes</a></li>
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