<div class="card mx-3 my-3" style="width: 18rem;">
    <img src="{{ asset('images/soporte/card-image.svg') }}" class="card-img-top" alt="sin imagen">
    <div class="card-body">
      <h5 class="card-title">{{$item->nombre_completo}}</h5>
      <p class="card-text">{{$item->biografia}}.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">An item</li>
      <li class="list-group-item">A second item</li>
      <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>
  </div>