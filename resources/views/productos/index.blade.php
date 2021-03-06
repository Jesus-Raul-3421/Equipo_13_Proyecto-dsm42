@extends('layouts.app')

@section('content')
<div  id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">seccion de productos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <productos-index inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>descripcion</th>
                            <th>categoria</th>
                            <th>Acciones</th>
                            </thead>
                            <body>
                            <tr v-for="productos in productos">
                                <td v-text="productos.id"></td>
                                <td v-text="productos.nombre"></td>
                                <td v-text="productos.descripcion"></td>
                                <td v-text="productos.categoria"></td>
                                  <td><button>Edit</button></td>
                                </tr>
                            </body>

                    </productos-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection