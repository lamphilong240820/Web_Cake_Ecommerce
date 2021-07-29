<?php 
	include 'inc/header.php';
	 include 'inc/slider.php';
?>

       
        
        <!--================Welcome Area =================-->
        <section class="welcome_bakery_area cake_feature_main p_100">
        	<div class="container">
				<div class="main_title">
					<h2>Our Featured Cakes</h2>
					<h5> Seldolor sit amet consect etur</h5>
				</div>
				<div class="cake_feature_row row">
				<?php
					$product_feathered = $pd->getproduct_feathered();
					if($product_feathered){
						while($result = $product_feathered->fetch_assoc()){

	      		?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<a href="product-details.php?MSHH=<?php echo $result['MSHH'] ?>">
								<img src="admin/uploads/<?php echo $result['Location'] ?>" alt="">
								</a>
							</div>
							<div class="cake_text">
								<h4><?php echo $fm->format_currency($result['Gia'])." "."vnd" ?></h4>
								<h3><?php echo $result['TenHH'] ?></h3>
								<a class="pest_btn" href="cart.php?MSHH=<?php echo $result['MSHH'] ?>">Add to cart</a>
								<a class="pest_btn" href="product-details.php?MSHH=<?php echo $result['MSHH'] ?>">Details</a>
							</div>
						</div>
					</div>
					<?php
					}
				}
				?>
				</div>
        	</div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Special Recipe Area =================-->
        <section class="special_recipe_area">		
        	<div class="container">			
        		<div class="special_recipe_slider owl-carousel">
				<?php
						$product_new = $pd->getproduct_new();
						if($product_new){
							while($result_new = $product_new->fetch_assoc()){
				?>
        			<div class="item">
        				<div class="media">
						
        					<div class="d-flex">
        						<img src="admin/uploads/<?php echo $result_new['Location'] ?>" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
								<h4><?php echo $result_new['TenHH'] ?> </h4>
								<h4><?php echo $result['QuyCach']?></h4>
								<p><span class="Gia"><?php echo $fm->format_currency($result_new['Gia'])." "."vnd" ?></span></p>
								<a class="w_view_btn" href="cart.php?MSHH=<?php echo $result_new['MSHH'] ?>">Add to cart</a>
        						<a class="w_view_btn" href="product-details.php?MSHH=<?php echo $result_new['MSHH'] ?>">Details</a>
        					</div>
							
        				</div>
						
        			</div>
					
        			
        			
        			<?php
							}
								}
					?>
        		</div>				
        	</div>			
        </section>
        <!--================End Special Recipe Area =================-->
        
        <!--================Our chef =================-->
        <section class="our_chef_area p_100">
        	<div class="container">
        		<div class="row our_chef_inner">
        			<div class="col-lg-3 col-6">
        				<div class="chef_text_item">
        					<div class="main_title">
								<h2>Our Chefs</h2>
								<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion.</p>
							</div>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/chef-1.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/chef-2.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        			<div class="col-lg-3 col-6">
        				<div class="chef_item">
        					<div class="chef_img">
        						<img class="img-fluid" src="img/chef/chef-3.jpg" alt="">
        						<ul class="list_style">
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        							<li><a href="#"><i class="fa fa-skype"></i></a></li>
        						</ul>
        					</div>
        					<a href="#"><h4>Michale Joe</h4></a>
        					<h5>Expert in Cake Making</h5>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Our chef Area =================-->
        
        <!--================Latest News Area =================-->
        <section class="latest_news_area p_100">
        	<div class="container">
        		<div class="main_title">
					<h2>Latest Blog</h2>
					<h5>an turn into your instructor your helper, your </h5>
				</div>
       			<div class="row latest_news_inner">
       				<div class="col-lg-4 col-md-6">
       					<div class="l_news_image">
       						<div class="l_news_img">
       							<img class="img-fluid" src="img/blog/latest-news/l-news-1.jpg" alt="">
       						</div>
       						<div class="l_news_hover">
       							<a href="#"><h5>Oct 15, 2016</h5></a>
       							<a href="#"><h4>Nanotechnology immersion along the information</h4></a>
       						</div>
       					</div>
       				</div>
       				<div class="col-lg-4 col-md-6">
       					<div class="l_news_item">
       						<div class="l_news_img">
       							<img class="img-fluid" src="img/blog/latest-news/l-news-2.jpg" alt="">
       						</div>
       						<div class="l_news_text">
       							<a href="#"><h5>Oct 15, 2016</h5></a>
       							<a href="#"><h4>Nanotechnology immersion along the information</h4></a>
       							<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
       						</div>
       					</div>
       				</div>
       				<div class="col-lg-4 col-md-6">
       					<div class="l_news_item">
       						<div class="l_news_img">
       							<img class="img-fluid" src="img/blog/latest-news/l-news-3.jpg" alt="">
       						</div>
       						<div class="l_news_text">
       							<a href="#"><h5>Oct 15, 2016</h5></a>
       							<a href="#"><h4>Nanotechnology immersion along the information</h4></a>
       							<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec odios Suspe ndisse cursus mal suada faci lisis. Lorem ipsum dolor sit ametion ....</p>
       						</div>
       					</div>
       				</div>
       			</div>
        	</div>
        </section>
        <!--================End Latest News Area =================-->
        
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
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>