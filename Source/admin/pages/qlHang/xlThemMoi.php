<?php 
    include "../../../libs/DataProvider.php";
    if(isset($_POST["txtTen"]))
    {
        $ten = $_POST["txtTen"];
        $logoURL;
        if(isset($_FILES['fHinh'])){
            $logoURL = $_FILES['fHinh']['name'];
        }
        move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../../img/".$_FILES["fHinh"]["name"]);
        $sql = "INSERT INTO hangsanxuat(TenHangSanXuat,LogoURL,BiXoa) VALUES('$ten','$logoURL',0)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>
