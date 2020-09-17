
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Usuario</h2>
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
     <div class="section-grid">
      <div class="navtabs-plan-card">
          <div class="navtabs-plan-cardheader">
            <p class="navtabs-plan-cardtitle">Su Plan <span>standar</span></p>
            <a href="{{ url('/plan') }}" class="btn-custom no-shadow small" >Ajustar plan</a>
          </div>
          <div class="navtabs-plan-cardcontent">
            <div class="navtabs-plan-cardimg">
              <img src="assets/img/icons/graphic-2.png" alt="">
            </div>
            <div class="navtabs-plan-cardtext mt-3">
              <p><strong>Añade usuarios </strong></p>
              <p>Con el plan Standar puedes añadir simply dummy text of the printing and typesetting industry.</p>
              
            </div>
          </div>
        </div>
     </div>
   </div>
</div>
@endsection
