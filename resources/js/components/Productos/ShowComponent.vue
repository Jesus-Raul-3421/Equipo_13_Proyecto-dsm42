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
                                <th scope="col">descripcion</th>
                                 <th scope="col">categoria</th>
                                 <th scope="col">Acciones</th>
                             </tr>
                            </thead>
                            <tbody>
                                <tr v-for="productos in productos" :key="productos.id">
                                <td v-text="productos.id"></td>
                                <td v-text="productos.nombre"></td>
                                <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(productos)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deleteproductos" type="button" class="btn btn-danger" v-on:click="deleteid(productos)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificación del producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="editarproductos()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">productos:</label>
                                    <input type="text"  v-model="productosedit.nombre" class="form-control" id="recipient-name">
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
                                <h5 class="modal-title" id="exampleModalLabel">Dar de alta un Vue.config.productionTip = false</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="Crearproductos()">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">productos:</label>
                                    <input type="text" v-model="nuevoproductos.nombre" class="form-control" id="recipient-name">
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
            
                <div class="modal fade" id="deleteproductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar el producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <h4>¿Esta seguro de eliminar este producto <span class="badge badge-pill badge-warning">{{productos.nombre}}</span>?</h4>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="deleteproductos(productosdelete.id)">Eliminar</button>
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
            productos: [],
            productosdelete: [],
            productosedit: [],    
                };
             
            },
            mounted() {
            this.getproductos();
        },
        methods: {
            
            getproductos: function(){
                 axios.get('productos').then(response => {
                    this.productos = response.data.productos
                });
            },
           
            updateid(id){
                this.productosedit = id;
            },
            
            editarproductos(){

                let urlUpdate='productos/'+ this.productosedit.id;
                
                axios.put(urlUpdate,this.productosedit).then(response =>{
                   
                if(response.data.error){
                    toastr.error("ocurrio un error");
                }else{
                    
                    toastr.info('Los productos se han actualizado con exito '); 
                    
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{

                });
            },
            

            deleteid(id){
                this.productosdelete =id; 
            },
            
            deleteproductos(id){
                
                let urldeleteproductos = 'productos/' + id;
                
                axios.delete(urldeleteproductos,this.productosdelete).then (response=>{
                    if(response.data.error){
                    
                    toast.error('ocurrio un error');
                }else{
                
                    toastr.info('se elimino con exito el producto'); 
                
                $('#deleteproductos').modal('hide');

            }
            }).catch(error =>{
                toastr.error('error al actualizar');

            });
        },

         Crearproductos(){
            
            let url="categoria";
            axios.post(url,this.nuevoproductos).then(response=>{
               
                this.nuevoproductos.nombre="";
                $('#guardarModal').modal('hide');
                toastr.success('Se dio de alta un nuevo producto'); 
                this.getcategoria();
            }).catch(error=>{
                toastr.error('error al guardar');
             });
         } 
    },
 }
</script>