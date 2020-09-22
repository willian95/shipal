
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Mis tiendas</h2>
      <hr class="d-none d-sm-none d-md-block d-lg-block d-xlblock">
      <h4 class="mb-0"><strong>Conectar con mis tiendas</strong></h4>
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<hr class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
<div class="main-wrapper-content main-wrapper-content-none pt-0">
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-50">
       

      </div>

   </div>
</div>
@include('partials.modals')
@endsection
