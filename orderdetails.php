
<?php
ob_start();
	include 'inc/header.php';
?>	
<?php
 	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
?> 
<?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['NgayDH'];     	
     	$shifted = $ct->shifted_confirm($id,$time);
     	
    }
?> 
<?php
	if(isset($_GET['del_order_id'])){
     	$id = $_GET['del_order_id'];
     	$time = $_GET['NgayDH'];
     	$SoDonDH=$_GET['SoDonDH'];
     	
     	$shifted_confirm = $ct->del_order_id($id,$time,$SoDonDH);
    }
?>    
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Order Details</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="orderdetails.php">Order Details</a></li>
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
						<thead>
							<tr>
								<th width="35%">Preview</th>
								<th width="10%">Product</th>
								<th width="10%">Price</th>
								<th width="10%">Quantity</th>
								<th width="10%">Total</th>
                                <th width="20%">&nbsp&nbsp&nbsp&nbspNgày đặt hàng</th>
								<th width="10%">&nbsp&nbspTrạng thái</th>
								<th width="10%">&nbsp&nbsp&nbsp&nbspAction</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$MSKH = Session::get('MSKH');
							$get_cart_ordered = $ct->get_cart_ordered($MSKH);
							if($get_cart_ordered){								
								$qty = 0;
								$total = 0;
								while($result = $get_cart_ordered->fetch_assoc()){									
									$total = $result['GiaDatHang'];
							?>
							<tr>
								<td>
									<img src="admin/uploads/<?php echo $result['Location']?>" width="200px" alt="">
								</td>
								<td><?php echo $result['TenHH']?></td>
								<td><?php echo $result['GiaDatHang']?></td>
								<td><?php echo $result['SoLuong']?></td>
								<td>
								<?php
									$total=$result['GiaDatHang']*$result['SoLuong'];
									echo $total;
								?>
								</td>
                                <td><?php echo $result['NgayDH'] ?></td>
                                <td>
									<?php
									if($result['TrangThai']=='0'){
										echo 'Đang chờ xác nhận';
									}elseif($result['TrangThai']==1){ 
									?>
									<span>Đang vận chuyển</span>
									
									<?php
									}elseif($result['TrangThai']==2){
										echo 'Đã nhận hàng';
									}

									 ?>


								</td>
								<?php
                                    if($result['TrangThai']=='0'){
                                    ?>
                                    <td><a href="?del_order_id=<?php echo $MSKH ?>&NgayDH=<?php echo $result['NgayDH'] ?>&SoDonDH=<?php echo $result['SoDonDH'] ?>">Hủy bỏ</a></td>
                                    <?php
                                    
                                    }elseif($result['TrangThai']=='1'){
                                    
								?>
								<td><a href="?confirmid=<?php echo $result['SoDonDH'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Xác nhận đã nhận hàng</a></td>
								<?php
                                    }else{
                                        ?>
								<td><?php echo 'Đã nhận hàng'; ?></td>
                                    <?php
                                    }	
                                    ?>
							</tr>
							<tr>
							<?php
							
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