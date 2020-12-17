@extends('layouts.app')

@section('content')
<div  id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categorias</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <categoria-index inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>Tipo</th>
                            <th>nivel</th>
                            <th>descripcion</th>
                             <th>Acciones</th>
                            </thead>
                            <body>
                            <tr v-for="categoria in categoria">
                                <td v-text="categoria.id"></td>
                                <td v-text="categoria.nombre"></td>
                                <td v-text="categoria.Tipo"></td>
                                <td v-text="categoria.nivel"></td>
                                <td v-text="categoria.descripcion"></td>
                                <td><button>Edit</button></td>
                                </tr>
                            </body>

                    </categoria-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection