<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aaj Tak Admin | Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="backend/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background:url('img/bg.jpg');background-size: cover;">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
	<?php
	$logo= DB::table('logo')->where('id',1)->first();?>
    <img src="uploads/logo/<?php echo $logo->logo;?>" style="width: 62%; height: 191px; margin-left: 54px;">
<br>
      <form role="form" action="{{route('verify-email')}}" method="post">
      @csrf
      <br>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="code" placeholder="Enter 6 Digit Code" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Verify</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="backend/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="backend/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/js/adminlte.min.js"></script>
</body>
</html>
