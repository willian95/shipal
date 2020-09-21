
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
<div class="main-wrapper-content main-wrapper-content-none" id="paymentProcess">

      <div class="main-loader" v-if="loading == true">
         <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
         </div>
      </div>

   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-70">
        <div class="section-form">
  
          <div class="section-table section-table-nopadd">
            <div class="section-table-content section-table-contentbg table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Transportadora</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Valor del envío</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="text-center">
                          {{--section-table-img--}}
                          <img :src="'{{url('/')}}/'+shipingRates.courierService.logo" :alt="shipingRates.courierService.name" class="img-fluid" width="40" height="40" v-if="shipingRates.courierService.name=='UPS'">
                          <img :src="'{{url('/')}}/'+shipingRates.courierService.logo" :alt="shipingRates.courierService.name" class="img-fluid" width="120" height="120" v-else>
                      </div>
                    </td>
                    <td class="text-justify">@{{sender.name}}, Empresa @{{sender.business_name}} <br> x Orden #56879</td>
                    <td class="text-justify">@{{receiver.name}}, Empresa <br> @{{receiver.business_name}} Orden #56879</td>
                    <td class="text-center">@{{typePackaging.weight}} kgs</td>
                    <td class="text-center">@{{shipingRates.courierService.price}}</td>
                  </tr>
              
                </tbody>
              </table>
              
            </div>
          </div>

          <div class="section-card section-card-paddings">
            <p class="mt-4"><strong>Pagos</strong></p>
            <div class="section-card-item ">
              <p class="section-card-textprimary text-center">Internacional</p>
              <div class="d-flex justify-content-center flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row align-items-center">
                <div class="card-w25 section-card-item ">
                  <div class="section-card-content">
                    <div class="text-center">
                      <img src="{{ asset('assets/img/logos/bitmap.png') }}" alt="">
                      <form action="" class="mt-2">
                        <div class="form-check accept-packaging">
                          <input type="checkbox" class="form-check-input" v-model="pse" @change="payment_method(1)">
                          <label class="form-check-label font-13" for="acceptPackaging"><strong>Pse</strong> </label>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-w25 section-card-item">
                  
                  <div class="section-card-content">
                    <div class="text-center">
                      <img src="{{ asset('assets/img/logos/wallet.png') }}" alt="wallet.png">
                      <form action="" class="mt-2">
                        <div class="form-check accept-packaging">
                          <input type="checkbox" class="form-check-input"  v-model="shipal" @change="payment_method(2)">
                          <label class="form-check-label font-13" for="acceptPackaging"><strong>Usar saldo de mi billetera Shipal</strong> </label>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="btn-formtwo text-center pt-3">
              <button type="button" class="btn-custom no-shadow medium mt-4" @click="addPaymentProcess()">Pagar</button>
          </div>
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
                 <img src="assets/img/icons/agenda.png" alt="">
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
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del remitente</strong></p>
               <a href="#" class="section-card-links">
                 Editar
               </a>
             </div>
           </div>
           <div class="section-card-content">
             <form action="" class="mt-2 mb-2">
              <div class="form-check accept-packaging">
                <input type="checkbox" class="form-check-input"  v-model="shipingRates.useMyAddress">
                <label class="form-check-label font-13" for="acceptPackaging"><strong>
                  Usar mi dirección de retorno
                </strong></label>
              </div>
             </form>
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
@include('partials.modals')
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#paymentProcess',
       data: {
         errors:[],
         sender:'',
         receiver:'',
         shipingRates:{
              courierService:'',
              useMyAddress:false,
         },
         paymentProcess:{
            payment_method:'',
         },
         typePackaging:'',
         pse:false,
         shipal:false,
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

                    self.shipingRates=response.data.ShippingInternational['shipingRates'];

                    self.typePackaging=response.data.ShippingInternational['typePackaging'];


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
         },//SesionShipping

         clear(){

            this.errors=[];

         },//clear()

         async addPaymentProcess(){

           let self = this;

            if(self.pse=="" && self.shipal==""){
              iziToast.error({title: 'Error',position:'topRight',message: "Se debe seleccionar una forma de pago"});  
              return -1;
            }//if(this.shipingRates.courierService=="")
            else if(self.pse!=""){
                self.paymentProcess.payment_method="pse";
            }else {
                self.paymentProcess.payment_method="shipal";
            }//else

            self.loading = true
            axios.post('{{ url("paymentProcess") }}', {

              shipingRates:self.shipingRates,

              paymentProcess:self.paymentProcess,

              international:1,

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.clear();
                  self.errors = []
                    swal({
                      "title": "Información",
                      "icon": "success",
                      "text": "Registro Satisfactorio",
                    }).then((value) => {
                      window.location.href="{{ url('internacional/descargas') }}"
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
         
         payment_method(opt){

            let self = this;

            if(opt==1 && (self.pse==true || self.pse==1)){

               self.shipal=false;

            }else if(opt==2 && (self.shipal==true || self.shipal==1)){

               self.pse=false;

            }//else

         },//payment_method

       },//methods
   }); //const app= new Vue
   
</script> 
@endpush