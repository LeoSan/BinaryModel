<section id="gallery-grid">
  <div class="text-center pt-5">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam amet minus deserunt ipsa odio placeat, esse earum commodi nulla totam iusto sapiente blanditiis delectus dolorum quisquam ex ullam qui assumenda?</p>
  </div>
  <div class="gallery-container" id="galeria" data-tipogaleria='gallery-grid'>
    @forelse ($user->fotos()->where('tipo', '=', 'gallery_work')->get() as $key=> $fila )
      <div class="gallery__item">
        <img src="{{ Storage::url($fila->ruta)}}" alt="{{$fila->nombre_anexo}}" class="gallery__img">
        <h2 class="gallery__title"> {{$fila->nombre_anexo}}</h2>
      </div>
    @empty
      <p class="text-center pt-5">¡  Data Nothing  !</p> 
    @endforelse
  </div>
</section>