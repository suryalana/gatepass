<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table>
    <tr>
        <td>Periode </td>
        <td><?php echo $start_date; ?> - <?php echo $end_date; ?> </td>

    </tr>
</table>



  <table border="1" width="100%">
    <thead>
         <tr>
            <th>Date</th>
            <th>Exit Time</th>
            <th>Entry Time</th>
            <th>Nik</th>
            <th>Name</th>
            <th>Department</th>
            <th>Reason</th>
            <th>Gatepass Remark</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $value) : ?>
        <tr id="id_em_view<?php echo $value->id; ?>">
            <td><?php echo $value->date; ?></td>
            <td><?php echo $value->timeout; ?></td>
            <td><?php echo $value->timein; ?></td>
            <td><?php echo $value->nik; ?></td>
            <td><?php echo $value->name; ?></td>
            <td><?php echo $value->department; ?></td>
            <td><?php echo $value->reason; ?></td>
            <td><?php echo $value->gpremark; ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>