<!DOCTYPE html>
<html lang="en">

<head>
  <title>GATEPASS APPLICATION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br>
  <div class="container">
    <a href="<?php echo prefix_url; ?>Dashboard" class="btn btn-primary">DASHBOARD</a>
    <a href="<?php echo prefix_url; ?>app" class="btn btn-primary">DATA EMPLOYEE</a>
    <!-- <a href="<?php echo prefix_url; ?>gatepass" class="btn btn-primary">GATEPASS</a>
    <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
    <a href="<?php echo prefix_url; ?>gatepass/remarkhrd" class="btn btn-primary">HRD GATEPASS REPORT</a> -->

    <?php if ($level_session == '1') : ?>
      <a href="<?php echo prefix_url; ?>gatepass" class="btn btn-primary">GATEPASS</a>
      <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
      <a href="<?php echo prefix_url; ?>gatepass/remarkhrd" class="btn btn-primary">HRD GATEPASS REPORT</a>
    <?php endif; ?>

    <?php if ($level_session == '2') : ?>
      <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
    <?php endif; ?>
    <a href="<?php echo prefix_url; ?>login/logout" class="btn btn-danger">SIGN OUT</a>
  </div>
</body>