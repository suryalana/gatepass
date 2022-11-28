<div class="container">
    <h2>Gatepass Report Remark</h2>

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
                                <th>Gatepass Remark</th>
                                <th>Action</th>
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
                                    <td><?php echo $value->gpremark; ?></td>
                                    <td width="8%">
                                        <!-- <span class="btn btn-primary" onclick="editEm('<?php echo $value->id; ?>')" data-toggle="modal" data-target="#myModal_edit">Edit</span> -->
                                        <span onclick="delEm('<?php echo $value->id; ?>')" class="btn btn-danger">Delete</span>
                                        <!-- <a href="<?php echo prefix_url; ?>gatepass/delEmployee/<?php echo $value->id; ?>" class="btn btn-danger">X</a> -->
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
                    url: '<?php echo prefix_url; ?>gatepass/editEmViewRemark',
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