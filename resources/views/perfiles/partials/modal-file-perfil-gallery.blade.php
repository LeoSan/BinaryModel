<!-- Modal -->
<div class="modal fade" id="exampleModalGallery" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-gold" id="exampleModalGalleryLabel">Picture</h5>
          <a  href="{{route('vista.perfil')}}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
        </div>
        <form id="form_upload_gallery" class="form-login" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
                <h4 class="text-gold">Upload here your picture suitcase you worked</h4>   
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                  <div id="nameHelp" class="form-text">Enter the name of the photograph here..</div>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp">
                  <div id="descriptionHelp" class="form-text">Enter a brief description here..</div>
                </div>
                <div class="mb-3">
                  <label for="documento_archivo_gallery" class="form-label">Upload</label>
                  <input class="form-control form-control-sm" 
                          type="file"
                          id="documento_archivo_gallery" 
                          name="documento_archivo_gallery" 
                          class="form-control"
                          accept=".jpg,.jpeg,.png"
                          required="true" 
                          aria-describedby="fileHelp" />
                    <input type="hidden" id="accept_gallery" name="accept_gallery" value=".jpg,.jpeg,.png" />
                    <div id="fileHelp" class="form-text">Upload picture of you worked..</div>
                </div>
                <div id="listImagenes">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="registrosGalleria">
                        @forelse ($user->fotos()->where('tipo', '=', 'gallery_work')->get() as $key=> $fila )
                          <tr id="frow_{{$fila->id}}">
                            <td scope="row">{{$key +1}}</td>
                            <td>{{$fila->nombre_anexo}}</td>
                            <td>{{$fila->descripcion}}</td>
                            <td><a id="btnFotoeliminar_{{$fila->id}}" href="#" onclick="eliminaFotoGalleria(this)" data-id="{{$fila->id}}"> 
                              <svg width="15" height="21" viewBox="0 0 15 21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <defs>
                                      <path d="M12.962 2.996h-1.248a.322.322 0 0 1-.322-.322V2.11c0-.888-.722-1.61-1.61-1.61H4.79c-.888 0-1.61.722-1.61 1.61v.564a.322.322 0 0 1-.322.322H1.61c-.889 0-1.61.72-1.61 1.61v1.53c0 .178.144.322.322.322H14.25a.322.322 0 0 0 .322-.322v-1.53c0-.89-.72-1.61-1.61-1.61zm-2.858-.322a.322.322 0 0 1-.322.322H4.79a.322.322 0 0 1-.322-.322V2.11c0-.178.145-.322.322-.322h4.992c.178 0 .322.144.322.322v.564zm2.778 4.589H1.692a.322.322 0 0 0-.323.322V17.89c0 .89.721 1.61 1.61 1.61h8.615c.89 0 1.61-.72 1.61-1.61V7.585a.322.322 0 0 0-.322-.322zM4.67 17.246a.644.644 0 0 1-1.288 0v-7.97a.644.644 0 0 1 1.288 0v7.97zm3.26 0a.644.644 0 0 1-1.288 0v-7.97a.644.644 0 0 1 1.288 0v7.97zm3.26 0a.644.644 0 0 1-1.287 0v-7.97a.644.644 0 0 1 1.288 0v7.97z" id="a"/>
                                  </defs>
                                  <use fill="#D0021B" xlink:href="#a" transform="translate(0 .5)" fill-rule="evenodd"/>
                              </svg></a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4"> ¡  Data Nothing  !</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                 </div>
            </div>
            <div class="modal-footer">
              <a href="{{route('vista.perfil')}}"  class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
              <button type="submit" id="btnCargaGallery" class="btn btn-primary">Save</button>
            </div>
            @include('perfiles.partials.msg')
        </form>    
      </div>
    </div>
  </div>