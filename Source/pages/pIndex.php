
<!-- bắt đầu phần danh sách san phẩm -->
<div id="danhsachsanpham">
            <div class="container">
              
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">TẤT CẢ SẢN PHẨM</a>
                            <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile" aria-selected="false">SẢN PHẨM MỚI NHẤT</a>
                            <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="false">SẢN PHẨM BÁN CHẠY NHẤT</a>
                          
                        </div>
                      </nav>
                      <div class="tab-content mt-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <?php
                                include "pages/pTatCaSanPham.php";
                            ?>
                                
                            
                        </div>
                        <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                
                            <?php
                                    include "pages/pSanPhamMoi.php";
                            ?>
                        </div>
                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                
                            <?php
                                include "pages/pSanPhamBanChay.php";
                            ?>  
                        </div>

            </div>
        </div>

        <div class="footer mt-2">
            <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">             

    <!-- kết thúc danh sách san phẩm -->