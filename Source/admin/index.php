<?php
    session_start();
    include "../libs/DataProvider.php";

    if(!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
        DataProvider::ChangeURL("../index.php");
    $c = 0;
    if(isset($_GET["c"]))
        $c = $_GET["c"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khoa Bug Store</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body >
    
        <div id="menu">
            <?php include "modules/menuBar.php" ?>
        </div>
        <div id="content"  >
        <?php 
                switch($c) 
                {
                    case 0:
                        include "pages/pIndex.php";
                        break;
                    case 1:
                        include "pages/chart/pIndex.php";
                        break;
                    case 2:
                        include "pages/qlTaiKhoan/pIndex.php";
                        break;
                    case 3:
                        include "pages/qlSanPham/pIndex.php";
                        break;
                    case 4:
                        include "pages/qlLoai/pIndex.php";
                        break;
                    case 5:
                        include "pages/qlHang/pIndex.php";
                        break;
                    case 6:
                        include "pages/qlDonDatHang/pIndex.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>
                
    <script>
</script>
</body>
</html>