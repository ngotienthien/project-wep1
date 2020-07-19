
<?php include 'modules/searchIcon.php' ?>

<a href="index.php?c=4&a=3" class="btn btn-outline-primary mb-5" >Thêm mới loại sản phẩm</a>

<div class="table-responsive">

<table class="w-50 mx-auto table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>STT</th>
        <th>Tên loại sản phẩm</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_POST["txtInfo"]) && $_POST["txtInfo"] !="")
        {
          $info = "%".$_POST["txtInfo"]."%";
          $sql = "SELECT l.MaLoaiSanPham, l.TenLoaiSanPham, l.BiXoa FROM  loaisanpham l  WHERE l.TenLoaiSanPham like '$info'";
        }
        else
        {
          $sql = "SELECT l.MaLoaiSanPham, l.TenLoaiSanPham, l.BiXoa FROM  loaisanpham l ";
        }
        $result = DataProvider::ExecuteQuery($sql);
        $i =1;
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row["TenLoaiSanPham"] ?></td>
                    <td>
                        <?php 
                            if($row["BiXoa"] == 1)
                                echo "<img src='images/lock.png' >";
                            else
                                echo "<img src='images/use.png' >";
                                                        
                        ?>
                    </td>
                    <td>
                        <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row["MaLoaiSanPham"]; ?>">
                            <img src="images/delete.png" >
                        </a>
                        <a href="index.php?c=4&a=2&id=<?php echo $row["MaLoaiSanPham"]; ?>">
                            <img src="images/edit.png" >
                        </a>
                    </td>
                </tr>
            <?php
        }
      ?>
    </tbody>
  </table>


</div>