
<?php include 'modules/searchIcon.php' ?>

<a href="index.php?a=3&c=5" class="btn btn-outline-primary mb-5" >Thêm mới hãng sản xuất</a>
<div class="table-responsive">
<table class="w-50 mx-auto table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>STT</th>
        <th>Tên hãng sản xuất</th>
        <th>Logo</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
       if(isset($_POST["txtInfo"]) && $_POST["txtInfo"] !="")
       {
         $info = "%".$_POST["txtInfo"]."%";
         $sql = "SELECT h.MaHangSanXuat, h.TenHangSanXuat, h.BiXoa FROM hangsanxuat h WHERE h.TenHangSanXuat like '$info' ";
       }
       else
       {
        $sql = "SELECT h.MaHangSanXuat, h.TenHangSanXuat, h.LogoURL , h.BiXoa FROM hangsanxuat h";
       }
        $result = DataProvider::ExecuteQuery($sql);
        $i =1;
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row["TenHangSanXuat"] ?></td>
                    <td>
                            <img src="../img/<?php echo $row["LogoURL"]; ?>" >
                    </td>
                    <td>
                        <?php 
                            if($row["BiXoa"] == 1)
                                echo "<img src='images/lock.png' >";
                            else
                                echo "<img src='images/use.png' >";
                                                        
                        ?>
                    </td>
                    
                    <td>
                        <a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"]; ?>">
                            <img src="images/delete.png" >
                        </a>
                        <a href="index.php?a=2&id=<?php echo $row["MaHangSanXuat"]; ?>&c=5">
                            <img src="images/edit.png" >
                        </a>
                    </td>
                </tr>
            <?php
        }
      ?>
    </tbody>
  </table></div>