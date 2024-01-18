<!-- Modal -->
<div class="modal fade" id="exampleModalFilter" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabelFilter" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-gold" id="exampleModalLabelFilter">Filtros</h5>
          <a  href="{{route('home')}}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
        </div>
        <form id="form_filter" class="form-search" autocomplete="off" accept-charset="UTF-8" novalidate>
          <div class="modal-body">
            <label class="form-label">Audiencia</label>
            {{-- Grupo 1 --}}
            <div class="row g-3">
              <div class="col-4">
                <label for="" class="form-label">Edad</label>
                <select class="form-select form-select-lg">
                  <option selected>Edad</option>
                    @forelse ( $filtros['filtro_edad'] as $item )
                      <option value="{{$item->edad}}">{{$item->edad}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-4">
                <label for="" class="form-label" >Nacionalidad</label>
                <select class="form-select form-select-lg">
                  <option selected>Nacionalidad</option>
                    @forelse ( $filtros['filtro_nacionalidad'] as $item )
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-4">
                <label for="" class="form-label" >Genero</label>
                <select class="form-select form-select-lg">
                  <option selected>Genero</option>
                    @forelse ( $filtros['filtro_genero'] as $item )
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-4">
                <label for="" class="form-label" >Likes</label>
                <select class="form-select form-select-lg">
                  <option selected>Likes</option>
                    @forelse ( $filtros['filtro_likes'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-4">
                <label for="" class="form-label" >Vistas</label>
                <select class="form-select form-select-lg">
                  <option selected>Vistas</option>
                    @forelse ( $filtros['filtro_views'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>
            </div>


            <label class="form-label mt-3">Rasgos físicos</label>
            {{-- Grupo 2 --}}
            <div class="row g-3">
              <div class="col-6">
                <label for="" class="form-label" >Altura</label>
                <select class="form-select form-select-lg">
                  <option selected>Altura</option>
                    @forelse ( $filtros['filtro_altura'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-6">
                <label for="" class="form-label" >Busto</label>
                <select class="form-select form-select-lg">
                  <option selected>Busto</option>
                    @forelse ( $filtros['filtro_busto'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>
            </div>
            {{-- Grupo 2 --}}
            <div class="row g-3 my-2">
              <div class="col-6">
                <label for="" class="form-label" >Cintura</label>
                <select class="form-select form-select-lg">
                  <option selected>Cintura</option>
                    @forelse ( $filtros['filtro_cintura'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-6 ">
                <label for="" class="form-label" >Cadera</label>
                <select class="form-select form-select-lg">
                  <option selected>Cadera</option>
                    @forelse ( $filtros['filtro_cadera'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>
            </div>            
            {{-- Grupo 3 --}}
            <div class="row g-3 my-2">
              <div class="col-12">
                <label for="" class="form-label" >Calzado</label>
                <select class="form-select form-select-lg">
                  <option selected>Calzado</option>
                    @forelse ( $filtros['filtro_calzado'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>
            </div>            
            {{-- Grupo 4 --}}
            <div class="row g-3 my-2">
              <div class="col-6">
                <label for="" class="form-label" >Color ojos</label>
                <select class="form-select form-select-lg">
                  <option selected>Color ojos</option>
                    @forelse ( $filtros['filtro_color_ojos'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>

              <div class="col-6">
                <label for="" class="form-label" >Color cabello</label>
                <select class="form-select form-select-lg">
                  <option selected>Color cabello</option>
                    @forelse ( $filtros['filtro_color_cabello'] as $item )
                      <option value="{{$item}}">{{$item}}</option>
                    @empty
                      <option value="0">Sin datos</option>
                    @endforelse
                </select>  
              </div>
            </div>            
 

            <label class="form-label g-3 mt-3">Habilidades</label>
            {{-- Grupo 5 --}}
            <div class="row g-3 my-2">
              @forelse ( $filtros['filtro_habilidades'] as $item )
                <div class="col-4">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="Check_{{$item->nombre}}">
                    <label class="form-check-label" for="{{$item->nombre}}">{{$item->nombre}}</label>
                  </div>
                </div>
              @empty
                @include('components.data_not_found')
              @endforelse
            </div>
          </div>
          <div class="modal-footer">
            <span id="badgesEncontrados" class="badge rounded-pill bg-success">10 Perfiles encontrados</span>
            <button type="submit" class="btn btn-search"> Buscar <img src="{{ asset('images/soporte/lupa.svg') }}"  class="fill-gold"  alt="sin imagen" /></button>
            <button type="submit" class="btn btn-search"> Limpiar <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" /></button>
          </div>

        </form>    
      </div>
    </div>
  </div>