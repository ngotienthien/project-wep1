<div id="quanlygiohang">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class ="h1 alert alert-info" >Quản lý giỏ hàng</h1>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12">
            <div class="table-responsive">
                <table class="table text-center table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thread>
                    <tbody>
                    <?php
                        $tongGia = 0;
                        if(isset($_SESSION["GioHang"]))
                        {

                            $soSanPham = count($gioHang->listProduct);
                           
                            for($i = 0; $i < $soSanPham; $i++)
                            {
                                $id = $gioHang->listProduct[$i]->id;
                                $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$id'";

                                $result = DataProvider::ExecuteQuery($sql);
                                $row = mysqli_fetch_array($result);
                                
                                ?>

                                <form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="post">
                                    <tr>
                                        <th scope="row"><?php echo ($i + 1) ?></th>
                                        <td>
                                            <?php echo $row["TenSanPham"]; ?>
                                        </td>
                                        <td align="center">
                                            <img src="images/product/<?php echo $row["HinhURL"]; ?>" width="100">
                                        </td>
                                        <td><?php echo $row["GiaSanPham"] ?></td>
                                        <td>
                                            <input type="text" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" width="45" size="5" />
                                            <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                        </td>
                                        <td>
                                            <input class='btn btn-primary' type="submit" value="Cập nhật số lượng" /><br>
                                            <a href="pages/GioHang/xlCapNhatGioHang.php?sl=0&id=<?php echo $gioHang->listProduct[$i]->id; ?>" class="btn btn-secondary mt-1">Xóa khỏi giở hàng</a>
                                        </td>
                                    </tr>
                                </form>
                                <?php 
                                $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
                            }
                        }
                        $_SESSION["TongGia"] = $tongGia;
                        ?>
                </tbody>
            </table>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h5 class="h5 alert alert-dark" style="color: white; background: #343a40;">Tổng thành tiền: <?php echo $tongGia; ?> đ</h5>
            </div>
       </div>

       <div class="row mb-3">
            <div class="col-md-12 text-center">
                <a class="btn btn-success" href="pages/GioHang/xlDatHang.php">
                    Đặt hàng
                </a>
            </div>
       </div>
        
    </div>
    
</div>