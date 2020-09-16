@extends("layouts.auth")

@section("content")

<section class="main-session" id="resetPassword">
    <div class="session-grid">
      <div class="session-form-div">
        <img src="{{ asset('assets/img/logos/logo1.svg') }}" alt="Shipal Logo">
        <h4 class="mb-4">¿Resetear Contraseña?</h4>
        <p class="forgot-password-description mb-5"><strong>¡Sucede!</strong> Simplemente coloca tu nueva contraseña y guarda.</p>
        <form class="custom-form session-form w-100">
          <div class="form-group">
            <div class="label-group">
              <label>Establece tu nueva contraseña</label>
            </div>
            <input type="password" class="form-control" v-model="password">
            <p class="descripcion-input">De 6 o más carácteres</p>
          </div>
          <div class="form-group">
            <input type="button" class="btn-custom no-shadow small" value="Guardar" @click="save">
          </div>
        </form>
        <div class="session-form-footer">
          <p>¿No tienes una cuenta? <a href="{{ url('/register') }}" class="link-custom">¡Empieza ahora!</a></p>
        </div>
      </div>
      <div class="session-info">
        <div class="session-info-text">
          <h2>Pon tus productos en manos de los clientes más rápidos.</h2>
          <p>Almacenamos sus artículos de forma segura, luego recogemos, empacamos y enviamos sus pedidos el mismo día.</p>
        </div>
        <div class="session-info-quote">
          <div class="session-blockquote">
            <p>"Trabajar con <strong>Shipal</strong> nos ha permitido centrarnos en las partes importantes de la gestión de nuestro negocio y permite que otra persona se encargue del envío".</p>
          </div>
          <div class="session-blockquote-author">
            <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
            <div class="session-blockquote-author-name">
              <h4>Mauricio Piña</h4>
              <span>CEO, Marketing</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@push('scripts')
<script>
   const app = new Vue({
       el: '#resetPassword',
       data: {
         email:'',
         password:'',
       },
       methods: {

          save(){
            let email = window.location;
            email =email.toString().split("-");

            let self = this;

            if(self.password==""){
              
              swal({
                  "icon": "error",
                  "text": "El campo contraseña es requerido"
                });

            }else{

            axios.post('{{ url("reset-password") }}', {
              
              password:self.password,
              email:email[1],
              
            }).then(function (response) {
               if(response.data.success==true){

                  swal({
                        title: "Información",
                        text: "Cambio de clave exitoso!",
                        icon: "success",
                  });
                 window.location.href="{{ url('/') }}";
               }//if(response.data.success==true)
               else if(response.data.success==false){                     
                  swal({
                        title: "Información",
                        text: response.data.msg,
                        icon: "error",
                  });
               }//else if(response.data.success==false)
            }).catch(function (error) {
                       if (error.response.status == 422) {

                          $.each(error.response.data.errors.email, function( key, value ) {

                            swal({
                              "icon": "error",
                              "text": value
                            })

                          });

                          $.each(error.response.data.errors.password, function( key, value ) {

                            swal({
                              "icon": "error",
                              "text": value
                            });

                          });

                      }//if (error.response.status ==422)
                      else{

                              swal({
                                "icon": "error",
                                "text": "Ha ocurrido un problema"
                              });

                      }//else
            });

            }//else

          },//save()

       },//methods
   }); //const app= new Vue
   
</script> 
@endpush