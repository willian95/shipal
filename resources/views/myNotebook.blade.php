
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Mi libreta</h2>
      <hr class="d-none d-sm-block d-md-block d-lg-block d-xlblock">
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
     <div class="section-grid section-gridtwo grid-50">
       <div class="section-card section-card-paddings">
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Información de la dirección</strong></p>
             </div>
           </div>
           <div class="section-card-content">
             <ul class="section-card-list">
               <li>Pepita Maria  de los rios</li>
               <li>Chila Bags S.A.S</li>
               <li>
                 <img src="assets/img/icons/email.png" alt="">
                 pepita.maria@sigma3ds.com</li>
               <li>
                <li>
                  <img src="assets/img/icons/phone.png" alt="">
                  24357667889
                </li>
                <li>
                  <img src="assets/img/icons/colombia.png" alt="">
                  Colombia
                </li>
                <li> Bogotá</li>
                <li>Calle 40 #45-578 San Antonio </li>
                <li>1340656 </li>
                <li>Unidad San Germán del Bosque </li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection
