
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
      <div class="main-steps-header">
        <p class="main-steps-text">
          Paso 
          <span>2</span>
          de 
          <span>3</span>
        </p>
        <div class="main-steps-active">
          <div class="main-steps-icon">
            <img src="assets/img/icons/arrow-up.png" alt="">
          </div>
          <p>
            <strong>Información del paquete</strong>
          </p>
        </div>
      </div>
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<div class="main-wrapper-content main-wrapper-content-none pt-0">
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-70">
       <div class="section-form">
          <ul class="nav nav-tabs nav-tabs-nopadd" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Shipal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Otra (en caso de que esté integrado)</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="section-table-content section-table-tabscontent table-responsive pt-0">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="section-table-img">
                          <img src="assets/img/logos/fedex.png" alt="">
                        </div>
                      </td>
                      <td>Fedex Express documento lorem ipsum</td>
                      <td>3 días</td>
                      <td>$320.000</td>
                      <td>
                        <a href="#" class="btn-custom no-shadow extrasmall">Comprar Etiqueta</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="section-table-img">
                          <img src="assets/img/logos/fedex.png" alt="">
                        </div>
                      </td>
                      <td>Fedex Express documento lorem ipsum</td>
                      <td>3 días</td>
                      <td>$320.000</td>
                      <td>
                        <a href="#" class="btn-custom no-shadow extrasmall">Comprar Etiqueta</a>
                      </td>
                    </tr>
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          </div>
       </div>
       <div class="section-card section-card-paddings">
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del receptor</strong></p>
               <a href="#" class="section-card-links">Editar</a>
             </div>
           </div>
           <div class="section-card-content">
             <p><strong>Pepita Maria</strong></p>
             <ul class="section-card-list">
                <li>Sigma</li>
                <li>65467 Calle 60 #78-145</li>
                <li>Medellín </li>
                <li>
                  <img src="assets/img/icons/colombia.png" alt="">
                  Colombia</li>
                <li>
                  <img src="assets/img/icons/email.png" alt="">
                  pepita.maria@sigma3ds.com</li>
                <li>
                  <img src="assets/img/icons/phone.png" alt="">
                  24357667889</li>
             </ul>

         

           </div>
         </div>
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del remitente</strong></p>
               <a href="#" class="section-card-links">
                 <img src="assets/img/icons/agenda.png" alt="">
               </a>
             </div>
           </div>
           <div class="section-card-content">
             <p><strong>Chila Bags SAS</strong></p>
             <ul class="section-card-list">
                <li>65467 Calle 60 #78-145</li>
                <li>
                  Bogotá 
                </li>
                <li>
                  <img src="assets/img/icons/colombia.png" alt="">
                  Colombia</li>
                <li>
                  <img src="assets/img/icons/email.png" alt="">
                  pepita.maria@sigma3ds.com</li>
                <li>
                  <img src="assets/img/icons/phone.png" alt="">
                  24357667889</li>
             </ul>
           </div>
         </div>
         <div class="section-card-item">
           <div class="section-card-header">
             <div class="d-flex justify-content-between">
               <p><strong>Dirección del remitente</strong></p>
               <a href="#" class="section-card-links">
                 Editar
               </a>
             </div>
           </div>
           <div class="section-card-content">
             <form action="" class="mt-2 mb-2">
              <div class="form-check accept-packaging">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label font-13" for="acceptPackaging"><strong>
                  Usar mi dirección de retorno
                </strong></label>
              </div>
             </form>
             <p><strong>Chila Bags SAS</strong></p>
             <ul class="section-card-list">
                <li>65467 Calle 60 #78-145</li>
                <li>
                  Bogotá 
                </li>
                <li>
                  <img src="assets/img/icons/colombia.png" alt="">
                  Colombia</li>
                <li>
                  <img src="assets/img/icons/email.png" alt="">
                  pepita.maria@sigma3ds.com</li>
                <li>
                  <img src="assets/img/icons/phone.png" alt="">
                  24357667889</li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection
