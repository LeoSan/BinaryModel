<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-gold" id="exampleModalLabel">Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <h4 class="text-gold">Upload here your picture with good profile</h4>   
          <div class="input-group mb-3">
              <label class="form-label m-0" for="file">Upload</label>
          </br>
              <input type="file"  id="file" 
                    name="documento_archivo_file" class=""
                    accept=".jpg,.jpeg,.png"
                    required="true"/>
              <input type="hidden" id="accept_file" name="accept_file" value=".jpg,.jpeg,.png">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>