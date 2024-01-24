        {{-- Buscador --}}
        <nav class="site-nav">
            <div class="site-navigation">
                <div class="d-flex justify-content-around ">
                    <div class="float-start">
                        <a href="index.html" class="logo m-0">Binary Models</a>
                    </div>
                    <div class="p-2  text-center">
                        <form id="form_search" method="POST" action="{{ route('search') }}" class="form-search">
                            @csrf
                            <input id="inpTipo" name="tipo" type="hidden" value="search"/>
           
                            <input id="inpSearch" name="search" type="text" class="form-control inp-search mb-2" placeholder="Buscar" autocomplete="off" />
                            <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                                <li class="active"><button type="submit" class="btn btn-search"> Buscar <img src="{{ asset('images/soporte/lupa.svg') }}"  class="fill-gold"  alt="sin imagen" /></button></li>
                                <li class="active"><button type="button" class="btn btn-filtrar" data-bs-toggle="modal" data-bs-target="#exampleModalFilter"> Filtrar <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" /> </button></li>
                            </ul>
                        </form>
                    </div>
                    <div class="p-2 ">
                        <ul class="js-clone-nav d-none d-lg-inline-block text-end site-menu ">
                            <li class="cta-button"><a href="{{route('login')}}">Iniciar</a></li>
                        </ul>
                    </div>
            </div>
        </nav>