@extends("layouts.auth")

@section("content")

<section class="main-session">
    <div class="session-grid">
      <div class="session-form-div">
        <img src="assets/img/logos/logo1.svg" alt="Shipal Logo">
        <h4 class="mb-4">¿Se te olvidó tu contraseña?</h4>
        <p class="forgot-password-description mb-5"><strong>¡Sucede!</strong> Simplemente danos la dirección de correo electrónico que utilizaste para registrarte en Shipal, y te enviaremos una solución por correo electrónico de inmediato.</p>
        <form class="custom-form session-form w-100">
          <div class="form-group">
            <div class="label-group">
              <label>Correo electrónico</label>
            </div>
            <input type="email" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" class="btn-custom no-shadow small" value="Restablecer">
          </div>
        </form>
        <div class="session-form-footer">
          <p>¿No tienes una cuenta? <a href="register.html" class="link-custom">¡Empieza ahora!</a></p>
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