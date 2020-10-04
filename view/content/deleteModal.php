
<!-- Modal -->
<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Data</h4>
      </div>
      <div class="modal-body">
        <p>Yakin hapus data?</p>
      </div>
      <div class="modal-footer">
        <input type="text" style="display:none" id="hiddenUID"/>
        <button id="deleteBtn" type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="delz()">Delete</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="">Cancel</button>
      </div>
    </div>

  </div>
</div>