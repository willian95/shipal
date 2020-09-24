<!-- Modal NewPackaging-->
<div class="modal fade" id="NewPackaging" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="typeof(Packagings) != 'undefined'">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@{{title}}</h5>
      </div>
      <div class="modal-body">
        <div class="modal-form">
          <form class="custom-form session-form w-100">
            <div class="form-group" v-if="option==1">
            <label for="">Dimesiones personalizadas</label>
              <div class="input-group ">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">
                    <img src="assets/img/expand.png" alt="">
                  </label>
                </div>
                <select class="custom-select form-control" v-model="typesPackaging.id"  @change="findTypesPackaging">
                  <option value="null">Dimensiones personalizadas</option>
                  <option v-for="Packaging in Packagings"  v-bind:value="Packaging.id">@{{Packaging.name}}</option>
                </select>
              </div>
            </div>

            <div class="form-group mb-0">
              <label>Dimesiones </label> 
              <div class="session-form-three-columns">
                <div class="form-group form-group-flexrow">
                  <input type="text" class="form-control" placeholder="Longitud" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.length" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.length') }">
                  <span>x</span>
                </div>
                <div class="form-group form-group-flexrow">
                  <input type="text" class="form-control" placeholder="Ancho"  onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.width" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.width') }">
                  <span>x</span>
                </div>
                <div class="form-group form-group-flexrow">
                  <input type="text" class="form-control" placeholder="Altura" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.height" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.height') }">
                  <span>cm</span>
                </div>
              </div>
            </div>

            <div class="form-group mb-0">
              <div class="session-form-three-columns">
                <div class="form-group form-group-flexrow">
                    <small v-if="errors.hasOwnProperty('typesPackaging.length')">@{{ errors['typesPackaging.length'][0] }}</small>
                </div>
                <div class="form-group form-group-flexrow">
                    <small v-if="errors.hasOwnProperty('typesPackaging.width')">@{{ errors['typesPackaging.width'][0] }}</small>
                </div>
                <div class="form-group form-group-flexrow">
                    <small v-if="errors.hasOwnProperty('typesPackaging.height')">@{{ errors['typesPackaging.height'][0] }}</small>
                </div>
              </div>
            </div>

            <div class="form-group mb-0">
              <label>Peso (opcional) </label> 
              <div class="session-form-three-columns">
                <div class="form-group form-group-flexrow">
                  <input type="text" class="form-control" placeholder="Peso" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.weight"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.weight') }">
                  <span>Kgs</span>
                </div>
              </div>
              <small v-if="errors.hasOwnProperty('typesPackaging.weight')">@{{ errors['typesPackaging.weight'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Nombre del paquete</label>
              <input type="text" class="form-control" placeholder="DHL FLYER" v-model="typesPackaging.name"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.name') }">
              <small v-if="errors.hasOwnProperty('typesPackaging.name')">@{{ errors['typesPackaging.name'][0] }}</small>
            </div>
            <div class="form-check accept-packaging">
              <input type="checkbox" class="form-check-input" id="acceptPackaging" v-model="typesPackaging.predetermined"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.predetermined') }">
              <label class="form-check-label" for="acceptPackaging">Establecer como plantilla de paquete predeterminada para la compra de etiquetas</label>
            </div>
            
          </form>
        </div>
      </div>
      <div class="modal-footer modal-footer-border">
        <button type="button" class="btn-custom small no-shadow outline" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn-custom no-shadow small" @click="addTypesPackaging" v-if="option==1">Aplicar</button>
        <button type="button" class="btn-custom no-shadow small" @click="updateTypesPackaging" v-if="option==2">Actualizar</button>
      </div>
    </div>
  </div>
</div>