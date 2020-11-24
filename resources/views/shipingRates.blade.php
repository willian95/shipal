
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
      <div class="main-steps-header">
        <p class="main-steps-text">
          Paso 
          <span>2</span>
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
<div class="main-wrapper-content main-wrapper-content-none pt-0" id="shipingRates">

      <div class="main-loader" v-if="loading == true">
         <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
         </div>
      </div>
      
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-70">
       <div class="section-form">
          <ul class="nav nav-tabs nav-tabs-nopadd" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Shipal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Otra (en caso de que esté integrado)</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="section-table-content section-table-tabscontent table-responsive pt-0">
                <table class="table">
                  <tbody>
                    <tr v-for="service in CourierService">
                      <td>
                        <div class="text-center align-middle" >
                        {{--section-table-img--}}
                          <img :src="'{{url('/')}}/'+service.logo" :alt="service.name" class="img-fluid" width="40" height="40" v-if="service.name=='UPS'">
                          <img :src="'{{url('/')}}/'+service.logo" :alt="service.name" class="img-fluid" width="120" height="120" v-else>

                        </div>
                      </td>
                      <td class="align-middle">@{{service.service_name}}</td>
                      <td class="align-middle">@{{service.shipping_time}}</td>
                      <td class="align-middle">$@{{service.price}}</td>
                      <td>
                        <button type="button" class="btn-custom no-shadow extrasmall" @click="addCourierService(service)">Comprar Etiqueta</button>
                      </td>
                    </tr>
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          </div>
          <div class="btn-formtwo text-center pt-3">
              <button type="button" class="btn-custom no-shadow medium" @click="addShipingRates(2)">Continuar el pago</button>
              <button type="button" class="btn-custom no-shadow medium" @click="addShipingRates(1)">Guardar para más tarde</button>
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
         {{--<div class="section-card-item">
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
                <input type="checkbox" class="form-check-input"  value="si" v-model="shipingRates.useMyAddress">
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
         </div>--}}
       </div>
     </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#shipingRates',
       data: {
         errors:[],
         sender:'',
         receiver:'',
         CourierService:{!! $CourierService ? $CourierService : "''"!!},
         shipingRates:{
              courierService:'',
              useMyAddress:'',
         },
         loading:false,

       },
       mounted(){
              
            this.getSesionShipping();

       },//mounted()
       methods: {

          async getSesionShipping(){

           let self = this;

            axios.get('{{ url("SesionShipping") }}', {}).then(function (response) {

               if(response.data.success==true){

                    self.sender=response.data.Shipping['sender'];

                    self.receiver=response.data.Shipping['receiver'];

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

            this.shipingRates={
              courierService:'',
              useMyAddress:'',
             };

         },//clear()

         addCourierService(CourierService){

           this.shipingRates.courierService=CourierService;

            swal({
              title: "Información",
              text: "Eiqueta "+CourierService.name+" "+CourierService.service_name,
              icon: "success",
            });

         },//addCourierService()

         async addShipingRates(opt){

           let self = this;

            if(this.shipingRates.courierService==""){
              iziToast.error({title: 'Error',position:'topRight',message: "Se debe comprar una etiqueta"});  
              return -1;
            }//if(this.shipingRates.courierService=="")

            self.loading = true
            axios.post('{{ url("shipingRates") }}', {

              shipingRates:self.shipingRates,
              international:0,
              opt:opt

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.clear();
                  self.errors = [];
                  if(opt==1){
                      swal({
                        title: "Información",
                        text: response.data.msg,
                        icon: "success",
                      }).then(res => {

                        window.location.href="{{ url('/dashboard') }}"

                      });
                  }//if(opt==1)
                  else{
                    swal({
                      "title": "Información",
                      "icon": "success",
                      "text": "Registro Satisfactorio",
                    }).then((value) => {
                      window.location.href="{{ url('nacional/proceso-de-pago') }}"
                    });
                  }//else
                  //window.location.href="{{ url('informacion-de-paquete') }}";
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
       
       },//methods
   }); //const app= new Vue
   
</script> 
@endpush