<!-- Modal New Address-->
<div class="modal fade" id="NewAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="recipient">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-border ">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Dirección</h5>
      </div>
      <div class="modal-body">
        <div class="modal-form">
          <form class="custom-form session-form w-100">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Pepita de los cielos" v-model="recipient.name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.name') }">
              <small v-if="errors.hasOwnProperty('recipient.name')">@{{ errors['recipient.name'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Empresa</label>
              <input type="text" class="form-control" placeholder="Empresa" v-model="recipient.business_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.business_name') }">
              <small v-if="errors.hasOwnProperty('recipient.business_name')">@{{ errors['recipient.business_name'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" class="form-control" placeholder="Marianodejesus@gmail.com" v-model="recipient.email"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.email') }">
              <small v-if="errors.hasOwnProperty('recipient.email')">@{{ errors['recipient.email'][0] }}</small>
            </div>
            <div class="session-form-two-columns">
              <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" class="form-control" placeholder="Teléfono" v-model="recipient.phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.phone') }">
                <small v-if="errors.hasOwnProperty('recipient.phone')">@{{ errors['recipient.phone'][0] }}</small>
              </div>
              <div class="form-group">
                <label>País</label>
                  <select class="form-control custom-select" v-model="recipient.country_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.country_id') }">
                  <option value="">Seleccione</option>
                  <option v-for="option in countries" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
               </select>
              <small v-if="errors.hasOwnProperty('recipient.country_id')">@{{ errors['recipient.country_id'][0] }}</small>
              </div>
            </div>
            <div class="session-form-two-columns">
              <div class="form-group">
                <label>Ciudad</label>
                <input type="text" class="form-control" placeholder="Ciudad" v-model="recipient.city" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.city') }">
                <small v-if="errors.hasOwnProperty('recipient.city')">@{{ errors['recipient.city'][0] }}</small>
              </div>
              <div class="form-group">
                <label>Estado</label>
                <input type="text" class="form-control" placeholder="Estado" v-model="recipient.state" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.state') }">
                <small v-if="errors.hasOwnProperty('recipient.state')">@{{ errors['recipient.state'][0] }}</small>
              </div>
            </div>
            <div class="form-group">
              <label>Dirección*</label>
              <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="recipient.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.address') }">
              <small v-if="errors.hasOwnProperty('recipient.address')">@{{ errors['recipient.address'][0] }}</small>
            </div>
            <div class="session-form-two-columns">
              <div class="form-group">
                <label>Código postal</label>
                <input type="number" class="form-control" placeholder="1234" v-model="recipient.postcode" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('recipient.postcode') }">
                <small v-if="errors.hasOwnProperty('recipient.postcode')">@{{ errors['recipient.postcode'][0] }}</small>
              </div>
              {{--<div class="form-group">
                <label>Unidad</label>
                <input type="text" class="form-control" placeholder="Unidad">
              </div>--}}
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-custom small no-shadow outline" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn-custom no-shadow small" @click="UpdateRecipientsNotebook">Aplicar</button>
      </div>
    </div>
  </div>
</div>