<div class="card mx-3 my-3" style="width: 18rem;">
    <img 
      @if ($item->usuario->fotos()->where('tipo', 'avatar')->value('ruta') == null) src="{{ asset('images/soporte/card-image.svg') }}" @else src="{{ asset( Storage::url($item->usuario->fotos()->where('tipo', 'avatar')->value('ruta')) ) }}"  @endif
      class="card-img-top mt-2" alt="sin imagen"/>
    <div class="card-body">
      <h5 class="card-title">{{$item->nombre_completo}}</h5>
      <p class="card-text">{{$item->biografia}}.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Edad: {{$item->edad}}</li>
      <li class="list-group-item">Genero: {{$item->genero->nombre}}</li>
      <li class="list-group-item">Nacionalidad: {{$item->nacionalidad->nombre}} </li>
      <li class="list-group-item">Likes: {{$item->likes}} </li>
      <li class="list-group-item">Vistas: {{$item->views}} </li>
    </ul>
    <div class="card-body">
      <a href="{{route('search.perfil', ['id'=>$item->id])}}" class="card-link">Ver +</a>
    </div>
  </div>