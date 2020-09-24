<!-- Modal Customs Information -->
<div class="modal fade" id="CustomsInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-paddings">
      <div class="modal-header modal-header-start">
        <h5 class="modal-title pb-3" id="exampleModalLabel">Agregar más información</h5>
        <button type="button" class=" modal-close close" data-dismiss="modal" aria-label="Close">
          <img src="assets/img/icons/close.png" alt="">
        </button>
      </div>
      <div class="modal-body modal-body-not-paddings">
        <div class="modal-form">
          <form class="custom-form session-form w-100">
            <div class="session-form-two-columns">
              <div class="form-group">
                <label>Descripción*</label>
                <input type="text" class="form-control" placeholder="Descripción">
              </div>
              <div class="form-group">
                <label>Cantidad*</label>
                <input type="number" class="form-control" placeholder="Cantidad">
              </div>
            </div>
            <div class="session-form-two-columns">
              <div class="form-group">
                <label>Valor total*</label>
                <input type="number" class="form-control" placeholder="Valor total">
              </div>
              <div class="form-group">
                <label>País de origen*</label>
                <input type="text" class="form-control" placeholder="País">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer-center">
        <a href="#" class="btn-custom small no-shadow outline mr-2">Cancelar</a>
        <a href="#" class="btn-custom no-shadow small">Guardar información</a>
      </div>
    </div>
  </div>
</div>



<!-- Modal Package Information -->
<div class="modal fade" id="PackageInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-info text-center">
          <img src="assets/img/icons/info.png" alt="">
          <h5 class="modal-title modal-title-pb  ">¡Es importante saber!</h5>
          <p class="modal-info-p">La información de medidas y peso suministrada sea exacta para evitar retrasos, cancelación o sobrecargos en en envío.</p>
          <p class="modal-info-p">En caso de no estar seguro de esta información por favor corroborarla antes de crear la guía.</p>
        </div>
      </div>
      <div class="modal-footer-center">
        <a href="#" class="btn-custom no-shadow small">Entendido</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Create User-->
<div class="modal fade" id="CreateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
      </div>
      <div class="modal-body">
        <div class="modal-form">
          <form class="custom-form session-form w-100">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Mariano de Jesús" >
            </div>
            
            <div class="form-group">
              <label>Correo</label>
              <input type="email" class="form-control" placeholder="Marianodejesus@gmail.com">
            </div>
            <div class="form-group">
              <label>Rol</label>
              <input type="text" class="form-control" placeholder="Gerencia Marcus del Libano">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer-center">
        <a href="#" class="btn-custom no-shadow small">Crear usuario</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal Connect store-->
<div class="modal fade" id="ConnectStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header-column">
        <h5 class="modal-title" id="exampleModalLabel">Conectar con mi tienda</h5>
        
      </div>
      <div class="modal-body">
        <div class="modal-courier">
          <div class="modal-content-grid">
            <p class="modal-text"> Seleccione su tienda E-commerce plataforma para conectar e importar ordenes.</p>
            <div class="modal-grid-three">
              <div class="modal-grid-img">
                <img src="assets/img/logos/tiendas/1.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/tiendas/2.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/tiendas/3.png" alt="">
              </div>
            </div>
            <p class="modal-text"> ¿Necesitas conectarte a una plataforma que no esté en la lista anterior? <strong ><a class="modal-link" href="#">Solicite una plataforma</a></strong></p>
          </div>
        </div>
      </div>
      <div class="modal-footer-center">
        <a href="#" class="btn-custom no-shadow small">Conectar tienda</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Connect Conveyors-->
<div class="modal fade" id="ConnectConveyors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header-column">
        <h5 class="modal-title" id="exampleModalLabel">Conectar Transportadoras</h5>
        <a href="#" class="btn-custom no-shadow extrasmall mt-2 mb-2">Plan pro</a>
        <p class="modal-text">Seleccione una transportadora para conectar sus ordenes.</p>
      </div>
      <div class="modal-body">
        <div class="modal-courier">
          <div class="modal-content-grid">
            <strong class="text-center">Internacional</strong>
            <div class="modal-grid-three">
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/1.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/2.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/3.png" alt="">
              </div>
            </div>
          </div>
          <div class="modal-content-grid">
            <strong class="text-center">Nacional</strong>
            <div class="modal-grid-three">
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/3.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/2.png" alt="">
              </div>
              <div class="modal-grid-img">
                <img src="assets/img/logos/courier/3.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer-center">
        <a href="#" class="btn-custom small no-shadow outline">Cancelar</a>
      </div>
    </div>
  </div>
</div>

