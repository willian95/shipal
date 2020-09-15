@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-plan">
      <div class="section-grid section-gridtwo">
        <!-- Current Plan -->
        <div class="section-grid-currentplan">
          <div class="card-general">
            <div class="card-general-img">
              <img src="assets/img/logos/logo1.svg" alt="">
            </div>
            <div class="card-general-description">
              <p><strong>Plan actual</strong></p>
              <p>Paga a medida que avanzas</p>
              <p>Esto es perfecto para el negocio que no tiene una cantidad fija de envíos por mes.</p>
              <hr>
              <p>Sin cuotas mensuales.</p>
              <p>$0 pesos por envío adicional.</p>
            </div>
          </div>
        
          <div class="section-quetions text-center">
            <p><strong>¿Tienes preguntas?</strong></p>
            <p>Nuestro centro de ayuda está abierto las 24/7</p>
            <p>Quieres o llegar a nuestro equipo de apoyo global.</p>
            <p>Estamos aquí para ayudar</p>
          </div>
        </div>
        <!-- Setting -->
        <div class="section-grid-setting">
          <div class="navtabs-header">
            <h3>Ajusta tu plan</h3>
          </div>
          <div class="section-grid-settingcard">
            <p class="text-bold-general">Profesional</p>
            <p class="text-light-general">Creando etiquetas de envío a granel? El plan profesional se adaptará a las necesidades de envío de su empresa.</p>
            <a href="#" class="custom-links underline">Leer más</a>
            <div class="d-flex align-items-center mt-2 mb-2">
              <p class="text-light-general mr-2 mb-0">Ciclo de facturación</p>
              <a href="#" class="btn-custom no-shadow extrasmall outline-light">Mensual</a>
            </div>
            <div class="d-flex justify-content-between flex-column flex-xl-row flex-lg-row flex-md-row">
              <div class="d-flex align-items-center mt-2 mb-2">
                <form >
                  <div class=" d-flex ">
                    <input type="range" class="form-control-range " min="1" max="100" value="0" id="formControlRange">
                    <span class="ml-4"><strong>$80.000/mes</strong></span>
                  </div>
                  <p class="text-light-general">Imprimir <strong>60</strong> etiquetas al mes</p>
                </form>
              </div>
              <div class="text-right">
                <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Prueba gratuita</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="section-grid-settingcard">
            <p class="text-bold-general">Premium</p>
            <p class="text-light-general">Creando etiquetas de envío a granel? El plan profesional se adaptará a las necesidades de envío de su empresa.</p>
            <a href="#" class="custom-links underline">Leer más</a>
            <div class="text-right">
              <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Contáctanos</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection