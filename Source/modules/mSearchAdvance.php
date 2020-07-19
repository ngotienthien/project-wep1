
    
    <!-- bắt đầu phần tìm kiếm nâng cao -->
    <div id="timkiemnangcao">
        <div class="container">
            <div class="row mt-2">
                <div class="col-sm-12 text-center">
                    <span style="font-weight: bold;">MỘT SỐ GỢI Ý ĐỂ BẠN TÌM KIẾM SẢN PHẨM NHANH HƠN</span>
                    <hr>
                </div>
            </div>
    
            <div class="row mt-2">
                <nav class="nav" id="idhangsanxuat">
                    <span class="nav-link">HÃNG SẢN XUẤT: </span>
                    <?php
                        $sql = "SELECT * from hangsanxuat where BiXoa = 0";
                        $run = DataProvider::ExecuteQuery($sql);
                        while ($row = mysqli_fetch_array($run)) {
                            ?>
                            <a class="nav-link img-fluid <?php if(isset($_GET['idMaHangSanXuat']) && $_GET['idMaHangSanXuat'] == $row["MaHangSanXuat"]) echo "highlight"; ?>" style="width: 100px; height: 40px;" 
                            href="index.php?a=8<?php                                
                                                    if(isset($_GET['idMaHangSanXuat']) && $_GET['idMaHangSanXuat'] == $row["MaHangSanXuat"])
                                                        $str = "";
                                                    else
                                                        $str = "&idMaHangSanXuat=".$row["MaHangSanXuat"];
                                                    if(isset($_GET['idLoai']))
                                                        $str = $str."&idLoai=".$_GET['idLoai'];
                                                    if(isset($_GET['Min']) && isset($_GET['Max']))
                                                        $str = $str."&Min=".$_GET['Min']."&Max=".$_GET['Max'];
                                                    echo $str;  ?>">
                                <img style="margin: auto;"  src="img/<?php echo $row["LogoURL"] ?>" alt="manufacture">
                            </a>
                        <?php } ?>
                </nav>
            </div>
    
            <div class="row mt-2">
                <nav class="nav danhsachgia">
                    <span class="nav-link">MỨC GIÁ : </span>
                    <?php
                        $i = 1;
                        while ($i < 5)
                        {
                    ?>
                        <a class="nav-link <?php if(isset($_GET['Min']) && $_GET['Min'] == $i*10) echo "highlight"; else echo "danhsachgiaa";?>" href="index.php?a=8<?php 
                                                                                                if(isset($_GET['Min']) && $_GET['Min'] == $i*10)
                                                                                                    $str = "";
                                                                                                else
                                                                                                    $str = "&Min=".($i*10)."&Max=".($i+1)*10;

                                                                                                if(isset($_GET['idMaHangSanXuat']))
                                                                                                    $str = $str."&idMaHangSanXuat=".$_GET['idMaHangSanXuat'];
                                                                                                if(isset($_GET['idLoai']))
                                                                                                    $str = $str."&idLoai=".$_GET['idLoai'];
                                                                                                echo $str;
                                                                                            ?>">Từ <?php echo $i*10; ?> - <?php echo ($i+1)*10; ?> triệu</a>
                    <?php
                        $i++;
                        }
                    ?>
          
                    <a class="nav-link <?php if(isset($_GET['Min']) && $_GET['Min'] == 50) echo "highlight"; else echo "danhsachgiaa";?>" href="index.php?a=8<?php
                                                                                if(isset($_GET['Min']) && $_GET['Min'] == 50)
                                                                                    $str = "";
                                                                                else
                                                                                    $str = "&Min=50&Max=200";
                                                                                
                                                                                if(isset($_GET['idMaHangSanXuat']))
                                                                                    $str = $str."&idMaHangSanXuat=".$_GET['idMaHangSanXuat'];
                                                                                if(isset($_GET['idLoai']))
                                                                                    $str = $str."&idLoai=".$_GET['idLoai'];
                                                                                echo $str;?>">Trên 50 triệu</a>
               
            </div>
    
            <div class="row mt-2">
                <nav class="nav danhsachloaisanpham" >
                    <span class="nav-link">NHU CẦU SỬ DỤNG : </span>
                    <?php
                        $sql = "SELECT * from loaisanpham";
                        $run = DataProvider::ExecuteQuery($sql);
                        while ($row = mysqli_fetch_array($run)) {
                            ?>
                            <a class="nav-link <?php if(isset($_GET['idLoai']) && $_GET['idLoai'] == $row["MaLoaiSanPham"]) echo "highlight"; else echo " danhsachloaisanphama";?>" href="index.php?a=8<?php 
                                if(isset($_GET['idLoai']) && $_GET['idLoai'] == $row["MaLoaiSanPham"])
                                    $str = "";
                                else
                                    $str = "&idLoai=".$row["MaLoaiSanPham"];
                            
                                if(isset($_GET['idMaHangSanXuat']))
                                    $str = $str."&idMaHangSanXuat=".$_GET['idMaHangSanXuat'];
                                if(isset($_GET['Min']) && isset($_GET['Max']))
                                    $str = $str."&Min=".$_GET['Min']."&Max=".$_GET['Max'];
                                echo $str;       
                            ?>" alt="use for"><?php echo $row["TenLoaiSanPham"] ?></a>
                        <?php } ?>    
            </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
        </div>
        
        
    </div>
