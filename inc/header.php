<?php
    include_once 'lib/session.php';
    Session::init();
?>
<?php

	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});

	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$cat=new category();
	$cs=new customer();
	$pd=new product();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cake - Bakery</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
		<link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<header class="main_header_area">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
						<a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cakebakery.com</a>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
						<ul class="h_search list_style">
							<li class=""><a href="cart.php"><i class="lnr lnr-cart"></i></a></li>
							<li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
							<?php
								if(isset($_GET['MSKH'])){
									$Session_Id=$ct->get_session_cart();
									$delcart_2=$ct->del_all_data_2();
									$delcart=$ct->del_all_data($Session_Id);									
									Session::destroy();	
									header("Location:index.php");							
								}
							?>
							<?php
								$login_check=Session::get('customer_login');
								if($login_check==false){
									echo '<li><a href="login.php">Log in</a></li><li><a href="register.php">Register</a></li>';
								}else{
									echo '<li>Xin Chao </li>
									<li><a href="?MSKH='.Session::get('MSKH').'">Đăng xuất</a></li>';
								}
		   					?>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="main_menu_area">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.php">
						<img src="img/logo.png" alt="">
						<img src="img/logo-2.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown submenu">
									<a class="dropdown-toggle" href="cake.php" >Our cakes</a>
									<ul class="dropdown-menu">
									<?php
									$cate = $cat->show_category();
									if($cate){
										while($result_new = $cate->fetch_assoc()){

									?>
	        		          		<li><a href="productbycat.php?MaLoaiHang=<?php echo $result_new['MaLoaiHang'] ?>"><?php echo $result_new['TenLoaiHang'] ?></a></li>
									
									<?php
										}
									} 
									?>
									</ul>
							</li>
							<li><a href="cart.php">Giỏ hàng</a></li>
							
								
							</ul>
							<ul class="navbar-nav justify-content-end">
								
								<li><a href="orderdetails.php">Lịch sử mua hàng</a></li>
								<li><a href="blog.php">Blog</a></li>
								
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
        <!--================End Main Header Area =================-->
        
	