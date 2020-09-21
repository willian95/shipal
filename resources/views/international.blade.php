@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Internacional</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none" id="internacional">


      <div class="main-loader" v-if="loading == true">
         <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
         </div>
      </div>

    <div class="main-wrapper-formstwo">
      <div class="main-wrapper-forms">
        <div class="main-wrapper-headerforms">
          <p>Remitente</p>
          <img src="{{ url('assets/img/question.png') }}" alt="">
        </div>
        <form class="custom-form custom-forms  w-100">
          <div class="form-group">
            <label>Apodo</label>
               <select class="form-control custom-select" v-model="sender.id" @change="getRecipient(1)">
                  <option value="null">Seleccione</option>
                  <option v-for="option in recipients" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
               </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
                <input type="text" class="form-control" placeholder="Pepita Maria" v-model="sender.name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.name') }">
                <small v-if="errors.hasOwnProperty('sender.name')">@{{ errors['sender.name'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control" v-model="sender.business_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.business_name') }">
              <small v-if="errors.hasOwnProperty('sender.business_name')">@{{ errors['sender.business_name'][0] }}</small>
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com" v-model="sender.email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.email') }" :disabled="sender.id!=null">
              <small v-if="errors.hasOwnProperty('sender.email')">@{{ errors['sender.email'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356" v-model="sender.phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.phone') }" onKeyPress="return soloNumeros(event)">
              <small v-if="errors.hasOwnProperty('sender.phone')">@{{ errors['sender.phone'][0] }}</small>
            </div>
          </div>
          <label class="label-gray">De</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="sender.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.address') }">
            <small v-if="errors.hasOwnProperty('sender.address')">@{{ errors['sender.address'][0] }}</small>
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="sender.address2">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="California" v-model="sender.city" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.city') }">
              <small v-if="errors.hasOwnProperty('sender.city')">@{{ errors['sender.city'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Estado</label>
              <input type="text" class="form-control" placeholder="California" v-model="sender.state" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.state') }">
              <small v-if="errors.hasOwnProperty('sender.state')">@{{ errors['sender.state'][0] }}</small>              
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Código postal</label>
              <input type="number" class="form-control" placeholder="1234" v-model="sender.postcode" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.postcode') }" onKeyPress="return soloNumeros(event)">
              <small v-if="errors.hasOwnProperty('sender.postcode')">@{{ errors['sender.postcode'][0] }}</small>
            </div>
            <div class="form-group">
              <label>País</label>
              <select class="form-control custom-select" v-model="sender.country_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('sender.country_id') }">
                  <option value="null">Seleccione</option>
                  <option v-for="option in countries" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
               </select>
               <small v-if="errors.hasOwnProperty('sender.country_id')">@{{ errors['sender.country_id'][0] }}</small>              
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
            <select class="form-control custom-select" v-model="receiver.id" @change="getRecipient(2)">
              <option value="null">Seleccione</option>
              <option v-for="option in recipients" v-bind:value="option.id">
                  @{{ option.name }}
              </option>
               </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
              <input type="text" class="form-control" placeholder="Pepita Maria" v-model="receiver.name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.name') }">
              <small v-if="errors.hasOwnProperty('receiver.name')">@{{ errors['receiver.name'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control" v-model="receiver.business_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.business_name') }">
              <small v-if="errors.hasOwnProperty('receiver.business_name')">@{{ errors['receiver.business_name'][0] }}</small>
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com" v-model="receiver.email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.email') }" :disabled="receiver.id!=null">
              <small v-if="errors.hasOwnProperty('receiver.email')">@{{ errors['receiver.email'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356" v-model="receiver.phone" v-bind:class="{ 'is-invalid':  errors.hasOwnProperty('receiver.phone') }" onKeyPress="return soloNumeros(event)">
              <small v-if="errors.hasOwnProperty('receiver.phone')">@{{ errors['receiver.phone'][0] }}</small>
            </div>
          </div>
          <label class="label-gray">Para</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="receiver.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.address') }">
            <small v-if="errors.hasOwnProperty('receiver.address')">@{{ errors['receiver.address'][0] }}</small>
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="receiver.address2">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="California" v-model="receiver.city" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.city') }">
              <small v-if="errors.hasOwnProperty('receiver.city')">@{{ errors['receiver.city'][0] }}</small>
            </div>
            <div class="form-group">
              <label>Estado</label>
              <input type="text" class="form-control" placeholder="California" v-model="receiver.state" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.state') }">
              <small v-if="errors.hasOwnProperty('receiver.state')">@{{ errors['receiver.state'][0] }}</small>
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Código postal</label>
              <input type="number" class="form-control" placeholder="1234" v-model="receiver.postcode" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.postcode') }" onKeyPress="return soloNumeros(event)">
              <small v-if="errors.hasOwnProperty('receiver.postcode')">@{{ errors['receiver.postcode'][0] }}</small>
            </div>
            <div class="form-group">
              <label>País</label>
              <select class="form-control custom-select" v-model="receiver.country_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('receiver.country_id') }">
                  <option value="null">Seleccione</option>
                  <option v-for="option in countries" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
               </select>
               <small v-if="errors.hasOwnProperty('receiver.country_id')">@{{ errors['receiver.country_id'][0] }}</small>              
            </div>
          </div>
        </form>
      </div>
      <div class="btn-formtwo">
        <button type="button" class="btn-custom no-shadow medium" @click="createOrUpdateRecipients">Guardar y continuar</button>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#internacional',
       data: {
        recipients:{!! $recipients ? $recipients : "''"!!},
        countries:{!! $countries ? $countries : "''"!!},
        errors:[],
        sender:{
          id:null,
          country_id:null,
          name:'',
          business_name:'',
          email:'',
          phone:'',
          address:'',
          address2:'',
          city:'',
          state:'',
          postcode:'',
          is_international:1,
        },
        receiver:{
          id:null,
          country_id:null,
          name:'',
          business_name:'',
          email:'',
          phone:'',
          address:'',
          address2:'',
          city:'',
          state:'',
          postcode:'',
          is_international:1,
        },
        loading:false
       },
       mounted(){

          this.getSesionShippingInternational();

       },
       methods: {
         getRecipients(){
            let self = this;
            axios.post('{{ url("recipients") }}', {
              is_international:1,
            }).then(function (response) {
               console.log();
               if(response.data.success==true){
                  self.recipients=response.data.recipients;
               }//if(response.data.success==true)
               else if(response.data.success==false){                     
                  $.each(response.data.mensaje, function( key, value ) {
                     iziToast.error({title: 'Mensaje',position:'topRight',message: value,});
                  });
               }//else if(response.data.success==false)
            }).catch(function (error) {
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'Por favor comuniquese con el administrador del sistema',});
               console.log(error);
            });  
         },//getRecipients()
         clear(){
          this.sender={
                        id:null,
                        country_id:null,
                        name:'',
                        business_name:'',
                        email:'',
                        phone:'',
                        address:'',
                        address2:'',
                        city:'',
                        state:'',
                        postcode:'',
                        is_international:1,
                      };
          this.receiver={
                        id:null,
                        country_id:null,
                        name:'',
                        business_name:'',
                        email:'',
                        phone:'',
                        address:'',
                        address2:'',
                        city:'',
                        state:'',
                        postcode:'',
                        is_international:1,
                      };            
         },//clear()
         createOrUpdateRecipients(){
            let self = this;
            self.loading = true
            axios.post('{{ url("createOrUpdateRecipientsInternational") }}', {
            sender:self.sender,
            receiver:self.receiver,
            opt:1,
            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.recipients=response.data.recipients;
                  self.clear();
                  self.errors = []

                    swal({
                      "title": "Información",
                      "icon": "success",
                      "text": "Registro Satisfactorio",
                    }).then((value) => {
                      window.location.href="{{ url('internacional/informacion-de-paquete') }}"
                    });

               }//if(response.data.success==true)
               else{                     
                  iziToast.error({title: 'Error',position:'topRight',message: response.data.msg});   
               }//else if(response.data.success==false)
            }).catch(err => {
               self.loading = false
               self.errors = err.response.data.errors
               if(self.errors){
                  iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
               }else{
                  iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
               }
               
            });  

         },//createOrUpdateRecipients()
         getRecipient(opt){
            let self = this;
            let id=0;

            if(opt==1 && (self.sender.id!="null" && self.sender.id!=null)){
               id=self.sender.id;
            }else if(opt==2 && (self.receiver.id!="null" && self.receiver.id!=null)){
               id=self.receiver.id;
            }//else if(opt==2 && (self.receiver.id!="null" && self.receiver.id!=null)) 

            if(id!=0){
            axios.post('{{ url("getRecipients") }}', {
              id:id,
            }).then(function (response) {
               if(response.data.success==true){
                  if(opt==1){
                     self.sender=response.data.recipient;
                  }else{
                     self.receiver=response.data.recipient;
                  }//else
               }//if(response.data.success==true)
               else if(response.data.success==false){                     
                  $.each(response.data.mensaje, function( key, value ) {
                     iziToast.error({title: 'Mensaje',position:'topRight',message: value,});
                  });
               }//else if(response.data.success==false)
            }).catch(function (error) {
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'Por favor comuniquese con el administrador del sistema',});
               console.log(error);
            }); 
            }else{
               if(opt==1){
                     this.sender={
                        id:null,
                        name:'',
                        business_name:'',
                        email:'',
                        phone:'',
                        address:'',
                        address2:'',
                        city:'',
                        state:'',
                        is_international:0,
                      };
               }else{
                     this.receiver={
                        id:null,
                        name:'',
                        business_name:'',
                        email:'',
                        phone:'',
                        address:'',
                        address2:'',
                        city:'',
                        state:'',
                        is_international:0,
                      }; 
               }//else
            }//else
         },//getRecipient(opt)
         getSesionShippingInternational(){

           let self = this;

            axios.get('{{ url("SesionShippingInternational") }}', {}).then(function (response) {

               if(response.data.success==true){

                  console.log(response.data);

               }//if(response.data.success==true)
               else if(response.data.success==false){   

                  console.log(response.data);

               }//else if(response.data.success==false)

            }).catch(function (error) {

               iziToast.error({title: 'Mensaje',position:'topRight',message: 'Por favor comuniquese con el administrador del sistema',});

               console.log(error);
               
            });  
         }//SesionShippingInternational
       },//methods
   }); //const app= new Vue
</script> 
@endpush

