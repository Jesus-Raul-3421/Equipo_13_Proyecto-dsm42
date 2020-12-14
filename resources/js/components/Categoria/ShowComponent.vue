<template>
    <div>
    <div class="row justify-content-between">
                <div class="col-4">
                            <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center btn btn-primary"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>

            <table class="table">
                            <thead class="thead-dark">

                            <tr>
                                <th scope="col">nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">nivel</th>
                                <th scope="col">descripcion</th>
                                <th scope="col">Acciones</th>
                             </tr>
                            </thead>
                            <tbody>
                                <tr v-for="categoria in categoria" :key="categoria.id">
                                <td v-text="categoria.id"></td>
                                <td v-text="categoria.nombre"></td>
                                <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(categoria)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deletecategoria" type="button" class="btn btn-danger" v-on:click="deleteid(categoria)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificación de la categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="editarcategoria()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">categoria:</label>
                                    <input type="text"  v-model="categoriaedit.nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button ttype="submit" name="action" class="btn btn-primary">Actualizar</button>
                                                                   
                                </div>
                                </form>
                            </div>
                        
                            </div>

                        </div>

                </div>

                <div class="modal fade" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dar de de alta una nueva categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="Crearcategoria()">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">categoria:</label>
                                    <input type="text" v-model="nuevacategoria.nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="action" class="btn btn-primary">Guardar</button>
                                </div>
                                </form>
                            </div>
                        
                            </div>

                        </div>

                </div>
            
                <div class="modal fade" id="deletecategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar la categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <h4>¿Esta seguro de eliminar esta categoria <span class="badge badge-pill badge-warning">{{categoria.nombre}}</span>?</h4>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="deletecategoria(categoriadelete.id)">Eliminar</button>
                            </div>
                            </div>
                        </div>
                        </div>
    </div>
</template>

<script>
 export default {
    data (){
            return{
            categoria: [],
            categoriadelete: [],
            categoriaedit: [],    
                };
             
            },
            mounted() {
            this.getcategoria();
        },
        methods: {
            
            getcategoria: function(){
                 axios.get('categoria').then(response => {
                    this.categoria = response.data.categoria
                });
            },
           
            updateid(id){
                this.categoriaedit = id;
            },
            
            editarcategoria(){

                let urlUpdate='categoria/'+ this.categoriaedit.id;
                
                axios.put(urlUpdate,this.categoriaedit).then(response =>{
                   
                if(response.data.error){
                    toastr.error("ocurrio un error");
                }else{
                    
                    toastr.info('La categoria se actualizo  con exito '); 
                    
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{

                });
            },
            

            deleteid(id){
                this.categoriadelete =id; 
            },
            
            deletecategoria(id){
                
                let urldeletecategoria = 'categoria/' + id;
                
                axios.delete(urldeletecategoria,this.categoriadelete).then (response=>{
                    if(response.data.error){
                    
                    toast.error('ocurrio un error');
                }else{
                
                    toastr.info('se elimino con exito la categoria'); 
                
                $('#deletecategoria').modal('hide');

            }
            }).catch(error =>{
                toastr.error('error al actualizar');

            });
        },
       
       Crearcategoria(){
            
            let url="categoria";
            axios.post(url,this.nuevacategoria).then(response=>{
               
                this.nuevacategoria.nombre="";
                $('#guardarModal').modal('hide');
                toastr.success('La categoria se dio de alta'); 
                this.getcategoria();
            }).catch(error=>{
                toastr.error('error al guardar');
             });
         }   
    },
 }
</script>