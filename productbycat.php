<?php
	include 'inc/header.php';	
?>
<?php
 if(!isset($_GET['MaLoaiHang']) || $_GET['MaLoaiHang']== NULL){
        echo "<script>window.location='404.php'</script>";
        
    }else{
        $id=$_GET['MaLoaiHang'];    }
  
?>
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cakes</h3>
        			<ul>
        				<li><a href="index.php">Home</a></li>
        				<li><a href="cake.php">Cakes</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Product Area =================-->
        <section class="product_area p_100">
        	<div class="container">
        		<div class="row product_inner_row">
        			<div class="col-lg-9">
        				<div class="row m0 product_task_bar"> 
							<div class="product_task_inner"> 
								<div class="float-left">
									<a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
									<span>Showing 1 - 10 of 55 results</span>
								</div>
                                
								<div class="float-right">
									<h4>Sort by :</h4>
									<select class="short">
										<option data-display="Default">Default</option>
										<option value="1">Default</option>
										<option value="2">Default</option>
										<option value="4">Default</option>
									</select>
								</div>
							</div>
        				</div>
        				<div class="row product_item_inner">
                       
                       
							<?php
                            $productbycat=$cat->get_product_by_cat($id);
                            if($productbycat){
                                while($result=$productbycat->fetch_assoc()){

                            
                            ?>
        					<div class="col-lg-4 col-md-4 col-6">
        						<div class="cake_feature_item">
									<div class="cake_img">
										<img src="admin/uploads/<?php echo $result['Location'] ?>" alt="">
									</div>
									<div class="cake_text">
										<h4><?php echo $fm->format_currency($result['Gia'])." "."VNĐ" ?></h4>
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
        				<div class="product_pagination">
        					<div class="left_btn">
        						<a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
        					</div>
        					<div class="middle_list">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">...</a></li>
									<li class="page-item"><a class="page-link" href="#">12</a></li>
									</ul>
								</nav>
        					</div>
        					<div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
        				</div>
        			</div>
        			<div class="col-lg-3">
        				<div class="product_left_sidebar">
							
        					<aside class="left_sidebar search_widget">
        						<div class="input-group">
                                <?php
                            $name_cat=$cat->get_name_by_cat($id);
                            if($name_cat){
                                while($result_name=$name_cat->fetch_assoc()){

                            
                            ?> <div class="p_w_title">
                            <h3>Category: <?php echo $result_name['TenLoaiHang'];?></h3>
                                </div>
                            <?php
                                }
                                }
                            ?>
									<!-- <input type="text" class="form-control" placeholder="Enter Search Keywords"> -->
									<div class="input-group-append">
										<button class="btn" type="button"><i class="icon icon-Search"></i></button>
									</div>
								</div>
        					</aside>
							<aside class="left_sidebar p_price_widget">
        						<div class="p_w_title">
        							<h3>Filter By Price</h3>
        						</div>
        						<div class="filter_price">
									<div id="slider-range"></div>
       								<label for="amount">Price range:</label>
									<input type="text" id="amount" readonly />
       								<a href="#">Filter</a>
        						</div>
        					</aside>
        					<aside class="left_sidebar p_catgories_widget">
        						<div class="p_w_title">
        							<h3>Product Categories</h3>
        						</div>
        						<ul class="list_style">
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
        					</aside>
        					
        					
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Product Area =================-->
        
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