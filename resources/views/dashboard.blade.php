@extends("layouts.dashboard")

@section("content")

  
  <div class="main-wrapper-header">
    <div class="main-wrapper-boxheader">
      <div class="main-wrapper-header">
        <h2>Facturas pendientes </h2>
      </div>
      <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
  </div>
  <div class="main-wrapper-content">
    <a href="#" class="btn-custom dashboard-floating-button">Cotizar</a>
    <h1>Bienvenido a Shipal</h1>
    
    <div class="main-wrapper-content-username">Señor (a) 
      @if(\Auth::check())
          {{  Auth::user()->name }} {{ Auth::user()->lastname }}
      @endif
    </div>
    <div class="main-wrapper-content-text">
      ¿Que quieres enviar el día de hoy?<br><br>
      Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
    </div>
    <div class="main-wrapper-buttons">
      <a href="{{ url('/nacional') }}" class="btn-custom large no-shadow outline">Nacional</a>
      <a href="{{ url('/internacional') }}" class="btn-custom large secondary no-shadow outline-secondary">Internacional</a>
    </div>
    <div class="main-wrapper-cards">
      <h5>Creemos que esta información te puede interesar</h5>
      <div class="main-wrapper-cards-grid">
        <div class="custom-card">
          <h4>Analiticos</h4>
          <div class="price">
            <span>$400.000</span>
            <img src="assets/img/icons/chart.png" alt="">
          </div>
          <div class="main-wrapper-card-footer">
            <span>2 ordenes en total</span>
            <a href="#" class="btn-custom no-shadow small">Ver más</a>
          </div>
        </div>
        <div class="custom-card">
          <h4 class="secondary">Noticias</h4>
          <span class="news-text">Ahora con Shipal puedes ahorrar más dinero con nuestros envíos</span>
          <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar.</p>
          <a href="#" class="btn-custom secondary no-shadow small float-right">Leer más</a>
        </div>
      </div>
    </div>
  </div>
  

@endsection