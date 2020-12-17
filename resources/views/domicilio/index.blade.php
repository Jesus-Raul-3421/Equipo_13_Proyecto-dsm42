@extends('layouts.app')

@section('content')
<div  id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pedidos a domicilio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <domicilio-index inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>direccion</th>
                            <th>codigo postal</th>
                            <th>telefono</th>
                            <th>pais</th>
                            <th>provivencia</th>
                             <th>Acciones</th>
                            </thead>
                            <body>
                            <tr v-for="domicilio in domicilio">
                                <td v-text="domicilio.id"></td>
                                <td v-text="domicilio.direccion"></td>
                                <td v-text="domicilio.codigo_postal"></td>
                                <td v-text="domicilio.telefono"></td>
                                <td v-text="domicilio.pais"></td>
                                <td v-text="domicilio.provivencia"></td>
                                <td><button>Edit</button></td>
                                </tr>
                            </body>

                    </domicilio-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection