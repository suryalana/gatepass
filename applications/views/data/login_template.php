<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


  <div class="container">
    <h2>Login</h2>
    <p>GATEPASS LOGIN</p>

    <form action="<?php echo prefix_url; ?>login/checkLogin" method="POST">
      <div class="form-group">
        <label for="email">Username:</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd">
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>

  </div>