@extends("layouts.dashboard")

@section("content")
  <div class="main-wrapper-boxheader">
    <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Internacional</h2>
    </div>
    <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="main-wrapper-content main-wrapper-content-none">
    <div class="main-wrapper-formstwo">
      <div class="main-wrapper-forms">
        <div class="main-wrapper-headerforms">
          <p>Remitente</p>
          <img src="{{ url('assets/img/question.png') }}" alt="">
        </div>
        <form class="custom-form custom-forms  w-100">
          <div class="form-group">
            <label>Apodo</label>
            <select class="form-control custom-select">
              <option value="1">Otro Apodo</option>
              <option value="2">Opcion 2</option>
              <option value="3">Opcion 3</option>
            </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
              <input type="text" class="form-control" placeholder="Pepita Maria">
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com">
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356">
            </div>
          </div>
          <label class="label-gray">De</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="California">
            </div>
            <div class="form-group">
              <label>Estado</label>
              <input type="text" class="form-control" placeholder="California">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Código postal</label>
              <input type="number" class="form-control" placeholder="1234">
            </div>
            <div class="form-group">
              <label>País</label>
              <select class="form-control custom-select">
                <option value="1">País</option>
                <option value="2">Opcion 2</option>
                <option value="3">Opcion 3</option>
              </select>
            </div>
          </div>
      
        </form>
      </div>
      <div class="main-wrapper-forms">
        <div class="main-wrapper-headerforms">
          <p>Receptor</p>
          <img src="{{ url('assets/img/question.png') }}" alt="">
        </div>
        <form class="custom-form custom-forms  w-100">
          <div class="form-group">
            <label>Apodo</label>
            <select class="form-control custom-select">
              <option value="1">Otro Apodo</option>
              <option value="2">Opcion 2</option>
              <option value="3">Opcion 3</option>
            </select>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Nombre*</label>
              <input type="text" class="form-control" placeholder="Pepita Maria">
            </div>
            <div class="form-group">
              <label>Compañía*</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Email*</label>
              <input type="email" class="form-control" placeholder="pepitamaria@shipal.com">
            </div>
            <div class="form-group">
              <label>Teléfono*</label>
              <input type="tel" class="form-control" placeholder="320 567 2356">
            </div>
          </div>
          <label class="label-gray">Para</label>
          <div class="form-group">
            <label>Dirección*</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="form-group">
            <label>Dirección (opcional)</label>
            <input type="text" class="form-control" placeholder="Carrera 50 A # 56-245 Oficina 305">
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" class="form-control" placeholder="California">
            </div>
            <div class="form-group">
              <label>Estado</label>
              <input type="text" class="form-control" placeholder="California">
            </div>
          </div>
          <div class="session-form-two-columns">
            <div class="form-group">
              <label>Código postal</label>
              <input type="number" class="form-control" placeholder="1234">
            </div>
            <div class="form-group">
              <label>País</label>
              <select class="form-control custom-select">
                <option value="1">País</option>
                <option value="2">Opcion 2</option>
                <option value="3">Opcion 3</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="btn-formtwo">
        <a href="#" class="btn-custom no-shadow medium">Guardar y continuar</a>
      </div>
    </div>
  </div>
@endsection