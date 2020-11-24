@extends("layouts.dashboard")

@section("content")
  <div id="shippings">
    <div class="main-wrapper-boxheader">
      <div class="main-wrapper-header main-wrapper-header-transparent">
        <h2>Envíos</h2>
        <hr class="d-none d-sm-none d-md-block d-lg-block d-xlblock">
      </div>
      <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
    <hr class="d-block d-sm-block d-md-none d-lg-none d-xl-none">
    <div class="main-wrapper-boxfilter">
      <form class="mr-2">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fa fa-search mr-2"></i>
              Filtro
          </span>
          </div>
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
      </form>
      <div class="main-shippings__btns d-flex">
        <a href="#" class="btn-custom small no-shadow outline mr-2">
          <img src="assets/img/icons/supermarket.png" alt="">
          Progamar recogida
          <img src="assets/img/icons/triangle.png" alt="">
        </a>
        <a href="#" class="btn-custom small no-shadow outline">
          <img src="assets/img/icons/export.png" alt="">
            Exportar
          <img src="assets/img/icons/triangle.png" alt="">
        </a>
      </div>
    </div>
    <div class="main-wrapper-content main-wrapper-content-none">
      <div class="main-wrapper-profile">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-tabs-item nav-link active" id="nav-made-tab" data-toggle="tab" href="#nav-made" role="tab" aria-controls="nav-made" aria-selected="true">Realizados</a>
            <a class="nav-item nav-tabs-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pendientes</a>
          </div>
        </nav>


        <div class="tab-content" id="nav-tabContent">
          <!-- SHIPMENTS MADE -->
          <div class="tab-pane fade show active" id="nav-made" role="tabpanel" aria-labelledby="nav-made-tab">
            <div class="section-table pt-1">
              <div class="section-table-content table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Transportadores</th>
                      <th scope="col">Servicios</th>
                      <th scope="col">Tarifas</th>
                      <th scope="col">Destinatario</th>
                      <th scope="col">Creado</th>
                      <th scope="col">Estado del seguimiento</th>
                      <th scope="col">Estado de la plantilla</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img src="assets/img/logos/fedex.png" alt="" style="width:50%;">
                      </td>
                      <td>Internacional Prio…</td>
                      <td>$80.000</td>
                      <td  class="text-left">Jackie Risher, Empresa xxx
                        <br> 
                        Orden #56879
                      </td>
                      <td>08/12/2020</td>
                      <td class="text-left">Local FedEx 
                        <br>
                        <strong>8904586004032</strong>
                      </td>
                      <td>
                      <a href="#" class="btn-custom small no-shadow outline">
                        <!-- <img src="assets/img/icons/" alt=""> -->
                        Descargar
                      </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="assets/img/logos/dhl.png" alt="" style="width:50%;">
                      </td>
                      <td>Internacional Prio…</td>
                      <td>$80.000</td>
                      <td  class="text-left">Jackie Risher, Empresa xxx
                        <br> 
                        Orden #56879
                      </td>
                      <td>08/12/2020</td>
                      <td class="text-left">Local FedEx 
                        <br>
                        <strong>8904586004032</strong>
                      </td>
                      <td>
                      <a href="#" class="btn-custom small no-shadow outline">
                        <!-- <img src="assets/img/icons/" alt=""> -->
                        Descargar
                      </a>
                      </td>
                    </tr>
                
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>

          <!-- SHIPMENTS PENDING -->
          <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
          <div class="section-table pt-1">
              <div class="section-table-content table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Transportadores</th>
                      <th scope="col">Servicios</th>
                      <th scope="col">Tarifas</th>
                      <th scope="col">Destinatario</th>
                      <th scope="col">Creado</th>
                      <th scope="col">Selecciona los envíos</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="pending in pendingShippings">
                      <td>
                        <img :src="'{{ asset('/') }}'+pending.courier.logo" alt="" style="width:50%;">
                      </td>
                      <td>@{{ pending.courier.name }}</td>
                      <td>$80.000</td>
                      <td  class="text-left">@{{ pending.recipient.name }}
                        <br> 
                        @{{ pending.recipient.address }}
                      </td>
                      <td>@{{ pending.created_at.substring(0, 10) }}</td>
 
                      <td>
                        <form action="">
                          <div class="form-check accept-packaging">
                            <input type="checkbox" class="form-check-input">
                          </div>
                        </form>
                      </td>
                    </tr>

                
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
        
      </div>

    </div>
  
  </div>
@endsection

@push("scripts")

    <script>
    
        const app = new Vue({
            el: '#shippings',
            data(){
                return{
                    pendingShippings:[],
                }
            },
            methods:{
              
              getPendingShippings(){

                axios.get("{{ url('/envios/pendientes') }}").then(res => {

                  this.pendingShippings = res.data.pendingShippings

                })

              }
  
            },
            mounted(){
                
              this.getPendingShippings()
  
            }
  
        })
    
    </script>

@endpush

