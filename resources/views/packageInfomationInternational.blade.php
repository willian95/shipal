@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Internacional</h2>
      <div class="main-steps-header">
        <p class="main-steps-text">
          Paso 
          <span>1</span>
          de 
          <span>3</span>
        </p>
        <div class="main-steps-active">
          <div class="main-steps-icon">
            <img src="assets/img/icons/arrow-up.png" alt="">
          </div>
          <p>
            <strong>Información del paquete</strong>
          </p>
        </div>
      </div>
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<div class="main-wrapper-content main-wrapper-content-none pt-0" id="packageInformation">

      <div class="main-loader" v-if="loading == true">
         <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
         </div>
      </div>

   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-70">
       <div class="section-form">
         <form class="custom-form session-form w-100">
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Tipo de empaque</label>
               <select class="form-control custom-select" v-model="typesPackaging.id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.id') }" @change="findTypesPackaging">
                  <option value="null">Seleccione</option>
                  <option v-for="option in typesPackagingSelect" v-bind:value="option.id">
                     @{{ option.name }}
                  </option>
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
                 <input type="text" class="form-control" placeholder="Ancho" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.width" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.width') }">
                 <span>x</span>
               </div>
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Altura" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.height" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.height') }">
                 <span>cm</span>
               </div>
             </div>
            <div class="row">
                    <div class="col-4">
                        <small v-if="errors.hasOwnProperty('typesPackaging.length')">@{{ errors['typesPackaging.length'][0] }}</small>
                    </div>
  
                    <div class="col-4">
                         <small v-if="errors.hasOwnProperty('typesPackaging.width')">@{{ errors['typesPackaging.width'][0] }}</small>
                    </div>

                    <div class="col-4">
                         <small v-if="errors.hasOwnProperty('typesPackaging.height')">@{{ errors['typesPackaging.height'][0] }}</small>
                    </div>
               </div>
           </div>
           <div class="form-group mb-0">
             <label>Peso </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Peso" onKeyPress="return soloNumerosConPunto(event)" v-model="typesPackaging.weight"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('typesPackaging.weight') }">
                 <span>Kgs</span>
               </div>
             </div>
             <small v-if="errors.hasOwnProperty('typesPackaging.weight')">@{{ errors['typesPackaging.weight'][0] }}</small>
           </div>
           <div class="form-group mb-0">
             <label>Valor declarado </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Valor declarado" onKeyPress="return soloNumerosConPunto(event)" v-model="packageInformation.declaredValue" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.declaredValue') }">
               </div>
             </div>
             <small v-if="errors.hasOwnProperty('packageInformation.declaredValue')">@{{ errors['packageInformation.declaredValue'][0] }}</small>
           </div>
           <hr>
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Fecha de envío</label>
               <input type="date" class="form-control" placeholder="2020-06-08" v-model="packageInformation.shippingDate" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.shippingDate') }">
               <small v-if="errors.hasOwnProperty('packageInformation.shippingDate')">@{{ errors['packageInformation.shippingDate'][0] }}</small>
             </div>
             <div class="form-group">
               <label>Asegura tu paquete*</label>
               <div class="d-flex">
                 <div class="form-check accept-packaging mr-4">
                   <input type="radio" class="form-check-input" id="secureYourPackage1" value="si" v-model="packageInformation.secureYourPackage" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.secureYourPackage') }">
                   <label class="form-check-label" for="si">Si</label>
                 </div>
                 <div class="form-check accept-packaging">
                   <input type="radio" class="form-check-input" id="secureYourPackage2" value="no" v-model="packageInformation.secureYourPackage" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.secureYourPackage') }">
                   <label class="form-check-label" for="no"> No</label>
                 </div>
               </div>
               <small v-if="errors.hasOwnProperty('packageInformation.secureYourPackage')">@{{ errors['packageInformation.secureYourPackage'][0] }}</small>
             </div>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input" value="si" v-model="packageInformation.scheduleShipmentPickup" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.scheduleShipmentPickup') }" @change="onPackageInformationChange()">
             <label class="form-check-label font-13" for="acceptPackaging">Programar recolección del envío</label><br>
             <small v-if="errors.hasOwnProperty('packageInformation.scheduleShipmentPickup')">@{{ errors['packageInformation.scheduleShipmentPickup'][0] }}</small>
           </div>

           <div class="session-form-two-columns mt-2">
             <div class="session-form-two-columns">
               <div class="form-group">
                 <label class="color-gray">Fecha de recolección</label>
                 <input type="date" class="form-control" placeholder="California" v-model="packageInformation.dateOfCollection" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.dateOfCollection') }">
               </div>
               <div class="form-group ">
                <label class="color-gray">Fecha de recolección</label>
                <div class="d-flex align-items-center">
                  <a href="#" class="btn-custom no-shadow extrasmall outline-light mr-2">Mañana</a>
                  <a href="#" class="btn-custom no-shadow extrasmall outline-light">Noche</a>
                </div>
               </div>
             </div>
          </div>

           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input" v-model="packageInformation.proformaInvoice" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.proformaInvoice') }">
             <label class="form-check-label font-13" for="acceptPackaging">Factura proforma</label>
             <small v-if="errors.hasOwnProperty('packageInformation.proformaInvoice')">@{{ errors['packageInformation.proformaInvoice'][0] }}</small>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input" v-model="packageInformation.returnGuide" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('packageInformation.returnGuide') }">
             <label class="form-check-label font-13" for="acceptPackaging">Crear automaticamente guía de retorno</label>
             <small v-if="errors.hasOwnProperty('packageInformation.returnGuide')">@{{ errors['packageInformation.returnGuide'][0] }}</small>
           </div>
         <div class="btn-formtwo text-center pt-3">
              <button type="button" class="btn-custom no-shadow medium" @click="addPackageInformation">Añadir declaración Aduana</button>
         </div>
         </form>
       </div>
       <div class="section-card section-card-paddings">
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del receptor</strong></p>
               <a href="#" class="section-card-links">Editar</a>
             </div>
           </div>
           <div class="section-card-content">
             <p><strong>@{{receiver.name}}</strong></p>
             <ul class="section-card-list">
                <li>@{{receiver.business_name}}</li>
                <li>@{{receiver.address}}</li>
                <li v-if="receiver.address2!=null">@{{receiver.address}}</li>
                <li>@{{receiver.city}}</li>
                <li><img src="{{ asset('assets/img/icons/colombia.png') }}" alt="colombia">&nbsp;Colombia</li>
                <li><img src="{{ asset('assets/img/icons/email.png') }}" alt="email">&nbsp;@{{receiver.email}}</li>
                <li><img src="{{ asset('assets/img/icons/phone.png') }}" alt="phone">&nbsp;@{{receiver.phone}}</li>
             </ul>

           </div>
         </div>
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del remitente</strong></p>
               <a href="#" class="section-card-links">
                 <img src="{{ asset('assets/img/icons/agenda.png') }}" alt="agenda">
               </a>
             </div>
           </div>
           <div class="section-card-content">
             <p><strong>@{{sender.name}}</strong></p>
             <ul class="section-card-list">
                <li>@{{sender.address}}</li>
                <li v-if="sender.address2!=null">@{{sender.address}}</li>
                <li>@{{sender.city}}</li>
                <li><img src="{{ asset('assets/img/icons/colombia.png') }}" alt="colombia">&nbsp;Colombia</li>
                <li><img src="{{ asset('assets/img/icons/email.png') }}" alt="email">&nbsp;@{{sender.email}}</li>
                <li><img src="{{ asset('assets/img/icons/phone.png') }}" alt="phone">&nbsp;@{{sender.phone}}</li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#packageInformation',
       data: {
         errors:[],
         sender:'',
         receiver:'',
         typesPackagingSelect:{!! $TypesPackaging ? $TypesPackaging : "''"!!},
         typesPackaging:{
                          id:null,
                          name:'',
                          length:'', 
                          width:'',
                          height:'',
                          weight:'',
                          predetermined:false
         },

         packageInformation:{
                            declaredValue:'', 
                            shippingDate:'', 
                            secureYourPackage:'', 
                            scheduleShipmentPickup:'', 
                            dateOfCollection:'', 
                            collectionTime:'', 
                            proformaInvoice:'', 
                            returnGuide:'', 
         },

         loading:false,

       },
       mounted(){
              
            this.getSesionShippingInternational();

       },//mounted()
       methods: {

          async getSesionShippingInternational(){

           let self = this;

            axios.get('{{ url("SesionShippingInternational") }}', {}).then(function (response) {

               if(response.data.success==true){

                    self.sender=response.data.ShippingInternational['sender'];

                    self.receiver=response.data.ShippingInternational['receiver'];

               }//if(response.data.success==true)
               else if(response.data.success==false){   

                    swal({
                      "icon": "error",
                      "text": response.data.msg
                    }).then((value) => {
                      window.location.href="{{ url('dashboard') }}"
                    });
                    

               }//else if(response.data.success==false)

            }).catch(function (error) {

               iziToast.error({title: 'Mensaje',position:'topRight',message: 'Por favor comuniquese con el administrador del sistema',});

               console.log(error);
               
            });  
         },//SesionShippingInternational

         clear(){


            this.errors=[];

            this.typesPackaging={
                          id:null,
                          name:'',
                          length:'', 
                          width:'',
                          height:'',
                          weight:'',
                          predetermined:false
            };

            this.packageInformation={
                            declaredValue:'', 
                            shippingDate:'', 
                            secureYourPackage:'', 
                            scheduleShipmentPickup:'', 
                            dateOfCollection:'', 
                            collectionTime:'', 
                            proformaInvoice:'', 
                            returnGuide:'', 
            };
         },//clear()

         async addPackageInformation(){

           let self = this;

            self.loading = true
            axios.post('{{ url("packageInformation") }}', {

              typesPackaging:self.typesPackaging,

              packageInformation:self.packageInformation,

              international:1,

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.typesPackagingSelect=response.data.TypesPackaging;
                  self.clear();
                  self.errors = []
                  
                    swal({
                      "title": "Información",
                      "icon": "success",
                      "text": "Registro Satisfactorio",
                    }).then((value) => {
                      window.location.href="{{ url('internacional/tarifas-de-envios') }}"
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

         },//packageInformation
       
         findTypesPackaging(){
            let self = this;
            let id=0;

            if((self.typesPackaging.id!="null" && self.typesPackaging.id!=null)){
               id=self.typesPackaging.id;
            }
            if(id!=0){
            axios.post('{{ url("findTypesPackaging") }}', {
              id:id,
            }).then(function (response) {
               if(response.data.success==true){
                  self.typesPackaging=response.data.TypePackaging;
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
                this.typesPackaging={
                          id:null,
                          name:'',
                          length:'', 
                          width:'',
                          height:'',
                          weight:'',
                          predetermined:false
                };
            }//else

         },//getRecipient(opt)

          setCollectionTime(time){

            this.packageInformation.collectionTime = time

          },

          onPackageInformationChange(){

            if(this.packageInformation.scheduleShipmentPickup == false){
              this.packageInformation.collectionTime = ""
              this.packageInformation.dateOfCollection = ""
            }

          }

       },//methods
   }); //const app= new Vue
   
</script> 
@endpush