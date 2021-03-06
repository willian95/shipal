@extends("layouts.admin")

@section("content")
    
    <div id="dev-zones">
        <div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Zonas
                            </div>

                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#zoneModal" @click="create()">
                                    Cargar zonas
                                </a>
                                <!--end::Button-->
                            </div>
        
                        </div>

                        <div class="card-body">
                            <!--begin: Datatable-->

                            <table class="table table-bordered table-checkable" id="kt_datatable" style="margin-top: 15px;">
                                <thead>
                                    <tr>
                                        <th>País</th>
                                        <th>Zona</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(zone, index) in zones">
                                        
                                        <td>@{{ zone.name }}</td>
                                        <td>
                                            @{{ zone.zone_id }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="kt_datatable_info" role="status" aria-live="polite">Mostrando página @{{ page }} de @{{ pages }}</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_full_numbers" id="kt_datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous" id="kt_datatable_previous" v-if="page > 1">
                                                <a style="cursor:pointer" aria-controls="kt_datatable" data-dt-idx="1" tabindex="0" class="page-link" @click="fetch(index)">
                                                    <i class="ki ki-arrow-back"></i>
                                                </a>
                                            </li>
                                            <li class="paginate_button page-item active" v-for="index in pages">
                                                <a style="cursor:pointer" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                                            </li>
                                            
                                            <li class="paginate_button page-item next" id="kt_datatable_next" v-if="page < pages" href="#">
                                                <a style="cursor:pointer" aria-controls="kt_datatable" data-dt-idx="7" tabindex="0" class="page-link" @click="fetch(pages)">
                                                    <i class="ki ki-arrow-next"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->
                        </div>
                    </div>

                </div>

            </div>
       


        </div>

        <!-- Modal-->
        <div class="modal fade" id="zoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cargar zonas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="image">Excel de zonas</label>
                            <input type="file" class="form-control" id="image" @change="onFileChange">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="store()">Cargar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-zones',
            data(){
                return{
                    zones:[],
                    pages:0,
                    page:1,
                    file:"",
                    loading:false
                }
            },
            methods:{
                
                onFileChange(e){
                    this.file = e.target.files[0];
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                
                    this.createFile(files[0]);
                },
                createFile(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.file = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                store(){

                    this.loading = true
                    axios.post("{{ url('/admin/zones/store') }}", {file: this.file})
                    .then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            this.fetch()
                        }else{

                            swal({
                                title: "Lo sentimos!",
                                text: res.data.msg,
                                icon: "error"
                            });

                        }

                    })
                    .catch(err => {
                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                },
                fetch(page = 1){

                    this.page = page
                    axios.get("{{ url('/admin/zones/fetch') }}"+"/"+this.page)
                    .then(res => {

                        if(res.data.success == true){

                            this.zones = res.data.countries
                            this.pages = Math.ceil(res.data.countriesCount / res.data.dataAmount)
                            
                        }else{

                            swal({
                                title:"Lo sentimos",
                                text:res.data.msg,
                                icon:"error"
                            })

                        }

                    })

                },
                erase(id){

                    swal({
                        title: "¿Estás seguro?",
                        text: "Eliminarás esta noticia",
                        icon: "warning",
                        dangerMode:true,
                        buttons: true,
                        buttons: ["No!", "Sí!"]
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.loading = true
                            axios.post("{{ url('/admin/news/delete') }}", {id: id}).then(res => {
                                this.loading = false
                                if(res.data.success == true){
                                    swal({
                                        text:res.data.msg,
                                        icon:"success"
                                    })

                                    this.fetch(this.page)

                                }else{
                                    swal({
                                        text:res.data.msg,
                                        icon:"error"
                                    })
                                }
                                
                                

                            })
                        }
                    })

                }


            },
            mounted(){
                
                this.fetch()

            }

        })
    
    </script>

@endpush