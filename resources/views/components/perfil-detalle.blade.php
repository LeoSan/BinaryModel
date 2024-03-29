
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="BinaryModel.mx">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="description" content="BinaryModel" />
    <meta name="keywords" content="BinaryModel, Model, Skill, art" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Binary Models </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @vite('resources/sass/app.scss')
</head>
<body>
    <div class="container ">
    {{-- Buscador --}}
    <div class="row sticky-top">
        @include('components.search')
    </div>
    {{-- Perfil --}}
        <div class="hero overlay">
            <div class="img-bg rellax">
                <img id="img_hero" src="{{ asset('images/Prueba.jpg') }}"  alt="Image" class="img-fluid"  width="1100px" />
            </div>
            <div class="container view-perfil">
                <div class="row align-items-center justify-content-start">
                    <div class="col-lg-12">
                        <h1 class="heading text-center mt-5" data-aos="fade">
                            <input id="inpNombre" name="inpNombre" readonly type="text" value="{{$perfil? $perfil->nombre_completo:'Your name'}}" class="inp-title" />
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- Estado Fisico --}}
        <section id="contenedor-medidas " class="row mt-2 view-perfil" data-aos="fade">
            <div class="custom-lg medidas">
                <p>
                    <strong>HEIGHT</strong>      
                    <input  id="inpAltuta" name="inpAltuta" type="text" onkeyup="validaStringTeclado(this, 'float')"   maxlength="4" readonly
                            value="{{$perfil ? $perfil->altura : '0.00'}}" />
                    CM.
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>BUST</strong>   
                    <input id="inpBusto" name="inpBusto" type="text" onkeyup="validaStringTeclado(this, 'float')" maxlength="4" readonly
                            value="{{$perfil ? $perfil->busto: '0.00'}}"  />
                    CM.
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>WAIST</strong>
                    <input id="inpCintura" name="inpCintura" type="text" onkeyup="validaStringTeclado(this, 'float')" maxlength="4" readonly
                            value="{{$perfil ? $perfil->cintura : '0.00'}}"/>
                    CM.
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>HIPS</strong>         
                    <input id="inpCadera" name="inpCadera" type="text" onkeyup="validaStringTeclado(this, 'float')" maxlength="4" readonly
                            value="{{$perfil ? $perfil->cadera : '0.00'}}"/>
                    CM.
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>SHOES</strong>            
                    <input id="inpCalzado" name="inpCalzado" type="text" onkeyup="validaStringTeclado(this, 'float')" maxlength="4" readonly
                            value="{{$perfil ? $perfil->calzado : '0.00'}}" />
                    CM.
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>EYES</strong>   
                    <input id="inpColorOjos" name="inpColorOjos" type="text" class="inp-m" onkeydown="validaStringTeclado(this, 'letras')" readonly
                            value="{{$perfil ? $perfil->color_ojos : 'Your color'}}"
                    />
                </p>
            </div>
            <div class="custom-lg medidas">
                <p><strong>HAIR</strong>  
                    <input id="inpColorCabello" name="inpColorCabello" type="text" class="inp-m" onkeydown="validaStringTeclado(this, 'letras')"  readonly
                            value="{{$perfil ? $perfil->color_cabello : 'Your color'}}"/>
                </p>
            </div>
        </section>
        {{-- Biografia --}}
        <section id="bio" class="view-perfil">
            <div class="container contenedor-bio">
                <h1 class="titulos text-center mb-3">BIO</h1>
                <div class="text-bio text-center" data-aos="fade">
                    <textarea id="inpBiografia" name="inpBiografia" class="inp-text" placeholder="Your Biography" readonly> {{$perfil ? ($perfil->biografia==null)?'Your Biography':$perfil->biografia : 'Your Biography'}} </textarea>
                </div>
            </div>
        </section>
        {{-- Habilidades --}}
        <section id="Caracteristicas" class="gallery">
            <div class="container">
                <h1 class="titulos text-center mb-3">Habilidades</h1>
                <div id="cheks-caracteristicas">
                    @forelse ( $catalogo as $key=> $list )
                        <h3 class="mt-4 mb-4">{{$catalogo[$key]['nom_categoria']}}</h3>        
                        <div class="form-check form-switch d-inline-block col-12">
                            <input class="form-check-input check_marca" type="checkbox" role="switch" id="{{ $catalogo[$key]['id'] }}" name="{{$catalogo[$key]['nombre']}}" data-user="{{$perfil->usuario_id}}" data-id="{{$catalogo[$key]['id']}}"  @checked(old($catalogo[$key]['id'], $catalogo[$key]['check'] )) disabled  />
                            <label class="form-check-label" for="{{$catalogo[$key]['id']}}">{{$catalogo[$key]['nombre']}}</label>
                        </div>    
                    @empty
                        @include('components.data_not_found')
                    @endforelse
                </div>
        </section>
        {{-- Redes Sociales--}}
        <section id="redesSociales" class=" mb-5">
            <div class="container contenedor-bio">
                <h1 class="titulos text-center mb-3">NETWORKS</h1>
                <div class="offset-0 col-12 offset-md-3 col-md-6 mt-5">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <img src="{{ asset('images/icon/instagram.png') }}"  class="icons">
                        </div>
                        <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->usuario_id}}" data-nombre="Instagram" placeholder="Instagram" value="{{$social['Instagram'][0]}}" readonly />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <img src="{{ asset('images/icon/tiktok.png') }}"  class="icons">
                        </div>
                        <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->usuario_id}}" data-nombre="Tiktok" placeholder="Tiktok" value="{{$social['Tiktok'][0]}}" readonly />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <img src="{{ asset('images/icon/facebook.png') }}"  class="icons">
                        </div>
                        <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->usuario_id}}" data-nombre="Facebook" placeholder="Facebook" value="{{$social['Facebook'][0]}}" readonly />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <img src="{{ asset('images/icon/twitter.png') }}"  class="icons">
                        </div>
                        <input type="text" class="form-control inputRedes" data-perfil="{{$perfil->usuario_id}}" data-nombre="Twitter" placeholder="Twitter" value="{{$social['Twitter'][0]}}" readonly/>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- Modal Filter --}}
    @include('components.filters', ['filtros'=>$filtros])
</body>
@vite('resources/js/app.js')
</html>

