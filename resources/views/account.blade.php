@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Cuenta</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-profile">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-tabs-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Perfil</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-billing-tab" data-toggle="tab" href="#nav-billing" role="tab" aria-controls="nav-billing" aria-selected="false">Facturación</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-plan-tab" data-toggle="tab" href="#nav-plan" role="tab" aria-controls="nav-plan" aria-selected="false">Plan</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-company-tab" data-toggle="tab" href="#nav-company" role="tab" aria-controls="nav-company" aria-selected="false">Compañía</a>
        </div>
      </nav>


      <div class="tab-content" id="nav-tabContent">
        <!-- PROFILE -->
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="navtabs-header">
            <h3>Perfil</h3>
          </div>
          <div class="navtabs-profile">
            <div class="navtabs-profile-gridtwo">
              <div class="navtabs-profile-img">
                <div class="navtabs-profile-imgbox">
                  <img src="assets/img/icons/user.png" alt="imagen usuario">
                  <div class="navtabs-profile-imgbox-edit">
                    <img src="assets/img/icons/edit.png" alt="">
                  </div>
                </div>
              </div>
              <div class="navtabs-profile-form">
                <form class="custom-form custom-forms  w-100">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Peranito Jesús">
                  </div>
                 
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Peranitojesus@shipal.com">
                  </div>
                  <div class="form-group">
                    <label>Rol</label>
                    <input type="text" class="form-control" placeholder="Propietario de la cuenta">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label>Nueva contraseña</label>
                    <input type="password" placeholder="************">
                  </div>
                  <div class="form-group">
                    <label>Confirmar nueva contraseña</label>
                    <input type="password" placeholder="************">
                  </div>
                  <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Guardar</a>
                </form>
              </div>
            </div>
          </div>
          
        </div>

        <!-- BILLING -->
        <div class="tab-pane fade" id="nav-billing" role="tabpanel" aria-labelledby="nav-billing-tab">
          <div class="navtabs-header">
            <h3>Método de pago</h3>
          </div>


        </div>

        <!-- PLAN -->
        <div class="tab-pane fade" id="nav-plan" role="tabpanel" aria-labelledby="nav-plan-tab">
          <div class="navtabs-plan">
            <div class="navtabs-plan-card">
              <div class="navtabs-plan-cardheader">
                <p class="navtabs-plan-cardtitle">Su Plan</p>
                <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Ajustar plan</a>
              </div>
              <div class="navtabs-plan-cardcontent">
                <div class="navtabs-plan-cardimg">
                  <img src="assets/img/icons/graphic.png" alt="">
                </div>
                <div class="navtabs-plan-cardtext">
                  <p><strong>Paga a medida que avanzas</strong></p>
                  <p>Libre</p>
                  <p>Número de asientos: <span>0</span></p>
                  
                </div>
              </div>
            </div>
            <div class="navtabs-btn">
              <a href="#" class="custom-links">Cerrar cuenta</a>
            </div>
          </div>
        </div>

        <!-- COMPANY-->
        <div class="tab-pane fade" id="nav-company" role="tabpanel" aria-labelledby="nav-company-tab">...</div>
      </div>
      
    </div>

  </div>
@endsection