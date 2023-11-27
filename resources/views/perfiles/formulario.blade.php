@extends('layouts.app')
@section('content')

@include('perfiles.partials.tabs', ['form'=>'active', 'preView'=>'' ] )

    <form action="#" id="form_registro_formulario" method="POST" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
        <div class="card bg-white">
            <div class="card-header"> Datos Generales </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Altura </label>
                    </div>
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Pecho</label>
                    </div>
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Cintura</label>
                    </div>
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Cadera</label>
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <label  class="form-label">Calzado</label>
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <label  class="form-label">Color ojos</label>
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <label  class="form-label">Color cabello</label>
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
            <div class="card-header"> Biografía </div>
            <div class="card-body">
                <div class="row mb-3 px-3">
                    <div class="form-group col-md-4 mt-2">
                        <label  class="form-label">Describe </label>
                        <textarea class="form-control" id="biografia" name="biografia"></textarea>
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
    
    </form>        

        
            
@endsection
