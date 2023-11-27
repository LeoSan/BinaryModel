@extends('layouts.app')
@section('content')

@include('perfiles.partials.tabs', ['form'=>'', 'preView'=>'active' ] )

<div class="hero overlay">

    <div class="img-bg rellax">
        <img src="{{ asset('images/hero_1.jpg') }}"  alt="Image" class="img-fluid">
    </div>

    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-12">
                <h1 class="heading text-center mt-5" data-aos="fade">EDGAR CONTI</h1>
            </div>
        </div>
    </div>
</div>

<section id="contenedor-medidas" class="row mt-2" data-aos="fade">
    <div class="custom-lg medidas">
        <p><strong>HEIGHT</strong>   1,70CM.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>BUST</strong>   72 CM.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>WAIST</strong>   60 CM.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>HIPS</strong>   87 CM.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>SHOES</strong>   3 MX.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>EYES</strong>   BROWN.   </p>
    </div>
    <div class="custom-lg medidas">
        <p><strong>HAIR</strong>  DARK BROWN   </p>
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
