@extends("layouts.admin")

@section("content")
    
    <div id="dev-news">
        <div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Couriers
                            </div>

                            <div class="card-toolbar">

                                <!--begin::Button-->
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#courierModal" @click="create()">
                                    Crear courier
                                </a>
                                <!--end::Button-->
                            </div>
        
                        </div>

                        <div class="card-body">
                            <!--begin: Datatable-->

                            <table class="table table-bordered table-checkable" id="kt_datatable" style="margin-top: 15px;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Logo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(courier, index) in couriers">
                                        
                                        <td>@{{ courier.name }}</td>
                                        <td>
                                            <img :src="courier.logo" alt="" style="width: 60px;">
                                        </td>
                                        <td>
                                            <button class="btn btn-success" data-toggle="modal" data-target="#courierModal" @click="edit(courier)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            {{--<button class="btn btn-secondary" @click="erase(notice.id)">
                                                <i class="fas fa-times"></i>
                                            </button>--}}
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
                                                <a style="cursor:pointer;" aria-controls="kt_datatable" data-dt-idx="1" tabindex="0" class="page-link" @click="fetch(index)">
                                                    <i class="ki ki-arrow-back"></i>
                                                </a>
                                            </li>
                                            <li class="paginate_button page-item active" v-for="index in pages">
                                                <a style="cursor:pointer;" aria-controls="kt_datatable" tabindex="0" class="page-link":key="index" @click="fetch(index)" >@{{ index }}</a>
                                            </li>
                                            
                                            <li class="paginate_button page-item next" id="kt_datatable_next" v-if="page < pages" href="#">
                                                <a style="cursor:pointer;" aria-controls="kt_datatable" data-dt-idx="7" tabindex="0" class="page-link" @click="fetch(pages)">
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
        <div class="modal fade" id="courierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" v-model="name">
                        </div>

                        <div class="form-group">
                            <label for="image">Logo</label>
                            
                            <input type="file" class="form-control" id="image" @change="onImageChange">
                            <img :src="imagePreview" alt="" style="width: 150px">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="store()" v-if="action == 'create'">Crear</button>
                        <button type="button" class="btn btn-primary font-weight-bold"  @click="update()" v-if="action == 'edit'">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-news',
            data(){
                return{
                    couriers:[],
                    pages:0,
                    page:1,
                    name:"",
                    image:"",
                    imagePreview:"",
                    action:"create",
                    courierId:"",
                    modalTitle:"Crear courier",
                    loading:false
                }
            },
            methods:{
                
                create(){
                    this.modalTitle = "Crear courier"
                    this.action = "create"
                    this.courierId = ""
                    this.name = ""
                    this.image = ""
                    this.imagePreview = ""
                },
                edit(courier){
                    this.modalTitle = "Editar courier"
                    this.action = "edit"
                    this.name = courier.name
                    this.imagePreview = courier.logo
                    this.courierId = courier.id
                },
                onImageChange(e){
                    this.image = e.target.files[0];

                    this.imagePreview = URL.createObjectURL(this.image);
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                
                    this.createImage(files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                store(){

                    this.loading = true
                    axios.post("{{ url('/admin/couriers/store') }}", {name: this.name, image: this.image})
                    .then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            this.name = ""
                            this.image = ""
                            this.imagePreview = ""
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
                update(){

                    this.loading = true
                    axios.post("{{ url('admin/couriers/update') }}", {name: this.name, image: this.image, id: this.courierId})
                    .then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                title: "Perfecto!",
                                text: res.data.msg,
                                icon: "success"
                            });
                            this.name = ""
                            this.packageId = ""
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
                    axios.get("{{ url('/admin/couriers/fetch') }}"+"/"+this.page)
                    .then(res => {

                        if(res.data.success == true){

                            this.couriers = res.data.couriers
                            this.pages = Math.ceil(res.data.couriersCount / res.data.dataAmount)
                            
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