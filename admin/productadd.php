<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../classes/category.php';
    include '../classes/product.php';
?>

<?php
    $pd= new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
       

        $insertProduct=$pd->insert_product($_POST,$_FILES);
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
                    <h4>Thêm sản phẩm mới</h4>
                  </div>
                  <?php
                if(isset($insertProduct)){
                  echo $insertProduct;
                }
              ?>
                  <div class="card-body">
                    <div class="form-group">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <label>Tên bánh</label>
                      <input type="text" name="TenHH" class="form-control" placeholder="Nhập tên bánh...">
                    </div>
                    <div class="form-group">
                      <label>Loại bánh</label>
                      <select class="form-control" name="MaLoaiHang">
                      <?php 
                            $cat= new category();
                            $catlist= $cat->show_category();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){                           
                        ?>
                            <option value="<?php echo $result['MaLoaiHang'] ?>" name="<?php echo $result['MaLoaiHang'] ?> "><?php echo $result['TenLoaiHang'] ?></option>
                            
                            <?php
                                }
                            }
                            ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Quy cách</label>
                      <textarea class="form-control" name="QuyCach"></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label>Upload Image</label>
                      <input type="file" name="Location" class="form-control">
                    </div>
                    
                    <div class="form-group">
                      <label>Giá</label>
                      <input type="tel" name="Gia" class="form-control" placeholder="Nhập giá bánh...">
                    </div>
                    
                    <div class="form-group">
                      <label>Số lượng</label>
                      <input type="tel" name="SoLuongHang" class="form-control" placeholder="Nhập số lượng bánh...">
                    </div>
                    <div class="form-group">
                      <label>Ghi chú</label>
                      <textarea class="form-control" name="GhiChu"></textarea>
                    </div>
                
                  </div>
                  <div class="card-footer text-right">
                    <input class="btn btn-primary mr-1" type="submit" name="submit" value="Submit"/>
                    <input class="btn btn-secondary" type="reset" name="submit" value="Reset"/>
                  </div>
                </div>
                </form>
                
                
                
                
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