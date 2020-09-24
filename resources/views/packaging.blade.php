
@extends("layouts.dashboard")
@section("content")
<section id="typesPackaging">
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Empaques</h2>
      <hr class="d-none d-sm-none d-md-block d-lg-block d-xlblock">
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<hr class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
<div class="main-wrapper-content main-wrapper-content-none pt-2 ">

      <div class="main-loader" v-if="loading == true">
         <div class="fulfilling-bouncing-circle-spinner">
            <div class="circle"></div>
            <div class="orbit"></div>
         </div>
      </div>

   <div class="main-packageinformation">
    <div class="section-card-item">
      <div class="section-card-header">
        <div class="d-flex justify-content-between">
          <p><strong>Plantillas de empaques</strong></p>
          <a href="" class="btn-custom no-shadow outline small" data-toggle="modal" data-target="#NewPackaging" @click="UpdateOrCreate(1,'')">Nueva plantilla</a>
        </div>
      </div>
      <div class="section-card-content section-card-content-nopadd">
        <div class="section-table-content section-table-contentcard table-responsive pt-0">
          <table class="table">
            <tbody>
              <tr v-for="Packaging in Packagings">
                <td>
                  <div class="section-table-img">
                    <img src="assets/img/icons/icon-box.png" alt="">
                  </div>
                </td>
                <td>
                  @{{Packaging.name}}
                  <br>
                  <span>(@{{Packaging.length}} X @{{Packaging.width}} X @{{Packaging.height}} cm)</span>
                </td>
                <td><span v-if="Packaging.weight!=null">@{{Packaging.weight}} kg</span></td>
                <td>
                  <a href="" class="section-card-links underline"  data-toggle="modal" data-target="#NewPackaging"   @click="UpdateOrCreate(2,Packaging)">Editar</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
   </div>
</div>
@include('partials.modals.packaging')

</section>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#typesPackaging',
       data: {
         errors:[],
         Packagings:{!! $TypesPackaging ? $TypesPackaging : "''"!!},

         typesPackaging:{

                          id:null,
                          name:'',
                          length:'', 
                          width:'',
                          height:'',
                          weight:'',
                          predetermined:false
         },

         title:'Nueva plantilla de empaque',

         option:0,

         loading:false,

       },
       mounted(){
            
       },//mounted()
       methods: {


         UpdateOrCreate(option,typesPackaging){

            if(option==1){

               this.option=1;

               this.clear();

               this.title='Nueva plantilla de empaque';

            }else{

               this.option=2;

               this.typesPackaging=typesPackaging;

               this.title='Actualizar plantilla de empaque';

            }//else

         },//UpdateOrCreate(option)

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


         },//clear()

         async addTypesPackaging(){

           let self = this;

            self.loading = true
            axios.post('{{ url("addTypesPackaging") }}', {

              typesPackaging:self.typesPackaging,

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.Packagings=response.data.TypesPackaging;
                  self.clear();
                  self.errors = []

                    swal({
                      icon:"success",
                      title:"Información",
                      text: "Registro Satisfactorio",
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

         async updateTypesPackaging(){

           let self = this;

            self.loading = true
            axios.post('{{ url("updateTypesPackaging") }}', {

              typesPackaging:self.typesPackaging,

            }).then(function (response) {
               self.loading = false
               if(response.data.success==true){
                  self.Packagings=response.data.TypesPackaging;
                  self.clear();
                  self.errors = []

                    swal({
                      icon:"success",
                      title:"Información",
                      text: "Actualización Satisfactoria",
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

       },//methods
   }); //const app= new Vue
   
</script> 
@endpush
