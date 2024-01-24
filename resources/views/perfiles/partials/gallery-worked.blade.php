<section id="gallery-list" class="galeria-example-uno">
    <div class="text-center pt-5">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam amet minus deserunt ipsa odio placeat, esse earum commodi nulla totam iusto sapiente blanditiis delectus dolorum quisquam ex ullam qui assumenda?</p>
    </div>
    <div class="row" id="galeria" data-tipogaleria='gallery-list'>
      @forelse ($user->fotos()->where('tipo', '=', 'gallery_work')->get() as $key=> $fila )
        <div id="row_filas_{{$fila->id}}" class="col-lg-4 col-md-6 col-sm-12 gallery__item" >
            <img src="{{ Storage::url($fila->ruta)}}" alt="{{$fila->nombre_anexo}}">
            <div class="gallery__title"> <p>{{$fila->descripcion}}</p></div>
        </div>
      @empty
        @include('components.data_not_found')
    @endforelse
    </div>
</section>