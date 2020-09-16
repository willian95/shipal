
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Notificaciones</h2>
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
        <div class="navtabs-plan-card mb-4">
          <div class="navtabs-plan-cardheader justify-content-start pt-3 pb-3">
            <p class="navtabs-plan-cardtitle">Personalice sus notificaciones de envíos <a href="#" class="btn-custom no-shadow extrasmall" >Pro</a></p>
          </div>
          <div class="navtabs-plan-cardcontent">
            <div class="navtabs-plan-cardimg">
              <img src="assets/img/icons/graphic-3.png" alt="">
            </div>
            <div class="navtabs-plan-cardtext mt-3">
              <p>Actualícese al plan profesional ahora para añadir texto personalizado en sus correos electrónicos de notificación de envío. Una oportunidad más para personalizar la experiencia del cliente y deleitarlo</p>
            </div>
          </div>
        </div>
        <div class="section-card ">
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Notificaciones del correo electrónico</strong></p>
             </div>
           </div>
           <div class="section-card-content">
             <span class="mb-0">Correo electrónico de notificación de envío: informar a los clientes sobre el envío y la información de seguimiento</span>
             <br>
             <a href=""  class="custom-links font-14">Envíe un correo electrónico de muestra a la dirección de mi cuenta</a>
             <ul>
               <li>
                 <img src="assets/img/icons/email-2.png" alt="">
                 <strong>El autoenvío está desactivado</strong>
               </li>
             </ul>
           </div>
         </div>
       </div>
        
     </div>
   </div>
</div>
@endsection
