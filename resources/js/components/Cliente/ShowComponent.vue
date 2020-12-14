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
                                <th scope="col">apellido</th>
                                <th scope="col">correo</th>
                                <th scope="col">telefono</th>
                                <th scope="col">Acciones</th>
                             </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in cliente" :key="cliente.id">
                                <td v-text="cliente.id"></td>
                                <td v-text="cliente.nombre"></td>
                                <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(cliente)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deletecliente" type="button" class="btn btn-danger" v-on:click="deleteid(cliente)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificación de un cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="editarcliente()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Cliente:</label>
                                    <input type="text"  v-model="clienteedit.nombre" class="form-control" id="recipient-name">
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
                                <h5 class="modal-title" id="exampleModalLabel">Dar de alta a un nuevo cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="Crearcliente()">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">cliente:</label>
                                    <input type="text" v-model="nuevocliente.nombre" class="form-control" id="recipient-name">
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

            
                <div class="modal fade" id="deletecliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar a un cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <h4>¿Esta seguro de eliminar a este cliente<span class="badge badge-pill badge-warning">{{cliente.nombre}}</span>?</h4>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="deletecliente(clientedelete.id)">Eliminar</button>
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
            cliente: [],
            clientedelete: [],
            clienteedit: [],    
                };
             
            },
            mounted() {
            this.getcliente();
        },
        methods: {
            
            getcliente: function(){
                 axios.get('cliente').then(response => {
                    this.cliente = response.data.cliente
                });
            },
           
            updateid(id){
                this.clienteedit = id;
            },
            
            editarcliente(){

                let urlUpdate='cliente/'+ this.clienteedit.id;
                
                axios.put(urlUpdate,this.clienteedit).then(response =>{
                   
                if(response.data.error){
                    toastr.error("ocurrio un error");
                }else{
                    
                    toastr.info('El cliente se actualizado '); 
                    
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{

                });
            },
            

            deleteid(id){
                this.clientedelete =id; 
            },
            
            deletecliente(id){
                
                let urldeletecliente = 'cliente/' + id;
                
                axios.delete(urldeletecliente,this.clientedelete).then (response=>{
                    if(response.data.error){
                    
                    toast.error('ocurrio un error');
                }else{
                
                    toastr.info('se elimino con exito al cliente'); 
                
                $('#deletecliente').modal('hide');

            }
            }).catch(error =>{
                toastr.error('error al actualizar');

            });
             
        },
         Crearcliente(){
            
            let url="cliente";
            axios.post(url,this.nuevocliente).then(response=>{
               
                this.nuevocliente.nombre="";
                $('#guardarModal').modal('hide');
                toastr.success('Se dio de alta el cliente'); 
                this.getcategoria();
            }).catch(error=>{
                toastr.error('error al guardar');
             });
         } 
    },
 }
</script>