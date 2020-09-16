
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
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
<div class="main-wrapper-content main-wrapper-content-none" id="packageInfomation">
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-60">
       <div class="section-form">
         <form class="custom-form session-form w-100">
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Tipo de empaque</label>
               <select class="form-control custom-select">
                 <option value="1">Ingresar dimensiones personalizadas</option>
                 <option value="2">Opcion 2</option>
               </select>
             </div>
           </div>
     
           <div class="form-group mb-0">
             <label>Dimesiones </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Longitud">
                 <span>x</span>
               </div>
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Ancho">
                 <span>x</span>
               </div>
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Altura">
                 <span>cm</span>
               </div>
             </div>
           </div>
           <div class="form-group mb-0">
             <label>Peso </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Peso">
                 <span>Kgs</span>
               </div>
             </div>
           </div>
           <div class="form-group mb-0">
             <label>Valor declarado </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Valor declarado">
               </div>
             </div>
           </div>
           <hr>
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Fecha de envío</label>
               <input type="date" class="form-control" placeholder="2020-06-08">
             </div>
             <div class="form-group">
               <label>Asegura tu paquete*</label>
               <div class="d-flex">
                 <div class="form-check accept-packaging mr-4">
                   <input type="checkbox" class="form-check-input" id="si">
                   <label class="form-check-label" for="si">Si</label>
                 </div>
                 <div class="form-check accept-packaging">
                   <input type="checkbox" class="form-check-input" id="no">
                   <label class="form-check-label" for="no"> No</label>
                 </div>
               </div>
             </div>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Programar recolección del envío</label>
           </div>

           <div class="session-form-two-columns mt-2">
             <div class="session-form-two-columns">
               <div class="form-group">
                 <label class="color-gray">Fecha de recolección</label>
                 <input type="date" class="form-control" placeholder="California">
               </div>
               <div class="form-group ">
                <label class="color-gray">Fecha de recolección</label>
                <div class="d-flex align-items-center">
                <label class="btn btn-default active">
                  <input type="radio" name="options" checked="">
                  <div>Word</div>
                </label>
                
                </div>
               </div>
             </div>
          </div>

           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Factura proforma</label>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Crear automaticamente guía de retorno</label>
           </div>
           <center>
            <a href="#" class="btn-custom no-shadow medium mt-4">Añadir declaración Aduana</a>
           </center>
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
                <li><img src="assets/img/icons/colombia.png" alt="colombia">&nbsp;Colombia</li>
                <li><img src="assets/img/icons/email.png" alt="email">&nbsp;@{{receiver.email}}</li>
                <li><img src="assets/img/icons/phone.png" alt="phone">&nbsp;@{{receiver.phone}}</li>
             </ul>

           </div>
         </div>
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del remitente</strong></p>
               <a href="#" class="section-card-links">
                 <img src="assets/img/icons/agenda.png" alt="agenda">
               </a>
             </div>
           </div>
           <div class="section-card-content">
             <p><strong>@{{sender.name}}</strong></p>
             <ul class="section-card-list">
                <li>@{{sender.address}}</li>
                <li v-if="sender.address2!=null">@{{sender.address}}</li>
                <li>@{{sender.city}}</li>
                <li><img src="assets/img/icons/colombia.png" alt="colombia">&nbsp;Colombia</li>
                <li><img src="assets/img/icons/email.png" alt="email">&nbsp;@{{sender.email}}</li>
                <li><img src="assets/img/icons/phone.png" alt="phone">&nbsp;@{{sender.phone}}</li>
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
       el: '#packageInfomation',
       data: {
         sender:'',
         receiver:'',
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
         }//SesionShipping
       },//methods
   }); //const app= new Vue
   
</script> 
@endpush