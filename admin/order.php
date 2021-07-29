<?php
    include 'inc/header.php';
    include 'inc/sidebar.php';    
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php
    $ct = new cart();
    if(isset($_GET['shiftid'])){
        $id = $_GET['shiftid'];
        $time = $_GET['NgayDH'];     	
        $shifted = $ct->shifted($id,$time);
    }

    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $time = $_GET['NgayDH'];
        
        $del_shifted = $ct->del_shifted($id,$time);
    }
?>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Danh sách đơn đặt hàng</h4>
                  </div>
                  <?php
                     if(isset($shifted)){
                        echo $shifted;
                    }
    
                    ?>  
                    <?php 
                    if(isset($del_shifted)){
                        echo $del_shifted;
                    }
                    
        		      ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Khách hàng</th>
                            <th>Tên bánh</th>
                            <th>Loại bánh</th>
                            <th>Hình ảnh</th>                            
                            <th>Giá</th>
                            <th>SL</th>
                            <th>Ghi Chú</th>  
                            <th>Ngày đặt hàng</th>                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
				<?php
				
                    $ct = new cart();
                    $fm = new Format();
                    $get_inbox_cart = $ct->get_inbox_cart();
                    if($get_inbox_cart){
                        $i = 0;
                        while($result = $get_inbox_cart->fetch_assoc()){
                            $i++;
				 ?>
				<tr class="odd gradeX">
        <td><?php echo $result['HoTenKH']?></td>
					
                    <td><?php echo $result['TenHH']?></td>
					<td><?php echo $result['TenLoaiHang']?></td>
                    <td><img src="uploads/<?php echo $result['Location']?>" width="80"></td>	
                    <td><?php echo $result['Gia']?></td>
                    <td><?php echo $result['SoLuongHang']?></td>
                    <td><?php echo $fm->textShorten($result['GhiChu'],50)?></td>
                    <td><?php echo $result['NgayDH'] ?></td>		
                    
                    <td>
							<?php 
							if($result['TrangThai']==0){
							?>

								<a href="?shiftid=<?php echo $result['SoDonDH'] ?>&GiaDatHang=<?php echo $result['GiaDatHang'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Đang chờ xử lí</a>

								<?php
							}if($result['TrangThai']==1){
								?>
								<?php
								echo 'Đang vận chuyển...';
								?>
							<?php
							}if($result['TrangThai']==2){
							?>

							<a href="?delid=<?php echo $result['SoDonDH'] ?>&GiaDatHang=<?php echo $result['GiaDatHang'] ?>&NgayDH=<?php echo $result['NgayDH'] ?>">Đã giao</a>

							<?php
								}if ($result['TrangThai']==3) {
									echo 'Đã bán';
								}
							
							?>
						</td>
                </tr>
                        <?php 
                                    }
                                    }
                        ?>
			</tbody>
		</table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include 'inc/footer.php';?>
</div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- export-table.html  21 Nov 2019 03:56:01 GMT -->
</html>