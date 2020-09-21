@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none" id="plan">
    <div class="main-plan">
      <div class="section-grid section-gridtwo">
        <!-- Current Plan -->
        <div class="section-grid-currentplan">
          <div class="card-general">
            <div class="card-general-img">
              <img src="assets/img/logos/logo1.svg" alt="">
            </div>
            <div class="card-general-description">
              <p><strong>Plan actual</strong></p>
              <p>Paga a medida que avanzas</p>
              <p>Esto es perfecto para el negocio que no tiene una cantidad fija de envíos por mes.</p>
              <hr>
              <p>Sin cuotas mensuales.</p>
              <p>$0 pesos por envío adicional.</p>
            </div>
          </div>
        
          <div class="section-quetions text-center">
            <p><strong>¿Tienes preguntas?</strong></p>
            <p>Nuestro centro de ayuda está abierto las 24/7</p>
            <p>Quieres o llegar a nuestro equipo de apoyo global.</p>
            <p>Estamos aquí para ayudar</p>
          </div>
        </div>
        <!-- Setting -->
        <div class="section-grid-setting">
          <div class="navtabs-header">
            <h3>Ajusta tu plan</h3>
          </div>
          <div class="section-grid-settingcard">
            <p class="text-bold-general">Profesional</p>
            <p class="text-light-general">Creando etiquetas de envío a granel? El plan profesional se adaptará a las necesidades de envío de su empresa.</p>
            <a href="#" class="custom-links underline">Leer más</a>
            <div class="d-flex align-items-center mt-2 mb-2">
              <p class="text-light-general mr-2 mb-0">Ciclo de facturación</p>

              <form action="">

                <select class="form-control custom-select form-control-select" >
                  <option>Mensual</option>
                  <option>Anual</option>
                </select>
              
              </form>
            </div>
            <div class="d-flex justify-content-between flex-column flex-xl-row flex-lg-row flex-md-row">
              <div class="d-flex align-items-center mt-2 mb-2">
                <form >
                  <div class=" d-flex ">
                    <input type="range" class="form-control-range " v-model="planUser.label_amount" :min="Config.min_label_amount" :max="Config.max_label_amount" step="5" id="formControlRange">
                    <span class="ml-4"><strong>$@{{calculatePrice | MONEYVAMZ}}/mes</strong></span>
                  </div>
                  <p class="text-light-general">Imprimir <strong>@{{planUser.label_amount}}</strong> etiquetas al mes</p>
                </form>
              </div>
              <div class="text-right">
                {{--<a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Prueba gratuita</a>--}}
                <button type="button" class="btn-custom no-shadow small" @click="addPlan()">Prueba gratuita</button>

              </div>
            </div>
          </div>
          <hr>
          <div class="section-grid-settingcard">
            <p class="text-bold-general">Premium</p>
            <p class="text-light-general">Creando etiquetas de envío a granel? El plan profesional se adaptará a las necesidades de envío de su empresa.</p>
            <a href="#" class="custom-links underline">Leer más</a>
            <div class="text-right">
              <a href="#" class="btn-custom no-shadow small" data-toggle="modal" data-target="#CustomsInformation">Contáctanos</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection
@push('scripts')
<script>

   Vue.filter('MONEYVAMZ', function (value) {
    let val = (value/1).toFixed(2).replace('.', ',')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
   });

   const app = new Vue({
       el: '#plan',
       data: {
         errors:[],

         Config:{!! $Config ? $Config : "''"!!},

         planUser:{
            label_amount:'',
         },

         loading:false,

       },
      computed:{

        calculatePrice(){

            let price=0;

            let commonMultiplier = 1000000;

            let a=this.planUser.label_amount;

            let b=this.Config.label_price;

            a *= commonMultiplier;
            b *= commonMultiplier;

            price= parseFloat(((a * b) / (commonMultiplier * commonMultiplier)));
         
            return price;

         },//calculatePrice()
       },
       mounted(){

          this.planUser.label_amount=this.Config.min_label_amount;

       },//mounted()
       methods: {

         clear(){

            this.errors=[];

            this.planUser.label_amount=this.Config.min_label_amount;

            this.loading=false;

         },//clear()

         async addPlan(){

            let self = this;

            self.loading = true
            axios.post('{{ url("addPlan") }}', {

              planUser:self.planUser,

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.clear();
                  self.errors = [];

                  swal({
                    title: "Información",
                    text: "Registro Satisfactorio",
                    icon: "success",
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
       
       },//methods
   }); //const app= new Vue
   
</script> 
@endpush