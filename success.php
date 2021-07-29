<?php
	include 'inc/header.php';
	
	
	

?>
<?php  
  	$MSKH=Session::get('MSKH');  	 
?>

        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Chekout</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="checkout.php">Chekout</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Billing Details Area =================-->    
        <section class="billing_details_area p_100">
            <div class="container">
                <div class="return_option">
                	<h4>
					<?php
					    {
							echo "<span class='success'>Đặt hàng thành công. Vui lòng kiểm tra trạng thái đơn hàng tại đây
							<a href='orderdetails.php'>Click here</a></span>";
						}
					?>						
					</h4>
                </div>
                <div class="row">
                	<div class="col-lg-7">
               	    	<div class="main_title">
               	    		<h2>Billing Details</h2>
               	    	</div>
						   <?php
							$MSKH=Session::get('MSKH');
							$get_customer=$cs->show_customers($MSKH);
							if($get_customer){
								while($result1=$get_customer->fetch_assoc()){

    						?>
                		<div class="billing_form_area">
                			<form class="billing_form row" action="" method="post" id="contactForm" novalidate="novalidate">
								<div class="form-group col-md-12">
								    <label for="fullname">Full Name *</label>
									<input type="text" class="form-control" id="fullname" value="<?php echo $result1['HoTenKH']?>" name="HoTenKH" placeholder="Full Name">
								</div>								
								<div class="form-group col-md-12">
								    <label for="company">Company Name</label>
									<input type="text" class="form-control" id="company" value="<?php echo $result1['TenCongTy']?>" name="TenCongTy" placeholder="Company Name">
								</div>
								<div class="form-group col-md-12">
								    <label for="address">Address *</label>
									<input type="text" class="form-control" id="address" value="<?php echo $result1['DiaChi']?>" name="DiaChi" placeholder="Street Address">
								</div>
								
								<div class="form-group col-md-6">
								    <label for="state1">State / Country *</label>
									<select class="form-control" id="state1">
                                        <option data-display="VietNam">VietNam</option>                                        
                                    </select>
								</div>
								<div class="form-group col-md-6">
								    <label for="zip">Postcode / Zip *</label>
									<input type="text" class="form-control" value="6666-9999"id="zip" name="zip" placeholder="Postcode / Zip">
								</div>
								<div class="form-group col-md-6">
								    <label for="email">Email Address *</label>
									<input type="email" class="form-control" id="email" value="<?php echo $result1['Email']?>" name="Email" placeholder="Email Address">
								</div>
								<div class="form-group col-md-6">
								    <label for="phone">Phone *</label>
									<input type="text" class="form-control" id="phone" value="<?php echo $result1['SoDienThoai']?>" name="SoDienThoai"  placeholder="Select an option">
								</div>
								
								<div class="select_check2 col-md-12">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Ship to a different address?</label>
										<div class="check"></div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="phone">Order Notes</label>
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Note about your order. e.g. special note for delivery"></textarea>
								</div>
								<div class="payment_list">
								<input type="submit" name="save" value="Save" class="btn pest_btn" />
								<?php
									if(isset($updatecustomer)){
										echo "<span class='success'>".$updatecustomer.'</span>';
									}
								?>
								</div>
							</form>
							<?php
								}
							}
							?>
                		</div>
                	</div>
                	<div class="col-lg-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Your Order</h2>
                			</div>
							
							<div class="payment_list">
									<?php
									$get_product_cart=$ct->get_product_cart_2($MSKH);
									if($get_product_cart){										
										$subtotal=0;										
										while($result = $get_product_cart->fetch_assoc()){
											$total=$result['Gia']*$result['SoLuong'];
											$subtotal+=$total;								
									?>
								<div class="price_single_cost">									
									<h5>Product<span>Total</span></h5>
									<h5>
									<?php echo $result['TenHH']." x ".$result['SoLuong']?><span><?php echo $total." VND" ?></span></h5>
									<?php
							
						 }
						}
							?>
									<h4>Subtotal <span><?php echo $subtotal." VND"; $subtotal+=10000; ?></span></h4>
									<h5>Shipping And Handling<span class="text_f">10000 VND</span></h5>
									<h3>Total <span><?php echo $subtotal." VND" ?></span></h3>
								</div>
								
								
								<div id="accordion" class="accordion_area">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Direct Bank Transfer
												</button>
											</h5>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Check Payment
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Paypal
												<img src="img/checkout-card.png" alt="">
												</button>
												<a href="#">What is PayPal?</a>
											</h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
								</div>
								<center><a href="?MSHH=MSHH" class="btn pest_btn">Place Order</a></center>
								
							</div>
						</div>
                	</div>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->   
        
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