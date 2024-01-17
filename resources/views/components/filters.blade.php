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
            <label class="form-label">Rasgos físicos</label>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Color de Ojos" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Color Cabello" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Altura" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Calzado" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Busto" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap my-2">
              <span class="input-group-text" id="addon-wrapping">
                <img src="{{ asset('images/soporte/filtro.svg') }}"  class="fill-gold"  alt="sin imagen" />
              </span>
              <input type="text" class="form-control" placeholder="Cintura" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <label class="form-label">Habilidades</label>
            <div>
              @forelse ($habilidades as $item )
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="Check_{{$item->nombre}}">
                  <label class="form-check-label" for="{{$item->nombre}}">{{$item->nombre}}</label>
                </div>
              @empty
                <p>Sin habilidades</p>
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