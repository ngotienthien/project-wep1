<?php
    session_start();
    include "libs/DataProvider.php";

    $_SESSION["path"] = $_SERVER["REQUEST_URI"];
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/product_detail.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/footer.js" type="text/javascript"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Khoa bug store</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </head>
  <body >
      
    <?php
        include "modules/mHeader.php";
    ?>
    
    <div id="NoiDung">
            <?php
                $a = 1;

                if(isset($_GET["a"]) == true)
                    $a = $_GET["a"];


                switch($a)
                {
                    case 1:
                        include "modules/mSearchAdvance.php";
                        include "pages/pIndex.php";                      
                        break;              

                    case 4:
                        include "pages/pChiTiet.php";
                        break;

                    case 5:
                        include "pages/GioHang/pIndex.php";
                        break;
                    case 6:
                        include "pages/TaoTaiKhoan/pIndex.php";
                        break;
                    case 7:
                        include "pages/DangNhap/pDangNhap.php";
                        break;
                    case 8:
                        include "modules/mSearchAdvance.php";
                        include "pages/pTimKiemSanPhamNangCao.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>

    <?php
            include "modules/mFooter.php";
    ?>
  </body>
</html>