
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
               <select class="form-control" v-model="sender.id" v-bind:class="{ 'is-invalid': senderIdRequired }" @change="getRecipient(1)">
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
                  <input type="tel" class="form-control" placeholder="320 567 2356" v-model="sender.phone" v-bind:class="{ 'is-invalid': senderPhoneRequired }" onKeyPress="return soloNumeros(event)">
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
               <select class="form-control" v-model="receiver.id" v-bind:class="{ 'is-invalid': receiverIdRequired }" @change="getRecipient(2)">
                  <option value="null">Seleccione</option>
                  <option v-for="option in recipients" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
               </select>
            </div>
            <div class="session-form-two-columns">
               <div class="form-group">
                  <label>Nombre*</label>
                  <input type="text" class="form-control" placeholder="Pepita Maria" v-model="receiver.name" v-bind:class="{ 'is-invalid': receiverNameRequired }">
               </div>
               <div class="form-group">
                  <label>Compañía*</label>
                  <input type="text" class="form-control" v-model="receiver.business_name" v-bind:class="{ 'is-invalid': receiverBusiness_nameRequired }">
               </div>
            </div>
            <div class="session-form-two-columns">
               <div class="form-group">
                  <label>Email*</label>
                  <input type="email" class="form-control" placeholder="pepitamaria@shipal.com" v-model="receiver.email" v-bind:class="{ 'is-invalid': receiverEmailRequired }">
               </div>
               <div class="form-group">
                  <label>Teléfono*</label>
                  <input type="tel" class="form-control" placeholder="320 567 2356" v-model="receiver.phone" v-bind:class="{ 'is-invalid': receiverPhoneRequired }" onKeyPress="return soloNumeros(event)">
               </div>
            </div>
            <label class="label-gray">Para</label>
            <div class="form-group">
               <label>Dirección*</label>
               <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="receiver.address" v-bind:class="{ 'is-invalid': receiverAddressRequired }">
            </div>
            <div class="form-group">
               <label>Dirección (opcional)</label>
               <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305" v-model="receiver.address2" v-bind:class="{ 'is-invalid': receiverAddress2Required }">
            </div>
            <div class="session-form-two-columns">
               <div class="form-group">
                  <label>Ciudad</label>
                  <input type="text" class="form-control" placeholder="Medellín" v-model="receiver.city" v-bind:class="{ 'is-invalid': receiverCityRequired }">
               </div>
               <div class="form-group">
                  <label>Departamento</label>
                  <input type="text" class="form-control" placeholder="Antioquia" v-model="receiver.state" v-bind:class="{ 'is-invalid': receiverStateRequired }">
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
          is_international:0,
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
          is_international:0,
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
         errorValidate(){
          this.senderIdRequired=false;
          this.senderNameRequired=false;
          this.senderBusiness_nameRequired=false;
          this.senderEmailRequired=false;
          this.senderPhoneRequired=false;
          this.senderAddressRequired=false;
          this.senderAddress2Required=false;
          this.senderCityRequired=false;
          this.senderStateRequired=false;
          this.receiverIdRequired=false;
          this.receiverNameRequired=false;
          this.receiverBusiness_nameRequired=false;
          this.receiverEmailRequired=false;
          this.receiverPhoneRequired=false;
          this.receiverAddressRequired=false;
          this.receiverAddress2Required=false;
          this.receiverCityRequired=false;
          this.receiverStateRequired=false;
         },//errorValidate()
         clear(){
          this.errorValidate();
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
         },//clear()
         createOrUpdateRecipients(){
            let self = this;
            this.errorValidate();
            if(this.sender.name==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo nombre del remitente es requerido',});
               this.senderNameRequired=true;
            }else if(this.sender.business_name==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo compañia del remitente es requerido',});
               this.senderBusiness_nameRequired=false;
            }else if(this.sender.email==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo email del remitente es requerido',});
               this.senderEmailRequired=false;
            }else if(this.sender.phone==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo teléfono del remitente es requerido',});
               this.senderPhoneRequired=false;
            }else if(this.sender.address==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo dirección del remitente es requerido',});
               this.senderAddressRequired=false;
            }else if(this.sender.city==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo ciudad del remitente es requerido',});
               this.senderCityRequired=false;
            }else if(this.sender.state==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo departamento del remitente es requerido',});
               this.senderStateRequired=false;
            }else if(this.receiver.name==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo nombre del receptor es requerido',});
               this.receiverNameRequired=true;
            }else if(this.receiver.business_name==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo compañia del receptor es requerido',});
               this.receiverBusiness_nameRequired=false;
            }else if(this.receiver.email==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo email del receptor es requerido',});
               this.receiverEmailRequired=false;
            }else if(this.receiver.phone==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo teléfono del receptor es requerido',});
               this.receiverPhoneRequired=false;
            }else if(this.receiver.address==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo dirección del receptor es requerido',});
               this.receiverAddressRequired=false;
            }else if(this.receiver.city==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo ciudad del receptor es requerido',});
               this.receiverCityRequired=false;
            }else if(this.receiver.state==""){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El campo departamento del receptor es requerido',});
               this.receiverStateRequired=false;
            }else if (this.sender.email==this.receiver.email){
               iziToast.error({title: 'Mensaje',position:'topRight',message: 'El remitente y el receptor no pueden ser la misma persona',});
               this.receiverStateRequired=false;
            }else{
            axios.post('{{ url("createOrUpdateRecipients") }}', {
              sender:self.sender,
              receiver:self.receiver,
            }).then(function (response) {
               if(response.data.success==true){
                  self.recipients=response.data.recipients;
                  self.clear();
                  iziToast.success({title: 'Mensaje',position:'topRight',message: 'Registro Satisfactorio.',});
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
            }//else
         },//createOrUpdateRecipients()
         getRecipient(opt){
            let self = this;
            let id=0;
            console.log(opt);

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
            }//else

         },//getRecipient(opt)
       },//methods
   }); //const app= new Vue
   
</script> 
@endpush

