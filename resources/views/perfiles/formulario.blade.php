@extends('layouts.app')
@section('content')

@include('perfiles.partials.tabs', ['form'=>'active', 'preView'=>'' ] )


        <div class="card bg-white">
            <div class="card-header"> Datos Generales </div>
            <form action="#" id="form_perfil_fisico" method="POST" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf

                {{-- Loading  --}}
                @include('perfiles.animations.anime-form', ['id'=>'form1_loading', 'estilos'=>'animate-pulse', 'mensaje'=>'Guardando...'] )

                <div id="form_fisico" class="card-body">
                    <div class="row mb-3 px-3">
                        <div class="form-group col-3 mt-2">
                            <label  class="form-label">Altura </label>
                            <input id="altura" name="altura"  type="number" step="any" class="form-control form-perfil" placeholder="0.00"> 
                        </div>
                        <div class="form-group col-3 mt-2">
                            <label  class="form-label">Pecho</label>
                            <input id="busto" name="busto"  type="number" step="any" class="form-control form-perfil" placeholder="0.00">
                        </div>
                        <div class="form-group col-3 mt-2">
                            <label  class="form-label">Cintura</label>
                            <input id="cintuta" name="cintura"  type="number" step="any" class="form-control form-perfil" placeholder="0.00">
                        </div>
                        <div class="form-group col-3 mt-2">
                            <label  class="form-label">Cadera</label>
                            <input id="cadera" name="cadera"  type="number" step="any" class="form-control form-perfil" placeholder="0.00">
                        </div>
                        <div class="form-group col-3 mt-3">
                            <label  class="form-label">Calzado</label>
                            <input id="calzado" name="calzado"  type="number" step="any" class="form-control form-perfil" placeholder="0.00">
                        </div>
                        <div class="form-group col-3 mt-3">
                            <label  class="form-label">Color ojos</label>
                            <input id="color_ojos" name="color_ojos"  type="text" class="form-control form-perfil" >
                        </div>
                        <div class="form-group col-3 mt-3">
                            <label  class="form-label">Color cabello</label>
                            <input id="color_cabello" name="color_cabello"  type="text" class="form-control form-perfil" >
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row  flex-sm-row flex-column"> 
                    <div class="col-12 d-flex  justify-content-end py-3 px-3">
                        <button id="btnFisico" name="btnFisico" type="submit" class="btn btn-warning">Guardar</button>
                    </div>
                </div>

                @include('perfiles.partials.msg')

            </form>
        </div>
        
        <div class="card bg-white mt-4">
            <div class="card-header"> Biografía </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-12 mt-2">
                        <label  class="form-label">Describe </label>
                        <textarea id="biografia" name="biografia" class="form-control form-perfil"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row  flex-sm-row flex-column"> 
                <div class="col-12 d-flex  justify-content-end py-3 px-3">
                    <button id="btnFisico" name="btnFisico" type="button" class="btn btn-warning">Guardar</button>
                </div>
            </div>

        </div>
    
        <div class="card bg-white mt-4">
            <div class="card-header">Como econtrarte </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Describe </label>
                        
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row  flex-sm-row flex-column"> 
                <div class="col-12 d-flex  justify-content-end py-3 px-3">
                    <button id="btnFisico" name="btnFisico" type="button" class="btn btn-warning">Guardar</button>
                </div>
            </div>

        </div>

        <div class="card bg-white mt-4">
            <div class="card-header">Portafolio fotográfico  </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Describe </label>
                        
                    </div>
                </div>
            </div>
        </div>        
        
        <div class="card bg-white mt-4">
            <div class="card-header">Experiencia </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Describe </label>
                        
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row  flex-sm-row flex-column"> 
                <div class="col-12 d-flex  justify-content-end py-3 px-3">
                    <button id="btnFisico" name="btnFisico" type="button" class="btn btn-warning">Guardar</button>
                </div>
            </div>

        </div>        
    
            

        
            
@endsection
