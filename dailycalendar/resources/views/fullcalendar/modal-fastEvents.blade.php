
<div class="modal" id="modalFastEvent" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Event title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="message"></div>
      
      <form id="formFastEvent">
        <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-8">
      <input type="text" name="title"  class="form-control-plaintext" id="title">
      <input type="hidden" name="id">

    </div>
        </div>
        <div class="form-group row">
    <label for="start" class="col-sm-4 col-form-label">Start</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control time" id="start" name="start" >
    </div>
  </div>
        <div class="form-group row">
    <label for="end" class="col-sm-4 col-form-label">End</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control time" id="end" name="end">
    </div>
  </div>
        <div class="form-group row">
    <label for="color" class="col-sm-4 col-form-label">Event color</label>
    <div class="col-sm-10">
      <input type="color"  class="form-control-plaintext" id="color" name="color">
     </div>
  </div> 
       
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger deleteFastEvent" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary saveFastEvent">Save</button>
      </div>
    </div>
  </div>
</div>