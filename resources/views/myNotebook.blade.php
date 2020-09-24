
@extends("layouts.dashboard")
@section("content")
<section id="myNotebook">
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Mi libreta</h2>
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
     <div class="section-grid section-gridtwo grid-50">
       <div class="section-card section-card-paddings" v-for="value in recipients">
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Información de la dirección</strong></p>
               <a href="#" class="section-card-links" data-toggle="modal" data-target="#NewAddress" @click="capture(value)">Editar</a>
             </div>
           </div>
           <div class="section-card-content">
             <ul class="section-card-list">
               <li>@{{value.name}}</li>
               <li>@{{value.business_name}}</li>
               <li>
                 <img src="assets/img/icons/email.png" alt="">
                 @{{value.email}}
                 </li>
               <li>
                <li>
                  <img src="assets/img/icons/phone.png" alt="">
                  @{{value.phone}}
                </li>
                <li v-if="value.countries!=null">
                  <img src="assets/img/icons/colombia.png" alt="">
                  @{{value.countries.name}}
                </li>
                <li v-else>
                  <img src="assets/img/icons/colombia.png" alt="">
                  Colombia
                </li>
                <li>@{{value.city}}</li>
                <li>@{{value.address}}</li>
                <li>@{{value.postcode}} </li>
                <li>@{{value.address2}}</li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@include('partials.modals.myNotebook')
</section>
@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#myNotebook',
       data: {
        recipients:{!! $recipients ? $recipients : "''"!!},
        countries:{!! $countries ? $countries : "''"!!},
        errors:[],
        recipient:{
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

       methods: {

         capture(recipient){

            this.errors = [];

            this.recipient={
              id:recipient.id,
              country_id:recipient.country_id,
              name:recipient.name,
              business_name:recipient.business_name,
              email:recipient.email,
              phone:recipient.phone,
              address:recipient.address,
              address2:recipient.address2,
              city:recipient.city,
              state:recipient.state,
              postcode:recipient.postcode,
              is_international:recipient.is_international,
            };

            if( this.recipient.is_international==0){

               this.recipient.country_id=49;

            }//if(recipient.is_international==0
            
         },//capture()

         clear(){

            this.recipient={
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
              is_international:'',
            };

            this.loading=false;

         },//clear()

         UpdateRecipientsNotebook(){

            let self = this;

            self.loading = true

            axios.post('{{ url("UpdateRecipientsNotebook") }}', {

              recipient:self.recipient,

            }).then(function (response) {

               self.loading = false

               if(response.data.success==true){

                  self.recipients=response.data.recipients;

                  self.clear();

                  self.errors = [];

                  /*$('#NewAddress').modal('hide');*/

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

         },//createOrUpdateRecipients()

       },//methods
   }); //const app= new Vue
</script> 
@endpush