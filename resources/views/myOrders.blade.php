@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Mis ordenes</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-boxbtns d-flex justify-content-end">
    <div>
      <a href="#" class="link-sincronations mr-2">
        <img src="assets/img/icons/refresh.png" alt="">
        Sincronización de ordenes
      </a>
      <a href="#" class="btn-custom small no-shadow outline mr-2">
        Actualizar CSV
      </a>
      <a href="#" class="btn-custom small no-shadow outline mr-2">
        Crear label
        <img src="assets/img/icons/triangle.png" alt="">
      </a>
    </div>
  </div>
  <div class="main-wrapper-boxfilter main-wrapper-boxfilter-90w">
    <form class="mr-2 mt-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-search mr-2"></i>
            Filtro
        </span>
        </div>
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
    </form>
    <div class="main-shippings__btns">
      <div class="main-shippings__btnsoptions">
        <a href="">Nacional</a>
        <a href="">Internacional</a>
      </div>
      
    </div>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-profile">
      <div class="section-table pt-1">
        <div class="section-table-content table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th style="border-top: 1px solid #fff;">
                  <form action="">
                    <div class="form-check accept-packaging" style="margin-top: -1.5rem;">
                      <input type="checkbox" class="form-check-input">
                    </div>
                  </form>
                </th>
                <th style="border-top: 1px solid #fff;">Orden #</th>
                <th style="border-top: 1px solid #fff;">Fecha</th>
                <th style="border-top: 1px solid #fff;">Cliente</th>
                <th style="border-top: 1px solid #fff;">Artículos</th>
                <th style="border-top: 1px solid #fff;">Envios</th>
                <th style="border-top: 1px solid #fff;"></th>
                <th style="border-top: 1px solid #fff;" >Label</th>
                <th style="border-top: 1px solid #fff;" >
                  <img src="assets/img/icons/open-menu.png" alt="">
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <form action="">
                    <div class="form-check accept-packaging" >
                      <input type="checkbox" class="form-check-input">
                    </div>
                  </form>
                </td>
                <td>
                  <img src="assets/img/logos/shopify.png" alt="" style="width:50%;">
                  <br>
                  #5678
                </td>
                <td>06/24/2020</td>
                <td >
                  <ul>
                    <li>Accede a descuentos de hasta el 90%</li>
                    <li>Programar la recogida de paquetes</li>
                    <li>crear manifiestos</li>
                  </ul>
                </td>
                <td >
                  1 x Tokyo Gold Medium Bag <br>
                  ($ 48.000 total)
                </td>
                <td>
                  $80.000
                </td>
                <td>
                  <img src="assets/img/icons/truck.png" alt="">
                </td>
                <td>
                  <a href="#" class="btn-custom small no-shadow outline">
                    <!-- <img src="assets/img/icons/" alt=""> -->
                    Crear Label
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <form action="">
                    <div class="form-check accept-packaging" >
                      <input type="checkbox" class="form-check-input">
                    </div>
                  </form>
                </td>
                <td>
                  <img src="assets/img/logos/woocommerce.png" alt="" style="width:50%;">
                  <br>
                  #5678
                </td>
                <td>06/24/2020</td>
                <td >
                  <ul>
                    <li>Accede a descuentos de hasta el 90%</li>
                    <li>Programar la recogida de paquetes</li>
                    <li>crear manifiestos</li>
                  </ul>
                </td>
                <td >
                  1 x Tokyo Gold Medium Bag <br>
                  ($ 48.000 total)
                </td>
                <td>
                  $80.000
                </td>
                <td>
                  <img src="assets/img/icons/truck.png" alt="">
                </td>
                <td>
                  <a href="#" class="btn-custom small no-shadow outline">
                    <!-- <img src="assets/img/icons/" alt=""> -->
                    Crear Label
                  </a>
                </td>
              </tr>
          
            </tbody>
          </table>
        </div>
      </div>

      <!-- CARDS -->
      <div class="section-grid section-gridtwo grid-50">
        <div class="main-cards">
          <div class="navtabs-plan-card">
            
              <div class="navtabs-plan-cardcontent">
                <div class="navtabs-plan-cardimg">
                  <img src="assets/img/icons/icon-porcent.png" alt="">
                </div>
                <div class="navtabs-plan-cardtext">
                  <p><strong>Actualización masiva</strong></p>
                  <p>Subir los pedidos de varios clientes en un solo archivo CSV</p>
                  <a href="#" class="btn-custom no-shadow extrasmall" >Actualizar CSV</a>
                </div>
              </div>
            </div>
        </div>
        <div class="main-cards">
          <div class="navtabs-plan-card">
            
              <div class="navtabs-plan-cardcontent">
                <div class="navtabs-plan-cardimg">
                  <img src="assets/img/icons/icon-porcent.png" alt="">
                </div>
                <div class="navtabs-plan-cardtext">
                  <p><strong>Crear label</strong></p>
                  <p>Crear una etiqueta de envío introduciendo manualmente los detalles</p>
                  <a href="#" class="btn-custom no-shadow extrasmall" >Nacional</a>
                  <a href="#" class="btn-custom extrasmall secondary no-shadow secondary" >Internacional</a>
                </div>
              </div>
            </div>
        </div>

      </div>
      
    </div>

  </div>
@endsection