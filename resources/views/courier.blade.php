@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Mis Proveedores</h2>
      <hr class="d-none d-sm-none d-md-block d-lg-block d-xlblock">
      <div class="d-flex justify-content-between">
        <p>Utilice sus contratos existentes o las tarifas de descuento de los buques</p>
        <a href="#" class="btn-custom no-shadow small">Conectar Transportadoras</a>
      </div>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <hr class="d-block d-sm-block d-md-none d-lg-none d-xl-none">

  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-profile">
    <div class="section-table pt-1">
      <div class="section-table-content table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th style="border-top: 1px solid #fff;">Internacional</th>
              <th style="border-top: 1px solid #fff;"></th>
              <th style="border-top: 1px solid #fff;"></th>
              <th style="border-top: 1px solid #fff;"></th>
              <th style="border-top: 1px solid #fff;" >Activar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="assets/img/logos/fedex.png" alt="" style="width:50%;">
              </td>
              <td>USPS</td>
              <td class="text-left">
                <ul>
                  <li>Accede a descuentos de hasta el 90%</li>
                  <li>Programar la recogida de paquetes</li>
                  <li>crear manifiestos</li>
                </ul>
              </td>
              <td class="text-left">
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </td>
              <td>
              <td>
                <a href=""> Edit</a>

              </td>
            </tr>
            <tr>
              <td>
                <img src="assets/img/logos/fedex.png" alt="" style="width:50%;">
              </td>
              <td>USPS</td>
              <td class="text-left">
                <ul>
                  <li>Accede a descuentos de hasta el 90%</li>
                  <li>Programar la recogida de paquetes</li>
                  <li>crear manifiestos</li>
                </ul>
              </td>
              <td class="text-left">
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </td>
              <td>
              <td>
                <a href=""> Edit</a>

              </td>
            </tr>
        
          </tbody>
        </table>
        
      </div>
    </div>
      
    </div>

  </div>
@endsection