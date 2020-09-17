
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
      <div class="main-steps-header">
        <p class="main-steps-text">
          Paso 
          <span>3</span>
          de 
          <span>3</span>
        </p>
        <div class="main-steps-active">
          <div class="main-steps-icon">
            <img src="assets/img/icons/arrow-up.png" alt="">
          </div>
          <p>
            <strong>Imprime tu etiqueta de envío</strong>
          </p>
        </div>
      </div>
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<div class="main-wrapper-content main-wrapper-content-none">
   <div class="main-packageinformation">
    <div class="section-card section-card-paddings">
        <div class="section-card-item">
          <div class="section-card-content">
            <div class="text-center">
              <img src="assets/img/icons/graphic.png" alt="">
              <p class="mt-2"><strong>¡Estás listo para hacer tu envío!</strong></p>          
            </div>
          </div>
        </div>
        <div class="section-card-item">
          <div class="section-card-content">
            <div class="text-center">
              <p class="mt-2">Imprime los siguientes documentos, para que los tengas listos a la hora de que el courier recoja tu paquete.</p>          
            </div>
          </div>
        </div>
      </div>
      <center>
        <a href="#" class="btn-custom no-shadow medium mt-4 mr-2">
          <img src="assets/img/icons/download.png" alt="">  
          Descargar Label
        </a>
        <a href="#" class="btn-custom secondary no-shadow medium mt-4">
          Descargar Factura
        </a>
      </center>
   </div>
</div>
@endsection
