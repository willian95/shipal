@extends("layouts.auth")

@section("content")

  <section class="main-session" id="register-area">
    <div class="session-grid">
      <div class="session-form-div">
        <img src="{{ asset('assets/img/logos/logo1.svg') }}" alt="Shipal Logo">
        <h4>¡Completa el formulario!</h4>
        <form class="custom-form session-form w-100">
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Correo comercial</label>
            <input type="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Sitio web de la empresa</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Nombre de la empresa</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <div class="label-group">
              <label>Establece tu contraseña</label>
            </div>
            <input type="password" class="form-control">
            <p class="descripcion-input">De 6 o más carácteres</p>
          </div>
          <div class="form-group">
            <input type="submit" class="btn-custom no-shadow small" value="Crea una cuenta">
          </div>
          <div class="form-check accept-terms">
            <input type="checkbox" class="form-check-input" id="acceptTerms">
            <label class="form-check-label" for="acceptTerms">Al crear su cuenta, acepta nuestros <a class="link-custom" href="{{ url('terminos-y-condiciones') }}">términos y condiciones</a></label>
          </div>
          <p class="link-login"><a href="{{ url('/login') }}" class="link-custom">Iniciar sesión</a></p>
        </form>
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

  <script>
        
      const app = new Vue({
          el: '#register-area',
          data(){
              return{
                  
              }
          },
          methods:{


          },
          mounted(){
              
            

          }

      })
  
  </script>

@endpush