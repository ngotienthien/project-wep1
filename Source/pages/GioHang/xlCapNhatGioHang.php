<?php
    session_start();
    include "../../libs/DataProvider.php";
    include "../../libs/ShoppingCart.php";

    if(isset($_POST["txtSL"]) || isset($_GET['sl']))
    {
        if(isset($_POST["txtSL"]))
            $sl = $_POST["txtSL"];
        else
            $sl = $_GET["sl"];

        if(is_nan($sl) == false)
        {
            if(isset($_POST["txtSL"]))
                $id = $_POST["hdID"];
            else
                $id = $_GET['id'];
            $gioHang = unserialize($_SESSION["GioHang"]);

            if($sl > 0)
            {
                //xử lý cập nhật số lượng mới

                $gioHang->update($id, $sl);
                $_SESSION["GioHang"] = serialize($gioHang);
            }else
            {
                if($sl == 0)
                {
                    $gioHang->delete($id);

                    $_SESSION["GioHang"] = serialize($gioHang);
                }
            }

            DataProvider::ChangeURL("../../index.php?a=5");
        }else
        {
            //nếu số lượng mới không là số thì không sử lý đá về trang quản lý giỏ hàng
            DataProvider::ChangeURL("../../index.php?a=5");
        }
    }else
    {
        DataProvider::changeURL("../../index.php?a=404");
    }
?>