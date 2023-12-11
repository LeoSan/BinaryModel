<section id="galery-worked">

<div class="gallery-container">
 
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