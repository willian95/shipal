@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Envíos</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-boxfilter">
    <form class="mr-2">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-search mr-2"></i>
            Filtro
        </span>
        </div>
        <input type="text" class="form-control">
      </div>
    </form>
    <a href="#" class="btn-custom small no-shadow outline mr-2">
      <img src="assets/img/icons/supermarket.png" alt="">
      Progamar recogida
      <img src="assets/img/icons/triangle.png" alt="">
    </a>
    <a href="#" class="btn-custom small no-shadow outline">
      <img src="assets/img/icons/export.png" alt="">
        Exportar
      <img src="assets/img/icons/triangle.png" alt="">
    </a>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-profile">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-tabs-item nav-link active" id="nav-made-tab" data-toggle="tab" href="#nav-made" role="tab" aria-controls="nav-made" aria-selected="true">Realizados</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pendientes</a>
        </div>
      </nav>


      <div class="tab-content" id="nav-tabContent">
        <!-- SHIPMENTS MADE -->
        <div class="tab-pane fade show active" id="nav-made" role="tabpanel" aria-labelledby="nav-made-tab">
          
        </div>

        <!-- SHIPMENTS PENDING -->
        <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
      
        </div>
      </div>
      
    </div>

  </div>
@endsection