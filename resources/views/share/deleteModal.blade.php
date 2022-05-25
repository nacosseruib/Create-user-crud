<div class="modal fade" id="{{isset($modalName) ? $modalName : ''}}" tabindex="-1" aria-labelledby="{{isset($modalName) ? $modalName : ''}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{ Route('destroy') }}" method="post">
              @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="delete-show-title">{{isset($title) ? $title : 'Title'}}</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="row">
                  <div class="col-md-12 p-2">
                      <div class="text-center delete-message">{{ isset($message) ? $message : 'Delete record?' }}</div>
                  </div>
              </div>

        </div>
        <div align="right" class="modal-footer- p-2 pt-3">

            <input type="hidden" name="user_id" id="deleteRrecordID" />

            <button type="submit" class="btn btn-danger btn-sm rounded-pill"><span id="delete-button-title">Delete User</span> </button>

            <button type="button" class="btn btn-default rounded-pill" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
