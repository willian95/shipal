
@extends("layouts.dashboard")
@section("content")
<div class="main-wrapper-boxheader">
   <div class="main-wrapper-header main-wrapper-header-transparent">
      <h2>Nacional</h2>
      <div class="main-steps-header">
        <p class="main-steps-text">
          Paso 
          <span>1</span>
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
<div class="main-wrapper-content main-wrapper-content-none">
   <div class="main-packageinformation">
     <div class="section-grid section-gridtwo grid-60">
       <div class="section-form">
         <form class="custom-form session-form w-100">
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Tipo de empaque</label>
               <select class="form-control custom-select">
                 <option value="1">Ingresar dimensiones personalizadas</option>
                 <option value="2">Opcion 2</option>
               </select>
             </div>
           </div>
     
           <div class="form-group mb-0">
             <label>Dimesiones </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Longitud">
                 <span>x</span>
               </div>
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Ancho">
                 <span>x</span>
               </div>
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Altura">
                 <span>cm</span>
               </div>
             </div>
           </div>
           <div class="form-group mb-0">
             <label>Peso </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Peso">
                 <span>Kgs</span>
               </div>
             </div>
           </div>
           <div class="form-group mb-0">
             <label>Valor declarado </label> 
             <div class="session-form-three-columns">
               <div class="form-group form-group-flexrow">
                 <input type="text" class="form-control" placeholder="Valor declarado">
               </div>
             </div>
           </div>
           <hr>
           <div class="session-form-two-columns">
             <div class="form-group">
               <label>Fecha de envío</label>
               <input type="date" class="form-control" placeholder="2020-06-08">
             </div>
             <div class="form-group">
               <label>Asegura tu paquete*</label>
               <div class="d-flex">
                 <div class="form-check accept-packaging mr-4">
                   <input type="checkbox" class="form-check-input" id="si">
                   <label class="form-check-label" for="si">Si</label>
                 </div>
                 <div class="form-check accept-packaging">
                   <input type="checkbox" class="form-check-input" id="no">
                   <label class="form-check-label" for="no"> No</label>
                 </div>
               </div>
             </div>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Programar recolección del envío</label>
           </div>

           <div class="session-form-two-columns mt-2">
             <div class="session-form-two-columns">
               <div class="form-group">
                 <label class="color-gray">Fecha de recolección</label>
                 <input type="date" class="form-control" placeholder="California">
               </div>
               <div class="form-group ">
                <label class="color-gray">Fecha de recolección</label>
                <div class="d-flex align-items-center">
                <label class="btn btn-default active">
                  <input type="radio" name="options" checked="">
                  <div>Word</div>
                </label>
                
                </div>
               </div>
             </div>
          </div>

           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Factura proforma</label>
           </div>
           <div class="form-check accept-packaging">
             <input type="checkbox" class="form-check-input">
             <label class="form-check-label font-13" for="acceptPackaging">Crear automaticamente guía de retorno</label>
           </div>
           <center>
            <a href="#" class="btn-custom no-shadow medium mt-4">Añadir declaración Aduana</a>
           </center>
         </form>
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
                <li>Colombia</li>
                <li>pepita.maria@sigma3ds.com</li>
                <li>24357667889</li>
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
                <li>Bogotá </li>
                <li>Colombia</li>
                <li>pepita.maria@sigma3ds.com</li>
                <li>24357667889</li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@endsection
