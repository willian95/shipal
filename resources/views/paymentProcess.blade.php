
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
    
   </div>
   <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
   <span class="hamburger-box">
   <span class="hamburger-inner"></span>
   </span>
   </button>
</div>
<div class="main-wrapper-content main-wrapper-content-none">
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-70">
        <div class="section-form">
  
          <div class="section-table section-table-nopadd">
            <div class="section-table-content section-table-contentbg table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Transportadora</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Valor del envío</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="section-table-img">
                        <img src="assets/img/logos/fedex.png" alt="">
                      </div>
                    </td>
                    <td>Jackie Risher, Empresa pepito <br> x Orden #56879</td>
                    <td>Merce Risher, Empresa <br> pepita Orden #56879</td>
                    <td>80 kgs</td>
                    <td>$80.000</td>
                  </tr>
              
                </tbody>
              </table>
              
            </div>
          </div>

          <div class="section-card section-card-paddings">
            <p class="mt-4"><strong>Pagos</strong></p>
            <div class="section-card-item ">
              <p class="section-card-textprimary text-center">Nacional</p>
              <div class="d-flex justify-content-center flex-column flex-sm-row flex-md-row flex-lg-row flex-xl-row align-items-center">
                <div class="card-w25 section-card-item ">
                  <div class="section-card-content">
                    <div class="text-center">
                      <img src="assets/img/logos/bitmap.png" alt="">
                      <form action="" class="mt-2">
                        <div class="form-check accept-packaging">
                          <input type="checkbox" class="form-check-input">
                          <label class="form-check-label font-13" for="acceptPackaging"><strong>Pse</strong> </label>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-w25 section-card-item">
                  
                  <div class="section-card-content">
                    <div class="text-center">
                      <img src="assets/img/logos/wallet.png" alt="">
                      <form action="" class="mt-2">
                        <div class="form-check accept-packaging">
                          <input type="checkbox" class="form-check-input">
                          <label class="form-check-label font-13" for="acceptPackaging"><strong>Usar saldo de mi billetera Shipal</strong> </label>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <center>
          <a href="#" class="btn-custom no-shadow medium mt-4">Pagar</a>
          </center>
        
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
@include('partials.modals')
@endsection
