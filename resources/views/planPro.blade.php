
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
          <div class="navtabs-plan-cardheader justify-content-start pt-3 pb-3">
            <p class="navtabs-plan-cardtitle">Su Plan <span>Pro</span></p>
          </div>
          <div class="navtabs-plan-cardcontent">
            <div class="navtabs-plan-cardimg">
              <img src="assets/img/icons/graphic-2.png" alt="">
            </div>
            <div class="navtabs-plan-cardtext mt-3">
              <p><strong> <a href="#" class="#" data-toggle="modal" data-target="#CreateUser">Añade usuarios a tu cuenta</a></strong></p>
              <p>Con el plan Pro puedes añadir hasta 0 usuarios para gestionar los envíos como un equipo.</p>
            </div>
          </div>
        </div>
        <div class="navtabs-plan-card">
          <div class="navtabs-plan-cardheader">
            <p class="navtabs-plan-cardtitle">Lista de usuarios</p>
            <a href="{{ url('/plan') }}" class="btn-custom no-shadow outline small" >Nuevo usuario</a>
          </div>
          <div class="navtabs-plan-cardcontent navtabs-plan-cardcontent-grid100">
            <ul>
              <li class="d-flex circle{">
                <div class="circle mr-2">
                  <p>pj</p>
                </div>
                <span>Peranito Jesús (Cuenta)</span>
                
              </li>
            </ul>
          </div>
        </div>
        <div class="navtabs-plan-card">
          <div class="navtabs-plan-cardheader">
            <p class="navtabs-plan-cardtitle">Invitación pediente</p>
            <a href="{{ url('/plan') }}" class="btn-custom no-shadow outline small" >Nuevo usuario</a>
          </div>
          <div class="navtabs-plan-cardcontent navtabs-plan-cardcontent-grid100">
            
          </div>
        </div>
        
     </div>
   </div>
</div>
@include('partials.modals')
@endsection
