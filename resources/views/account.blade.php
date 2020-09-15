@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Cuenta</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-profile">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-tabs-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Perfil</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-billing-tab" data-toggle="tab" href="#nav-billing" role="tab" aria-controls="nav-billing" aria-selected="false">Facturación</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-plan-tab" data-toggle="tab" href="#nav-plan" role="tab" aria-controls="nav-plan" aria-selected="false">Plan</a>
          <a class="nav-item nav-tabs-item nav-link" id="nav-company-tab" data-toggle="tab" href="#nav-company" role="tab" aria-controls="nav-company" aria-selected="false">Compañía</a>
        </div>
      </nav>


      <div class="tab-content" id="nav-tabContent">
        <!-- PROFILE -->
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="navtabs-header">
            <h3>Perfil</h3>
          </div>
          <div class="navtabs-profile">
            <div class="navtabs-profile-gridtwo">
              <div class="navtabs-profile-img">
                <div class="navtabs-profile-imgbox">
                  <img :src="previewImage" alt="imagen usuario">
                  <a href="#" class="navtabs-profile-imgbox-edit" @click="clickInput()">
                    <img src="assets/img/icons/edit.png" alt="">
                    
                  </a>
                  <input type="file" style="display:none" id="profile-image-input" accept="image/*" @change="onImageChange">
                </div>
              </div>
              <div class="navtabs-profile-form">
                <form class="custom-form custom-forms  w-100">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Peranito Jesús" v-model="name">
                  </div>
                 
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Peranitojesus@shipal.com" v-model="email">
                  </div>
                  <div class="form-group">
                    <label>Rol</label>
                    <input type="text" class="form-control" placeholder="Propietario de la cuenta">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" placeholder="************" v-model="current_password">
                  </div>
                  <div class="form-group">
                    <label>Nueva contraseña</label>
                    <input type="password" placeholder="************" v-model="new_password">
                  </div>
                  <div class="form-group">
                    <label>Confirmar nueva contraseña</label>
                    <input type="password" placeholder="************" v-model="new_password_confirmation">
                  </div>
                  <a href="#" class="btn-custom no-shadow small" data-target="#" @click="update()">Guardar</a>
                </form>
              </div>
            </div>
          </div>
          
        </div>

        <!-- BILLING -->
        <div class="tab-pane fade" id="nav-billing" role="tabpanel" aria-labelledby="nav-billing-tab">
          <div class="navtabs-header">
            <h3>Método de pago</h3>
          </div>
          

        </div>

        <!-- PLAN -->
        <div class="tab-pane fade" id="nav-plan" role="tabpanel" aria-labelledby="nav-plan-tab">
          <div class="navtabs-plan">
            <div class="navtabs-plan-card">
              <div class="navtabs-plan-cardheader">
                <p class="navtabs-plan-cardtitle">Su Plan</p>
                <a href="{{ url('/plan') }}" class="btn-custom no-shadow small" >Ajustar plan</a>
              </div>
              <div class="navtabs-plan-cardcontent">
                <div class="navtabs-plan-cardimg">
                  <img src="assets/img/icons/graphic.png" alt="">
                </div>
                <div class="navtabs-plan-cardtext">
                  <p><strong>Paga a medida que avanzas</strong></p>
                  <p>Libre</p>
                  <p>Número de asientos: <span>0</span></p>
                  
                </div>
              </div>
            </div>
            <div class="navtabs-btn">
              <a href="#" class="custom-links">Cerrar cuenta</a>
            </div>
          </div>
        </div>

        <!-- COMPANY-->
        <div class="tab-pane fade" id="nav-company" role="tabpanel" aria-labelledby="nav-company-tab">...</div>
      </div>
      
    </div>

  </div>
@endsection

@push("scripts")

    <script>
    
        const app = new Vue({
            el: '#nav-profile',
            data(){
                return{
                  name:"{{ \Auth::user()->name }}",
                  email:"{{ \Auth::user()->email }}",
                  previewImage:"{{ \Auth::user()->image ? \Auth::user()->image : asset('assets/img/icons/user.png') }}",
                  image:"",
                  current_password:"",
                  new_password:"",
                  new_password_confirmation:""
                }
            },
            methods:{

              onImageChange(e){
                  this.image = e.target.files[0];

                  this.previewImage = URL.createObjectURL(this.image);
                  let files = e.target.files || e.dataTransfer.files;
                  if (!files.length)
                      return;
              
                  this.createImage(files[0]);
              },
              createImage(file) {
                  let reader = new FileReader();
                  let vm = this;
                  reader.onload = (e) => {
                      vm.image = e.target.result;
                  };
                  reader.readAsDataURL(file);
              },
              clickInput(){
            
                $("#profile-image-input").click()
              },
              update(){

                axios.post("{{ url('/cuenta/actualizar') }}", {name: this.name, email: this.email, password: this.current_password, new_password: this.new_password, new_password_confirmation: this.new_password_confirmation, image: this.image}).then(res => {

                  if(res.data.success == true){

                    swal({
                      icon:"success",
                      title:"¡Genial!",
                      text: res.data.msg
                    }).then(() => {
                      window.location.reload()
                    })

                  }else{
                    swal({
                      icon:"error",
                      title:"Lo sentimos!",
                      text: res.data.msg
                    })
                  }

                })
                .catch(err => {

                  $.each(err.response.data.errors, function(key, value) {
                      alert(value[0])
                  });
                })

              }
  
            },
            mounted(){
                
              
  
            }
  
        })
    
    </script>

@endpush