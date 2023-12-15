<div class="d-inline-flex p-3 ">
  <div class="p-2 ">
    {{-- UpLoad carga avatar --}}
    <section id="upload_avatar">
      <form id="form_upload_avatar" class="form-login" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
        <div class="modal-body">
          <h4 class="text-gold">Upload here your picture for the avatar</h4>   
          <div class="mb-3">
              <label for="documento_archivo_avatar" class="form-label">Upload</label>
              <input type="file"  id="documento_archivo_avatar" 
                      name="documento_archivo_avatar" 
                      class="form-control form-control-sm"
                      accept=".jpg,.jpeg,.png"
                      required="true"/>
              <input type="hidden" id="accept_avatar" name="accept_file" value=".jpg,.jpeg,.png">
          </div>
        </div>
      </form>    
    </section>    

  </div>
  <div class="p-2 ">
      {{-- Imagen Avatar --}}
      <section id="section_avatar" @if ($imagen == null) class="d-none" @endif>
        <div class="img-bg text-center">
          <img id="img_avatar" @if ($imagen == null) src="{{ asset('images/soporte/upload.jpg') }}" @else src="{{ asset($imagen) }}"  @endif    alt="Image" class="img-fluid img-avatar" />
        </div>    
      </section>
  </div>
  <div class="p-2 ">
      {{-- Cehck Publicar Avatar --}}
      <section id="section_publicar_avatar" @if ($imagen == null) class="d-none" @endif>
        <div class="container">
          <div class="form-check form-switch d-inline-block text-center">
              <input class="form-check-input btn-publicar" type="checkbox" role="switch" id="checkPublicarAvatar"  @checked(old('checkPublicarAvatar', $perfil? $perfil->check_publicar_avatar: null))>
              <label class="form-check-label label-publicar" for="publicar">PUBLISH YOUR AVATAR</label>
          </div>
        </div>
      </section>
  </div>
</div>










