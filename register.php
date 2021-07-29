<!DOCTYPE html>
<html lang="en">


<!-- auth-register.php  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <style>
    
    .success {
    color: green;
    font-size: 18px;
  }
    .error {
    color: red;
    font-size: 18px;
}
    </style>
</head>
<?php

	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$cs=new customer();

  if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['Register'])){
        
       
      $insertcustomer=$cs->insert_customer($_POST);
    }

?>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
              <?php
                if(isset($insertcustomer)){
                  echo $insertcustomer;
                }
              ?>
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Họ và tên</label>
                      <input id="frist_name" type="text" class="form-control" name="HoTenKH" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Số điện thoại</label>
                      <input id="last_name" type="text" class="form-control" name="SoDienThoai">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="Email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Địa chỉ </label>
                    <input id="email" type="text" class="form-control" name="DiaChi">
                    <div class="invalid-feedback">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="email">Công ty</label>
                    <input id="email" type="text" class="form-control" name="TenCongTy">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="PassWord">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="PasswordConfirm">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Register" name="Register" class="btn btn-primary btn-lg btn-block">
                      
                    
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-register.php  21 Nov 2019 04:05:02 GMT -->
</html>