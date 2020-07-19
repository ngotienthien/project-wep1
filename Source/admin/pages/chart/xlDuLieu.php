<?php 
    include '../../../libs/DataProvider.php';
    $sql = 'SELECT TenSanPham,SoLuongBan,SoLuongXem,SoLuongTon FROM sanpham WHERE BiXoa = 0';
    $result=DataProvider::ExecuteQuery($sql);
    $data= array(array(),array(),array(),array());
    while ($row = mysqli_fetch_array($result))
    {
        array_push($data[0],$row["TenSanPham"]);
        array_push($data[1],(int)$row["SoLuongBan"]);
        array_push($data[2],(int)$row["SoLuongXem"]);
        array_push($data[3],(int)$row["SoLuongTon"]);
    }
    echo json_encode($data);
?>