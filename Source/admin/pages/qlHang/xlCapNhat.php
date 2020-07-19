<?php 
    include "../../../libs/DataProvider.php";

    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $ten = $_POST["txtTen"];
        if(isset($_FILES['fHinh'])){
            $logoURL = $_FILES['fHinh']['name'];
        }
        move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../../img/".$_FILES["fHinh"]["name"]);
        
        $sql = "UPDATE hangsanxuat SET TenHangSanXuat = '$ten',LogoURL='$logoURL'  WHERE MaHangSanXuat = $id";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>  