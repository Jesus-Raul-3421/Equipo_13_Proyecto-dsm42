@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estos son los productos que ofrecemos</div>
                    <section class="container-fluid content py-5">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-7 text-center">
                                <h1>Storeline</h1>
                                <hr>
                                <img src="imagenes/carro.jpg" alt="" class="img-fluid">
                                 <hr>
                                 <footer class="container-fluid bg-main">
                                    <div class="col-12">
                                         <div id="col-md-10">
                                            <a href="#">
                                                <img src="{{url('imagenes/facebook.jpg')}}"width="40px">
                                            </a>
                                            <a href="#">
                                                <img src="{{url('imagenes/twitter.png')}}" width="40px">
                                            </a>
                                            <a href="#">
                                                <img src="{{url('imagenes/youtube.jpg')}}" width="40px">
                                            </a>
                                            <p class="mt-3">Terminos y condiciones. <br>Aviso de privacidad</p>
                                        </div>
                                    </div>
                                </footer>  
                                 </div> 
                                
                        </div> 
                     </section>
                    </div>
                </div>  
            </div>
        </div>
        
    </div>

</div>
@endsection




            

