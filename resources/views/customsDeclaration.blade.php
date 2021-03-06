
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Introducir la declaración de aduanas</h2>
    
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
         <form class="custom-form session-form w-100">
            <div class="form-group">
            <label>Tipo de contenido*</label>
              <select class="form-control custom-select">
                <option value="1">Merchandise</option>
                <option value="2">Opcion 2</option>
              </select>
            </div>
            <div class="form-check accept-packaging">
              <input type="checkbox" class="form-check-input">
              <label class="form-check-label font-13" for="acceptPackaging">Certifico la validez de toda la información</label>
            </div>
          
           <hr>
            <div class="section-table">
              <div class="section-table-header">
                <h4>Ingrese la siguiente información de la Aduana</h4>
              </div>
              <div class="section-table-content table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Descripción</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Total de valor</th>
                      <th scope="col">Original</th>
                      <th scope="col">Editar</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Paquete</td>
                      <td>2</td>
                      <td>80.000</td>
                      <td>CO</td>
                      <td>
                        <a href="#" class="btn-custom outline-gray extrasmall">Editar</a>
                      </td>
                    </tr>
                
                  </tbody>
                </table>
                
              </div>
            </div>
           
            <div class="section-btns mb-4">
              <a href="#" class="section-btns-items btn-custom no-shadow small mt-4" data-toggle="modal" data-target="#CustomsInformation">
                Seguir agregando</a>
              <a href="#" class="section-btns-items btn-custom small no-shadow outline">Remover</a>
              <a href="#" class="section-btns-items btn-custom small no-shadow outline">Editar</a>
            </div>
           <p class="text-light-general font-14">
              <img src="assets/img/icons/info-2.png" alt="">
              Para más información sobre los posibles cobros de aduanas por Países por favor dar 
           </p>
           <p class="text-light-general font-14">
              Para más información sobre los posibles cobros de aduanas por Países por favor dar 
              <a href="#" class="custom-links underline font-14">click aquí</a>
            </p>
           <div class="form-check accept-packaging">
              <input type="checkbox" class="form-check-input">
              <label class="form-check-label font-13" for="acceptPackaging">Acepto políticas de privacidad, términos y condiciones. </label>
            </div>
           <center>
            <a href="#" class="btn-custom no-shadow medium mt-4">Seleccionar servicio de envío</a>
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
