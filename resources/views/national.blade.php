@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none" id="nacional">
    <div class="main-wrapper-formstwo">
      <div class="main-wrapper-forms">
        <div class="main-wrapper-headerforms">
          <p>Remitente</p>
          <img src="{{ url('assets/img/question.png') }}" alt="">
        </div>
        <form class="custom-form custom-forms  w-100">
          <div class="form-group">
            <label>Apodo</label>
            <select class="form-control" v-model="sender.id" v-bind:class="{ 'is-invalid': senderIdRequired }">
                <option value="null">Seleccione</option>
                <option v-for="option in recipients" v-bind:value="option.id">
                    @{{ option.name }}
                 </option>
            </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
              <input type="text" class="form-control" placeholder="Pepita Maria" v-model="sender.name" v-bind:class="{ 'is-invalid': senderNameRequired }">
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control" v-model="sender.business_name" v-bind:class="{ 'is-invalid': senderBusiness_nameRequired }">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com" v-model="sender.email" v-bind:class="{ 'is-invalid': senderEmailRequired }">
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356" v-model="sender.phone" v-bind:class="{ 'is-invalid': senderPhoneRequired }">
            </div>
          </div>
          <label class="label-gray">De</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="sender.address" v-bind:class="{ 'is-invalid': senderAddressRequired }">
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="sender.address2" v-bind:class="{ 'is-invalid': senderAddress2Required }">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="Medellín" v-model="sender.city" v-bind:class="{ 'is-invalid': senderCityRequired }">
            </div>
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" class="form-control" placeholder="Antioquia" v-model="sender.state" v-bind:class="{ 'is-invalid': senderStateRequired }">
            </div>
          </div>
        
        </form>
      </div>
      <div class="main-wrapper-forms">
        <div class="main-wrapper-headerforms">
          <p>Receptor</p>
          <img src="{{ url('assets/img/question.png') }}" alt="">
        </div>
        <form class="custom-form custom-forms  w-100">
          <div class="form-group">
            <label>Apodo</label>
            <select class="form-control" v-model="sender.id" v-bind:class="{ 'is-invalid': senderIdRequired }">
                <option value="null">Seleccione</option>
                <option v-for="option in recipients" v-bind:value="option.id">
                    @{{ option.name }}
                 </option>
            </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
              <input type="text" class="form-control" placeholder="Pepita Maria" v-model="sender.name" v-bind:class="{ 'is-invalid': senderNameRequired }">
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com">
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356">
            </div>
          </div>
          <label class="label-gray">Para</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="Medellín">
            </div>
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" class="form-control" placeholder="Antioquia">
            </div>
          </div>
        
        

        </form>
      </div>
      <div class="btn-formtwo">
        <a href="#" class="btn-custom no-shadow medium">Guardar y continuar</a>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#nacional',
       data: {
        recipients:'',
        sender:{
          id:null,
          name:'',
          business_name:'',
          email:'',
          phone:'',
          address:'',
          address2:'',
          city:'',
          state:'',
        },
        senderIdRequired:false,
        senderNameRequired:false,
        senderBusiness_nameRequired:false,
        senderEmailRequired:false,
        senderPhoneRequired:false,
        senderAddressRequired:false,
        senderAddress2Required:false,
        senderCityRequired:false,
        senderStateRequired:false,
        receiver:{
          id:null,
          name:'',
          business_name:'',
          email:'',
          phone:'',
          address:'',
          address2:'',
          city:'',
          state:'',
        },
        receiverIdRequired:false,
        receiverNameRequired:false,
        receiverBusiness_nameRequired:false,
        receiverEmailRequired:false,
        receiverPhoneRequired:false,
        receiverAddressRequired:false,
        receiverAddress2Required:false,
        receiverCityRequired:false,
        receiverStateRequired:false,
       },
       mounted(){
          this.getRecipients();
       },
       methods: {
         getRecipients(){
            let self = this;
            axios.post('{{ url("recipients") }}', {
              is_international:0,
            }).then(function (response) {
               if(response.data.status==true){
                  self.recipients=response.data.recipients;
               }//if(response.data.status==true)
               else if(response.data.status==false){                     
                  $.each(response.data.mensaje, function( key, value ) {
                     iziToast.error({title: 'Mensaje',position:'topRight',message: value,});
                  });
               }//else if(response.data.status==false)
            }).catch(function (error) {
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'Por favor comuniquese con el administrador del sistema',});
               console.log(error);
            });  
         },//getRecipients()
       },//methods
   }); //const app= new Vue
   
</script> 
@endpush