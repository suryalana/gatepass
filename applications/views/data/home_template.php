

<div class="container">
  <h2>Data Employee</h2>
  <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add</span>
  <hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Name</th>
        <th>Dept</th>
        <th>Position</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach($list as $value): ?>
      <tr id="id_em_view<?php echo $value->id; ?>">
        <td><?php echo $i++ ?></td>
        <td><?php echo $value->nik; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->dept; ?></td>
        <td ><?php echo $value->jab; ?></td>
        <td width="18%">
          <span class="btn btn-primary" onclick="editEm('<?php echo $value->id; ?>')" data-toggle="modal" data-target="#myModal_edit">Edit</span>
          <span onclick="delEm('<?php echo $value->id; ?>')" class="btn btn-danger">X (AJAX)</span>
          <a href="<?php echo prefix_url;?>app/delEmployee/<?php echo $value->id; ?>" class="btn btn-danger">X</a>
        </td>

      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div>
<script>
function delEm(id){
  if(confirm('Are you sure to delete')){
    $.ajax({
     url: '<?php echo prefix_url;?>app/delEmployee/'+id,
     success: function(data) {
      $('#id_em_view'+id).hide();
    }
   });
  }

}
function editEm(id){
  $.ajax({
	 url: '<?php echo prefix_url;?>app/editEmView',
	 method: 'post',
	 data: {id: id},
	 dataType: 'html',
	 success: function(data) {
    $("#body-edit").html(data);
	}
 });
}
</script>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD </h4>
      </div>
      <div class="modal-body">

      <form action="<?php echo prefix_url;?>app/addEmployee" method="POST">
       <div class="form-group">
         <label for="email">NIK:</label>
         <input type="text" class="form-control" name="nik">
       </div>

       <div class="form-group">
         <label for="email">Name:</label>
         <input type="text" class="form-control" name="name">
       </div>

       <div class="form-group">
         <label for="email">Dept:</label>
         <input type="text" class="form-control" name="dept">
       </div>

       <div class="form-group">
         <label for="email">Position:</label>
         <input type="text" class="form-control" name="jab">
       </div>

       <button type="submit" class="btn btn-default">Submit</button>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body" id="body-edit">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
