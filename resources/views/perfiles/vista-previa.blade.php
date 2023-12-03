@extends('layouts.app')
@section('content')

@include('perfiles.partials.tabs', ['form'=>'', 'preView'=>'active' ] )

<div class="hero overlay">

    <div class="img-bg rellax">
        <img src="{{ asset('images/Prueba.jpg') }}"  alt="Image" class="img-fluid">
        <div class="update-icon">
            <img src="{{ asset('images/icon/uploadImage.png') }}" class="img-upload" data-bs-toggle="modal" data-bs-target="#exampleModal" />
        </div>
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

<section id="bio" class="view-perfil">
    <div class="container contenedor-bio">
        <h1 class="titulos text-center mb-3">BIO</h1>
        <div class="text-bio text-center" data-aos="fade">
            <textarea id="inpBiografia" name="inpBiografia" class="inp-text" placeholder="Ingrese su biografía"> {{  $perfil->biografia }}</textarea>
        </div>
    </div>
</section>

<section id="Caracteristicas" class="gallery">

    <div class="container contenedor-bio">

        <h1 class="titulos text-center mb-3">HELP BRANDS FIND YOU</h1>

        <div class="text-bio text-center">

            <p>We invite you to embody the epitome of success in the modeling world. Discover below a range of options designed to capture the essence of your unique personality, creating a compelling profile that will attract top-tier brands. Let this be your passport to becoming a sought-after model, as we tailor your image to resonate with the industry's finest.</p>

        </div>


        <div id="cheks-caracteristicas">

            <h2 class="mt-5 mb-4">WHAT DO YOU LIKE?</h2>

            <h3 class="mt-4 mb-4">IN FASHION</h3>
            
            @foreach ($catalogo_fashion as $key=> $list )
                <div class="form-check form-switch d-inline-block">
                    <input class="form-check-input check_marca" type="checkbox" role="switch" id="{{ $catalogo_fashion[$key]['codigo'] }}" name="{{$catalogo_fashion[$key]['codigo']}}" data-perfil="{{$perfil->id}}" data-id="{{$catalogo_fashion[$key]['id']}}" data-padre="{{$catalogo_fashion[$key]['codigo_padre'] }}"   @checked(old($catalogo_fashion[$key]['codigo'], $catalogo_fashion[$key]['check'] ))  />
                    <label class="form-check-label" for="{{$catalogo_fashion[$key]['codigo']}}">{{$catalogo_fashion[$key]['nombre']}}</label>
                </div>
            @endforeach

            <hr>

            <h3 class="mt-4 mb-4">IN SPORTS</h3>
            @foreach ($catalogo_sport as $key=> $list )
                <div class="form-check form-switch d-inline-block">
                    <input class="form-check-input check_marca" type="checkbox" role="switch" id="{{ $catalogo_sport[$key]['codigo'] }}" name="{{$catalogo_sport[$key]['codigo']}}" data-perfil="{{$perfil->id}}" data-id="{{$catalogo_sport[$key]['id']}}" data-padre="{{$catalogo_sport[$key]['codigo_padre'] }}"   @checked(old($catalogo_sport[$key]['codigo'], $catalogo_sport[$key]['check'] ))  />
                    <label class="form-check-label" for="{{$catalogo_sport[$key]['codigo']}}">{{$catalogo_sport[$key]['nombre']}}</label>
                </div>
            @endforeach

        </div>
</section>


<hr>

<section id="redesSociales" class="gallery mb-5">

    <div class="container contenedor-bio">

        <h1 class="titulos text-center mb-3">YOUR SOCIAL NETWORKS</h1>

        <div class="offset-0 col-12 offset-md-3 col-md-6 mt-5">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <img src="{{ asset('images/icon/instagram.png') }}"  class="icons">
                </div>
                <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->id}}" data-nombre="Instagram" placeholder="Instagram" value="{{$social['Instagram'][0]}}" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <img src="{{ asset('images/icon/tiktok.png') }}"  class="icons">
                </div>
                <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->id}}" data-nombre="Tiktok" placeholder="Tiktok" value="{{$social['Tiktok'][0]}}" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <img src="{{ asset('images/icon/facebook.png') }}"  class="icons">
                </div>
                <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->id}}" data-nombre="Facebook" placeholder="Facebook" value="{{$social['Facebook'][0]}}" />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <img src="{{ asset('images/icon/twitter.png') }}"  class="icons">
                </div>
                <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->id}}" data-nombre="Twitter" placeholder="Twitter" value="{{$social['Twitter'][0]}}" />
            </div>
        </div>
    </div>

</section>

<section id="publicar" class="gallery mb-5">
    <div class="container">
        <div class="form-check form-switch d-inline-block text-center">
            <input class="form-check-input btn-publicar" type="checkbox" role="switch" id="checkPublicar"  @checked(old('checkPublicar', $perfil->check_publicar))>
            <label class="form-check-label label-publicar" for="publicar">PUBLISH YOUR PROFILE</label>
        </div>
    </div>
</section>
        

@include('perfiles.partials.modal')


            
@endsection
