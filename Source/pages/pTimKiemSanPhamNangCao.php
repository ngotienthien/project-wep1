<?php
    $strQuery = "";
    if(isset($_POST["search"]) || isset($_GET["idMaHangSanXuat"]) || isset($_GET["idLoai"]) || (isset($_GET["Min"]) && isset($_GET["Max"]))) {
        
        if(isset($_GET["idMaHangSanXuat"]))
            $strQuery = "AND MaHangSanXuat =".$_GET["idMaHangSanXuat"];
        if(isset($_GET["idLoai"]))
            $strQuery = $strQuery." AND MaLoaiSanPham =".$_GET["idLoai"];
        if(isset($_POST["search"]))
            $strQuery = $strQuery." AND TenSanPham like '%".$_POST["search"]."%'";
        if(isset($_GET["Min"]) && isset($_GET["Max"]))
            $strQuery = $strQuery." AND GiaSanPham >= ".($_GET["Min"]*1000000)." AND GiaSanPham < ".($_GET['Max']*1000000);
    }
    else
        DataProvider::ChangeURL("index.php");
?>
<div class="container">
    <div class="section-detail">
    <ul class="list-item clearfix owl-carousel owl-theme" style="opacity: 1; display: block;">
        <div class="owl-wrapper-outer">
            <div class="owl-wrapper" style="left: 0px; display: block;">
            <div class="container">
            <div class="row">
            <?php 
                $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 ".$strQuery;
                $result = DataProvider::ExecuteQuery($sql);
                while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-3">
                    <li>
                        <div style="border: 1px solid #9d9d9d;">
                            <a href="index.php?a=4&id=<?php echo $row['MaSanPham'];?>" title="" class="thumb m-2">
                                <img style="margin: auto;" src="images/product/<?php echo $row['HinhURL']?>" alt="">
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