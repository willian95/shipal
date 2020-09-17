
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
      <h4 class="mb-0"><strong>Método de pago</strong></h4>
      <hr class="d-none d-sm-none d-md-block d-lg-block d-xlblock">
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
       <div>
         <div class="section-card-item ">
           <div class="d-flex justify-content-center flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row align-items-center">
             <div class="card-w25 mt-4 section-card-item ">
               <div class="section-card-content">
                 <div class="text-center">
                   <img src="assets/img/logos/bitmap.png" alt="">
                   <a href="" class="mt-2">
                     <p class="text-center"><strong>Pagos PSE</strong></p>
                   </a>
                 </div>
               </div>
             </div>
             <div class="card-w25 mt-4 section-card-item">
               
               <div class="section-card-content">
                 <div class="text-center">
                   <img src="assets/img/logos/wallet.png" alt="">
                   <a href="" class="mt-2">
                     <p class="text-center"><strong>Transferencia</strong></p>
                   </a>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="section-card">
           <div class="section-card-item">
             <div class="section-card-header">
               <div class="d-flex justify-content-start">
                 <p><strong>Resumen de tu abono</strong></p>               
               </div>
             </div>
             <div class="section-card-content">
               <ul class="payment-overview pt-2">
                 <li class="d-flex justify-content-between">
                   <p>
                     Saldo actual   
                   </p>
                   <p>$0</p>
                 </li>
                 <li class="d-flex justify-content-between">
                   <p>Saldo de abono</p>
                   <p>$16.00</p>
                 </li>
                 <li class="d-flex justify-content-between">
                   <p>Saldo nuevo </p>
                   <p>$16.00</p>
                 </li>
                 <hr>
                 <li class="d-flex justify-content-between main-text-sub">
                   <p>Saldo Total:  </p>
                   <p>$16.00</p>
                 </li>
               </ul>
             </div>
           </div>
         </div>
       </div>
       <div></div>

      </div>

   </div>
</div>
@endsection
