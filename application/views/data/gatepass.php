<div class="container">
    <h2>Gatepass Form</h2>
    <div class="card-toolbar">
        <!--begin::Dropdown-->
        <div class="dropdown dropdown-inline mr-2">
            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Export</button>

            <button class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#myModal">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add Form</button>
            <!--begin::Dropdown Menu-->
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                <!--begin::Navigation-->
                <ul class="navi flex-column navi-hover py-2">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="la la-print"></i>
                            </span>
                            <span class="navi-text">Print</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="la la-copy"></i>
                            </span>
                            <span class="navi-text">Copy</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="la la-file-excel-o"></i>
                            </span>
                            <span class="navi-text">Excel</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="la la-file-text-o"></i>
                            </span>
                            <span class="navi-text">CSV</span>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <span class="navi-icon">
                                <i class="la la-file-pdf-o"></i>
                            </span>
                            <span class="navi-text">PDF</span>
                        </a>
                    </li>
                </ul>
                <!--end::Navigation-->
            </div>
            <!--end::Dropdown Menu-->
        </div>
    </div>
    <hr>


    <?php if ($this->session->userdata('ex_level') == '1' || $this->session->userdata('ex_level') == '2') : ?>

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
    <?php endif; ?>
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
                        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                        <input type="submit" onclick="return confirm('Are you sure?')" class="btn btn-default" />
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

    <script>
        function clicked(e) {
            if (!confirm('Are you sure?')) {
                e.preventDefault();
            }
        }
    </script>
</body>