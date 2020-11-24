@extends("layouts.auth")

@section("content")

  <section class="main-session" id="login-area">

  <div class="main-loader" v-if="loading == true">
    <div class="fulfilling-bouncing-circle-spinner">
      <div class="circle"></div>
      <div class="orbit"></div>
    </div>
  </div>

    <div class="session-grid">
      <div class="session-form-div">
        <img src="{{ asset('assets/img/logos/logo1.svg') }}" alt="Shipal Logo">
        <h4>¡Dar una buena acogida!</h4>
        <p>No podemos esperar a que veas las novedades. ¡Feliz envío!</p>
        <form class="custom-form session-form w-100">
          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" class="form-control" v-model="email">
          </div>
          <div class="form-group">
            <div class="label-group">
              <label>Contraseña</label>
              <a href="{{ url('/forgot-password') }}" class="link-custom">¿Olvidaste tu contraseña?</a>
            </div>
            <input type="password" class="form-control" v-model="password">
          </div>
          <div class="form-group">
            <input type="button" class="btn-custom no-shadow small" value="Enviar" @click="login()">
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

@push("scripts")

  @if(session('alert'))
      <script>
          swal({
              title:"Excelente",
              text:"{{ session('alert') }}",
              icon:"success"
          })
      </script>
  @endif

    <script>
    
        const app = new Vue({
            el: '#login-area',
            data(){
                return{
                    email:"",
                    password:"",
                    loading:false
                }
            },
            methods:{
              
              login(){
                this.loading = true
                axios.post("{{ url('/login') }}", {email: this.email, password: this.password}).then(res => {
                  this.loading = false
                  if(res.data.success == true){
                    swal({
                      "icon": "success",
                      "text": res.data.msg
                    }).then(confirm => {
                      
                      if(res.data.role_id == 1){
                        window.location.href="{{ url('/admin/dashboard') }}"
                      }else{
                        window.location.href="{{ url('/dashboard') }}"
                      }
                      
                    })
                  }else{
                    swal({
                      "icon": "error",
                      "text": res.data.msg
                    })
                  }

                })
                .catch(err => {
                  this.loading = false
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
  