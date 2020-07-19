<div id="main-content-wp" class="detail-product-page">
    <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM sanpham WHERE MaSanPham = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            $catgory_id = $row["MaLoaiSanPham"];
            $manufacture_id = $row["MaHangSanXuat"];

            $sql = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat = $manufacture_id";
            $result = DataProvider::ExecuteQuery($sql);
            $manufacture_row = mysqli_fetch_array($result);
        }
        else {
            DataProvider::ChangeURL("index.php?a=404");
        }
    ?>
    <div id="wrapper" class="wp-inner clearfix mt-3">
        <div id="content" class="fl-left">
            <div class="section" id="info-product-wp">
                <div class="section-detail clearfix">
                    <div class="container">
                        <div class="row">
                    <div class="col-md-4">
                        <img src="images/product/<?php echo $row["HinhURL"];?>" data-zoom-image="images/product/<?php echo $row["HinhURL"];?>"/>
                    </div>
                    <div class="col-md-8">
                        
                        <input type="hidden" name="id" value='<?php echo $row["MaSanPham"];?>'>
                        <h3 id="product-name" style="text-align: left;"><?php echo $row["TenSanPham"];?></h3>
                        <div class="price" style="text-align: left;">
                            <span class="price-old"><?php echo number_format($row["GiaSanPham"]);?> </span>
                        </div>
                        <p id="desc-short" style="text-align: left;"><?php 
                            echo($row['MoTa']);
                        ?></p>
                        
                        <a href="index.php?a=5&id=<?php echo $row["MaSanPham"]; ?>" style="text-align: left;" title="" id="add-to-cart">Thêm vào giỏ</a>
                        <a href="pages/GioHang/xlDatHang.php?id=<?php echo $row["MaSanPham"]; ?>&gia=<?php echo $row["GiaSanPham"]; ?>" style="text-align: left;" title="" id="buy-now">Mua ngay</a><br/>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="section" id="detail-product-wp">
                <div class="section-detail">
                    <div id="tab-menu">
                        <h3>Thông số kỹ thuật</h3>
                        <div id="tab-content">
                            <pre style="white-space: pre-wrap; word-break: keep-all;"><?php echo $row["ThongSoKyThuat"];?></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="same-category">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm khác</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="left: 0px; display: block;">
                            <div class="container">
                            <div class="row">
                            <?php 
                                $sql = "SELECT * from sanpham WHERE MaLoaiSanPham = $catgory_id limit 5";
                                $result = DataProvider::ExecuteQuery($sql);
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="col-md-3">
                                    <li>
                                        <div style="border: 1px solid #9d9d9d;">
                                            <a href="index.php?a=4&id=<?php echo $row['MaSanPham'];?>" title="" class="thumb m-2">
                                                <img src="images/product/<?php echo $row['HinhURL']?>" alt="">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a style="min-height: 40px;" href="index.php?a=4&id=<?php echo $row['MaSanPham'];?>" title="" class="name-product"><?php echo $row['TenSanPham']?></a>
                                            <div class="price-wp">
                                                <span class="new"><?php echo number_format($row['GiaSanPham']); ?></span>
                                            </div>
                                            <a href="?page=add_cart&id=<?php echo $row['MaSanPham'] ?>" title="" class="buy-now">Mua ngay</a>
                                        </div>
                                    </li>
                                </div>      
                            <?php } ?>
                            </div>
                            </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
 </div>
        