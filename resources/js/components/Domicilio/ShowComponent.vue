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
                                <th scope="col">direccion</th>
                                <th scope="col">codigo postal</th>
                                <th scope="col">telefono</th>
                                <th scope="col">pais</th>
                                <th scope="col">provivencia</th>
                                <th scope="col">Acciones</th>
                             </tr>
                            </thead>
                            <tbody>
                                <tr v-for="domicilio in domicilio" :key="domicilio.id">
                                <td v-text="domicilio.id"></td>
                                <td v-text="domicilio.direccion"></td>
                                <td v-text="domicilio.codigo_postal"></td>
                                <td v-text="domicilio.telefono"></td>
                                <td v-text="domicilio.pais"></td>
                                <td v-text="domicilio.provivencia"></td>
                                 <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(domicilio)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deletedomicilio" type="button" class="btn btn-danger" v-on:click="deleteid(domicilio)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificación del domicilio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="editardomicilio()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">domicilio:</label>
                                    <input type="text"  v-model="domicilioedit.direccion" class="form-control" id="recipient-name">
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
                                <h5 class="modal-title" id="exampleModalLabel">dar de alta el domicilio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="Creardomicilio()">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">domicilio:</label>
                                    <input type="text" v-model="nuevodomicilio.direccion" class="form-control" id="recipient-name">
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
            
                <div class="modal fade" id="deletedomicilio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar el domicilio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <h4>¿Esta seguro de eliminar el domicilio<span class="badge badge-pill badge-warning">{{domicilio.direccion}}</span>?</h4>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="deletedomicilio(domiciliodelete.id)">Eliminar</button>
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
            domicilio: [],
            domiciliodelete: [],
            domicilioedit: [],
            nuevodomicilio:{
                    direccion:""
                }    
                };
    
            },
            mounted() {
            this.getdomicilio();
        },
        methods: {
            
            getdomicilio: function(){
                 axios.get('domicilio').then(response => {
                    this.domicilio = response.data.domicilio
                });
            },
           
            updateid(id){
                this.domicilioedit = id;
            },
            
            editardomicilio(){

                let urlUpdate='domicilio/'+ this.domicilioedit.id;
                
                axios.put(urlUpdate,this.domicilioedit).then(response =>{
                   
                if(response.data.error){
                    toastr.error("ocurrio un error");
                }else{
                    
                    toastr.info('El domicilio se actualizo  con exito '); 
                    
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{

                });
            },
            

            deleteid(id){
                this.domiciliodelete =id; 
            },
            
            deletedomicilio(id){
                
                let urldeletedomicilio = 'domicilio/' + id;
                
                axios.delete(urldeletedomicilio,this.domiciliodelete).then (response=>{
                    if(response.data.error){
                    
                    toast.error('ocurrio un error');
                }else{
                
                    toastr.info('se elimino con exito el domicilio'); 
                
                $('#deletedomicilio').modal('hide');

            }
            }).catch(error =>{
                toastr.error('error al actualizar');

            });
        },
         
         Creardomicilio(){
            
            let url="domicilio";
            axios.post(url,this.nuevodomicilio).then(response=>{
               
                this.nuevodomicilio.direccion="";
                $('#guardarModal').modal('hide');
                toastr.success('Se dio de alta una nueva direccion'); 
                this.getcategoria();
            }).catch(error=>{
                toastr.error('error al guardar');
             });
         } 
    },
 }
</script>