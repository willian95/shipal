
@extends("layouts.dashboard")
@section("content")
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
   <div class="main-packageinformation">
    <div class="section-card-item">
      <div class="section-card-header">
        <div class="d-flex justify-content-between">
          <p><strong>Plantillas de empaques</strong></p>
          <a href="" class="btn-custom no-shadow outline small" data-toggle="modal" data-target="#NewPackaging">Nueva plantilla</a>
        </div>
      </div>
      <div class="section-card-content section-card-content-nopadd">
        <div class="section-table-content section-table-contentcard table-responsive pt-0">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <div class="section-table-img">
                    <img src="assets/img/icons/icon-box.png" alt="">
                  </div>
                </td>
                <td>
                  DHL FLYER
                  <br>
                  <span>(41 X 31 X 1 cm)</span>
                </td>
                <td>0.5 kg</td>
                <td>
                  <a href="#" class="section-card-links underline">Editar</a>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="section-table-img">
                    <img src="assets/img/icons/icon-box.png" alt="">
                  </div>
                </td>
                <td>
                  DHL FLYER
                  <br>
                  <span>(41 X 31 X 1 cm)</span>
                </td>
                <td>0.5 kg</td>
                <td>
                  <a href="#" class="section-card-links underline">Editar</a>
                </td>
              </tr>
          
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
   </div>
</div>
@include('partials.modals')
@endsection
