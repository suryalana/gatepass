<div class="container">
    <h2>Gatepass Report</h2>
    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add form </span>
    <hr>

    <body>
        <div class="container">
            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                <div class="card-body">
                    <table class="table table-bordered">
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
                                    <td width="14%">
                                        <span class="btn btn-primary" onclick="editEm('<?php echo $value->id; ?>')" data-toggle="modal" data-target="#myModal_edit">Edit</span>
                                        <span onclick="delEm('<?php echo $value->id; ?>')" class="btn btn-danger">Delete</span>
                                        <!-- <a href="<?php echo prefix_url; ?>gatepass/delEmployee/<?php echo $value->id; ?>" class="btn btn-danger">X</a> -->
                                    </td>
                                    <td width="10%">
                                        <span onclick="appr('<?php echo $value->id; ?>')" class="btn btn-success">V</span>
                                        <span onclick="appr('<?php echo $value->id; ?>')" class="btn btn-danger">X</span>
                                    </td>

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

<body>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add form gatepass </h4>
                </div>
                <div class="modal-body">

                    <form action="<?php echo prefix_url; ?>gatepass/addEmpGatepass" method="POST">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date">
                            <small class="form-text text-danger"><?= form_error('date'); ?></small>
                        </div>
                        <table>
                            <div class="form-group">

                                <tr>
                                    <td colspan="2">Time Out</td>
                                </tr>
                                <tr>
                                    <td><input type="time" class="form-control" name="timeout" value=""></td>
                                </tr>
                            </div>
                        </table>
                        <table>
                            <div class="form-group">
                                <tr>
                                    <td colspan="2">Time In</td>
                                </tr>
                                <tr>
                                    <td><input type="time" class="form-control" name="timein" value=""></td>
                                </tr>
                            </div>
                        </table>


                        <div class="form-group">
                            <label for="email">NIK Employee:</label>
                            <input type="text" class="form-control" name="nik">
                        </div>

                        <div class="form-group">
                            <label for="email">Name Employee:</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Department:</label>
                            <input type="text" class="form-control" name="department">
                        </div>
                        <div class="form-group">
                            <label>Reason:</label>
                            <input type="text" class="form-control" name="reason">
                        </div>
                        <div class="form-group">
                            <label for="purpose">Gate Pass Remark</label>
                            <select class="form-control" id="purpose" name="gpremark" onchange="" disable_enable(this.value)>
                                <?php foreach ($list_remark as $dt) : ?>
                                    <option value="<?php echo $dt->remark; ?>"><?php echo $dt->remark; ?></option>
                                <?php endforeach; ?>

                            </select>
                            <small class="form-text text-danger"><?= form_error('purpose'); ?></small>
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
</body>