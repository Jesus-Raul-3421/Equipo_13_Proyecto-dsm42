@extends('layouts.app')

@section('content')
<div  id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <cliente-index inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>correo</th>
                             <th>telefono</th>
                             <th>Acciones</th>
                            </thead>
                            <body>
                            <tr v-for="cliente in cliente">
                                <td v-text="cliente.id"></td>
                                <td v-text="cliente.nombre"></td>
                                <td v-text="cliente.apellido"></td>
                                <td v-text="cliente.correo"></td>
                                <td v-text="cliente.telefono"></td>
                                 <td><button>Edit</button></td>
                                </tr>
                            </body>

                    </cliente-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection