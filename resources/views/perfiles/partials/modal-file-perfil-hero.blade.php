<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-gold" id="exampleModalLabel">Picture</h5>
          <a  href="{{route('vista.perfil')}}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
        </div>
        <form id="form_upload" class="form-login" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
          <div class="modal-body">
            <h4 class="text-gold">Upload here your picture with good profile</h4>   
            <div class="mb-3">
                <label for="documento_archivo_file" class="form-label">Upload</label>
                <input type="file"  id="documento_archivo_file" 
                        name="documento_archivo_file" 
                        class="form-control form-control-sm"
                        accept=".jpg,.jpeg,.png"
                        required="true"/>
                <input type="hidden" id="accept_file" name="accept_file" value=".jpg,.jpeg,.png">
            </div>
          </div>
          <div class="modal-footer">
            <a href="{{route('vista.perfil')}}"  class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
            <button type="submit" id="btnCargaHero" class="btn btn-primary">Save</button>
          </div>
          @include('perfiles.partials.msg')
        </form>    

      </div>
    </div>
  </div>