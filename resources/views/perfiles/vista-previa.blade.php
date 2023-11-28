@extends('layouts.app')
@section('content')

@include('perfiles.partials.tabs', ['form'=>'', 'preView'=>'active' ] )

<div class="hero overlay">

    <div class="img-bg rellax">
        <img src="{{ asset('images/hero_1.jpg') }}"  alt="Image" class="img-fluid">
    </div>

    <div class="container view-perfil">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-12">
                <h1 class="heading text-center mt-5" data-aos="fade">
                    <input id="inpNombre" name="inpNombre" type="text" value="{{$perfil->usuario->name}}" class="inp-title">
                </h1>
            </div>
        </div>
    </div>
</div>

<section id="contenedor-medidas " class="row mt-2 view-perfil" data-aos="fade">
    <div class="custom-lg medidas">
        <p>
            <strong>HEIGHT</strong>      
            <input id="inpAltuta" name="inpAltuta" type="text"  value="{{$perfil->altura}}">
            CM.
        </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>BUST</strong>   
            <input id="inpBusto" name="inpBusto" type="text"  value="{{$perfil->busto}}">
            CM.
        </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>WAIST</strong>
            <input id="inpCintura" name="inpCintura" type="text"  value="{{$perfil->cintura}}">
            CM.
        </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>HIPS</strong>         
            <input id="inpCadera" name="inpCadera" type="text"  value="{{$perfil->cadera}}">
            CM.
           </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>SHOES</strong>            
            <input id="inpCalzado" name="inpCalzado" type="text"  value="{{$perfil->calzado}}">
            CM.
        </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>EYES</strong>   
            <input id="inpColorOjos" name="inpColorOjos" type="text"  value="{{$perfil->color_ojos}}" class="inp-m">
        </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>HAIR</strong>  
            <input id="inpColorCabello" name="inpColorCabello" type="text"  value="{{$perfil->color_cabello}}" class="inp-m">
        </p>
    </div>
</section>

<section id="bio">
    <div class="container contenedor-bio">
        <h1 class="titulos text-center mb-3">BIO</h1>
        <div class="text-bio text-center" data-aos="fade">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel ultrices eros. Nullam tempus faucibus ex, vitae sodales tortor ultricies nec. Duis mattis leo nec mattis lacinia. Donec felis mauris, eleifend lacinia porta et, auctor vitae urna. Maecenas laoreet cursus iaculis. Vivamus commodo et mauris non semper. Donec iaculis lacus non aliquet ultricies. Ut vitae mauris auctor leo iaculis molestie. Duis vel lectus vitae velit consequat mollis.</p>
        </div>
    </div>
</section>
        
            
@endsection
