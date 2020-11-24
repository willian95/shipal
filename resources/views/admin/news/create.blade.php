@extends("layouts.admin")

@section("content")

    <div class="container" >
        <div id="dev-news-create">

            <div class="loader-cover-custom" v-if="loading == true">
                <div class="loader-custom"></div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3 mt-3">
                    <img :src="imagePreview" alt="" style="width: 100%">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" class="form-control" @change="onImageChange">
                    </div>
                </div>
                <div class="col-md-6 offset-md-3 mt-3">
                    
                    <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" class="form-control" v-model="title">
                    </div>
                </div>

            </div>
            <button style="display:none" @click="store()" id="click"></button>
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <textarea name="editor1" id="editor1" rows="10" cols="80">
          
                </textarea>
            </div>
            <div class="col-12">
                <p class="text-center">
                    <button class="btn btn-success" onclick="normalClick()">Crear</button>
                </p>
            </div>
        </div>
        
    </div>

@endsection

@push("scripts")

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        function normalClick(){
            $("#click").click();
        }
    </script>

<script>
        
        const app = new Vue({
            el: '#dev-news-create',
            data(){
                return{
                    id:"",
                    image:"",
                    imagePreview:"",
                    text:"",
                    title:"",
                    loading:false,
                 
                }
            },
            methods:{

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
                    this.text = CKEDITOR.instances.editor1.getData()
                    axios.post("{{ url('/admin/news/store') }}", {text: this.text, title: this.title, image: this.image}).then(res => {
                        this.loading = false
                        if(res.data.success == true){
                            swal({
                                text:res.data.msg,
                                icon:"success"
                            })
                            .then(res => {

                                window.location.href="{{ url('/admin/news/list') }}"

                            })
                        }else{

                            swal({
                                text:res.data.msg,
                                icon:"error"
                            })

                        }

                    })
                    .catch(err => {
                        this.loading = false
                        $.each(err.response.data.errors, function(key, value) {
                            alertify.error(value[0])
            
                        });
                    })

                }

                


            },
            mounted(){
                
                

            }

        })
    
    </script>
    
@endpush