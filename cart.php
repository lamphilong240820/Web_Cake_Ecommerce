
<?php
ob_start();
	include 'inc/header.php';
	// include 'inc/slider.php';
	

?>	
<?php
if(isset($_GET['MSHH']) ){
        $login_check = Session::get('customer_login'); 
	if($login_check==""){
		header("Location:login.php");
	}
	else{
        $MSHH=$_GET['MSHH'];
   		$SoLuong=1;
        $AddtoCart=$ct->add_to_cart($SoLuong,$MSHH);     
        
   }
}
?>

<?php
if(isset($_GET['SoDonDH']) ){
        
        
   
        $SoDonDH=$_GET['SoDonDH'];
        
        $del_product_cart=$ct->del_product_cart($SoDonDH);
   }
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])){
        
       	$SoDonDH=$_POST['SoDonDH'];
     	$SoLuong=$_POST['SoLuong'];
        $update_quantity_cart=$ct->update_quantity_cart($SoLuong,$SoDonDH);
		
        if($SoLuong<=0){
        	$del_product_cart=$ct->del_product_cart($SoDonDH);

        }
    }
?>

<?php
if(!isset($_GET['MSHH']) ){
        echo "<meta http-equiv='refresh' content='0;URL=?MSHH=live'>";
        
   }
?>  
<?php
	if(isset($_GET['MSKH']) ){
        
        $MSKH=$_GET['MSKH'];        
   }
   else{
   		$MSKH=0;
   }
?>
<?php 


  
     if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $login_check = Session::get('customer_login'); 
		if($login_check==false){
		header('Location:login.php');
		}else{

        $id=$_GET['MSHH'];
    
       
     	$SoLuong=1;
        $AddtoCart=$ct->add_to_cart($SoLuong,$id);
    }
    }

?>     
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="cart.php">Cart</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
				<div class="table-responsive">
					<table class="table">
					<?php
			    	if(isset($update_quantity_cart)){
			    		echo $update_quantity_cart;
			    	}
			    	?>
			    	<?php
			    	if(isset($del_product_cart)){
			    		echo $del_product_cart;
			    	}
			    	?>
						<thead>
							<tr>
								<th scope="col">Preview</th>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col">&nbsp&nbsp&nbsp&nbspAction</th>
							</tr>
						</thead>
						<tbody>
						<?php

						$get_product_cart=$ct->get_product_cart($MSKH);
						if($get_product_cart){
							$subtotal=0;
							$SoLuong=0;
							while($result = $get_product_cart->fetch_assoc()){

						?>
							<tr>
								<td>
									<img src="admin/uploads/<?php echo $result['Location']?>" width="200px" alt="">
								</td>
								<td><?php echo $result['TenHH']?></td>
								<td><?php echo $result['Gia']?></td>
								<td>
								<form action="" method="post">
										<input type="hidden" name="SoDonDH" value="<?php echo $result['SoDonDH']?>"/>

										<input type="number" class="product_quantity" name="SoLuong" min="0" value="<?php echo $result['SoLuong']?>"/>
										<input type="submit" name="submit" value="Update"/>
								</form>																
								</td>
								<td>
								<?php
									$total=$result['Gia']*$result['SoLuong'];
									echo $total;
								?>
								</td>
								<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="?SoDonDH=<?php echo $result['SoDonDH']?>">Xóa</a></td>
							</tr>
							<tr>
							<?php
							$subtotal+=$total;
							$SoLuong+=$result['SoLuong'];
						}
						}
							?>
								<td></td>
								<td></td>
								<td></td>	
								<td></td>
								<td></td>
								<td></td>
															
							</tr>
						</tbody>
					</table>
				</div>
       			<div class="row cart_total_inner">
        			<div class="col-lg-7">
						
						
					</div>
        			<div class="col-lg-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total
        					</div>
							<?php
								$check_cart=$ct->check_cart();
								if(isset($subtotal)){
									
								 
								 ?>
        					<div class="sub_total">
        						<h5>Sub Total <span>
								<?php  
								echo $subtotal." VND";
								Session::set("SL",$SoLuong);
								?>
								</span></h5>
        					</div>
        					<div class="total">
        						<h4>Total <span>
								<?php 
								$gtotal=1.1*$subtotal;
								Session::set("sum",$gtotal);
								 echo $gtotal." VND"
								?>  
								</span></h4>
								<?php
					}else{
						echo "<span class='error'>Giỏ hàng của bạn trống! Hãy chọn mua hàng</span>";					
					}
					?>
        					</div>
        					<div class="cart_footer">
								<a href="index.php"> <img src="img/shop.png" width="50%"; alt="" /></a>
        						<a class="pest_btn" href="checkout.php">Proceed to Checkout</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->
        
        <!--================Newsletter Area =================-->
        <section class="newsletter_area">
        	<div class="container">
        		<div class="row newsletter_inner">
        			<div class="col-lg-6">
        				<div class="news_left_text">
        					<h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="newsletter_form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your email address">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Newsletter Area =================-->
        
        <?php 
	include 'inc/footer.php';
	 
?>
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>