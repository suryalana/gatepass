<div class="container">
  <h2>Data Employee Gatepass</h2>
 
  <hr>

  <body>
    <div class="container">
      <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-body">
          <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
            <thead>
              <tr>
                <th>No</th>
                <th>Date</th>
                <th>Exit Time</th>
                <th>Entry Time</th>
                <th>Nik</th>
                <th>Name</th>
                <th>Department</th>
                <th>Reason</th>
                <th>Gatepass Remark</th>
                <th>Action</th>
                <th>Approve</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($list as $value) : ?>
                <tr id="id_em_view<?php echo $value->id; ?>">
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $value->date; ?></td>
                  <td><?php echo $value->timeout; ?></td>
                  <td><?php echo $value->timein; ?></td>
                  <td><?php echo $value->nik; ?></td>
                  <td><?php echo $value->name; ?></td>
                  <td><?php echo $value->department; ?></td>
                  <td><?php echo $value->reason; ?></td>
                  <td><?php echo $value->gpremark; ?></td>
                  <?php if ($this->session->userdata('ex_level') == '1' || $this->session->userdata('ex_level') == '2') : ?>
                    <td width="14%">
                      <span class="btn btn-primary" onclick="editEm('<?php echo $value->id; ?>')" data-toggle="modal" data-target="#myModal_edit">Edit</span>
                      <span onclick="delEm('<?php echo $value->id; ?>')" class="btn btn-danger">Delete</span>
                      <!-- <a href="<?php echo prefix_url; ?>gatepass/delEmployee/<?php echo $value->id; ?>" class="btn btn-danger">X</a> -->
                    </td>
                    <td width="10%">
                      <span onclick="appr('<?php echo $value->id; ?>')" class="btn btn-success">V</span>
                      <span onclick="appr('<?php echo $value->id; ?>')" class="btn btn-danger">X</span>
                    </td>
                  <?php endif; ?>

                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script>
      function delEm(id) {
        if (confirm('Are you sure to delete')) {
          $.ajax({
            url: '<?php echo prefix_url; ?>gatepass/delEmployee/' + id,
            success: function(data) {
              $('#id_em_view' + id).hide();
            }
          });
        }

      }

      function editEm(id) {
        $.ajax({
          url: '<?php echo prefix_url; ?>gatepass/editEmView',
          method: 'post',
          data: {
            id: id
          },
          dataType: 'html',
          success: function(data) {
            $("#body-edit").html(data);
          }
        });
      }

      function appr(id) {
        $.ajax({
          url: '<?php echo prefix_url; ?>gatepass/editEmView',
          method: 'post',
          data: {
            id: id
          },
          dataType: 'html',
          success: function(data) {
            $("#body-edit").html(data);
          }
        });
      }
    </script>
  </body>

</div>


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

        <form action="<?php echo prefix_url; ?>app/addEmployee" method="POST">
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

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email">
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