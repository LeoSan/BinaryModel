<!-- Modal -->
<div class="modal fade" id="exampleModalFilter" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabelFilter" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gold" id="exampleModalLabelFilter">Filtros</h5>
                <a href="{{ route('home') }}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <form id="form_filter" method="POST" action="{{ route('search') }}" class="form-search" autocomplete="off"
                accept-charset="UTF-8" novalidate>
                @csrf
                <input id="inpTipo" name="tipo" type="hidden" value="filtros" />
                <div class="modal-body">
                    <h6>Audiencia</h6>
                    {{-- Grupo 1 --}}
                    <div class="row g-3">
                        <div class="col-4">
                            <label for="edad" class="form-label">Edad</label>
                            <select id="edad" name="edad" class="form-select form-select-lg">
                                <option selected value="">Edad</option>
                                @forelse ($filtros['filtro_edad'] as $item)
                                    <option value="{{ $item->edad }}">{{ $item->edad }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select id="nacionalidad" name="nacionalidad" class="form-select form-select-lg">
                                <option selected value="">Nacionalidad</option>
                                @forelse ($filtros['filtro_nacionalidad'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="genero" class="form-label">Genero</label>
                            <select id="genero" name="genero" class="form-select form-select-lg">
                                <option selected value="">Genero</option>
                                @forelse ($filtros['filtro_genero'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="likes" class="form-label">Likes</label>
                            <select id="likes" name="likes" class="form-select form-select-lg">
                                <option selected value="">Likes</option>
                                @forelse ($filtros['filtro_likes'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-4">
                            <label for="views" class="form-label">Vistas</label>
                            <select id="views" name="views" class="form-select form-select-lg">
                                <option selected value="">Vistas</option>
                                @forelse ($filtros['filtro_views'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <h6>Rasgos físicos</h6>
                    {{-- Grupo 2 --}}
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="altura" class="form-label">Altura</label>
                            <select id="altura" name="altura" class="form-select form-select-lg">
                                <option selected value="">Altura</option>
                                @forelse ($filtros['filtro_altura'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="busto" class="form-label">Busto</label>
                            <select id="busto" name="busto" class="form-select form-select-lg">
                                <option selected value="">Busto</option>
                                @forelse ($filtros['filtro_busto'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    {{-- Grupo 3 --}}
                    <div class="row g-3 my-2">
                        <div class="col-6">
                            <label for="cintura" class="form-label">Cintura</label>
                            <select id="cintura" name="cintura" class="form-select form-select-lg">
                                <option selected value="">Cintura</option>
                                @forelse ($filtros['filtro_cintura'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-6 ">
                            <label for="cadera" class="form-label">Cadera</label>
                            <select id="cadera" name="cadera" class="form-select form-select-lg">
                                <option selected value="">Cadera</option>
                                @forelse ($filtros['filtro_cadera'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    {{-- Grupo 4 --}}
                    <div class="row g-3 my-2">
                        <div class="col-12">
                            <label for="calzado" class="form-label">Calzado</label>
                            <select id="calzado" name="calzado" class="form-select form-select-lg">
                                <option selected value="">Calzado</option>
                                @forelse ($filtros['filtro_calzado'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    {{-- Grupo 5 --}}
                    <div class="row g-3 my-2">
                        <div class="col-6">
                            <label for="color_ojos" class="form-label">Color ojos</label>
                            <select id="color_ojos" name="color_ojos" class="form-select form-select-lg">
                                <option selected value="">Color ojos</option>
                                @forelse ($filtros['filtro_color_ojos'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="color_cabello" class="form-label">Color cabello</label>
                            <select id="color_cabello" name="color_cabello" class="form-select form-select-lg">
                                <option selected value="">Color cabello</option>
                                @forelse ($filtros['filtro_color_cabello'] as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty
                                    <option value="0">Sin datos</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <h6>Habilidades</h6>
                    {{-- Grupo 6 --}}
                    <div class="row g-3 my-2">
                        @forelse ($filtros['filtro_habilidades'] as $item)
                            <div class="col-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input checkbox_skill" type="checkbox"
                                        id="check_skill_{{ $item->id }}" value="{{ $item->id }}"
                                        name="check_skill_{{ $item->id }}">
                                    <label class="form-check-label"
                                        for="check_skill_{{ $item->id }}">{{ $item->nombre }}</label>
                                </div>
                            </div>
                        @empty
                            @include('components.data_not_found')
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="badgesEncontrados" class="badge rounded-pill bg-success">0 Perfiles encontrados</span>
                    <button type="submit" class="btn btn-search"> Buscar <img
                            src="{{ asset('images/soporte/lupa.svg') }}" class="fill-gold"
                            alt="sin imagen" /></button>
                    <button type="button" id="btnLimpiarFiltros" class="btn btn-search"> Limpiar <img
                            src="{{ asset('images/soporte/filtro.svg') }}" class="fill-gold"
                            alt="sin imagen" /></button>
                </div>
            </form>
        </div>
    </div>
</div>
