<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top w-100">
  <a class="navbar-brand" style="color:#6f42c1;" href="index.php">KHOA BUG STORE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100 justify-content-between">
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=1">Biểu đồ</a>
      </li>
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=2">Quản lý tài khoản</a>
      </li>
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=3">Quản lý sản phẩm</a>
      </li>
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=4">Quản lý loại sản phẩm</a>
      </li>
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=5">Quản lý hãng sản xuất</a>
      </li>
      <li class="nav-item pl-1">
        <a class="nav-link" href="index.php?c=6">Quản lý đơn đặt hàng</a>
      </li>
      <li class="nav-item pl-1" >
        <a class="nav-link " href="index.php?c=7"><span style="font-size: 14px; text-align: center;"><?php 
                                        if (strlen($_SESSION["TenHienThi"]) <= 10)
                                            echo $_SESSION["TenHienThi"];
                                        else
                                            echo substr($_SESSION["TenHienThi"], 0, 10)."..." ;
                                    
                                    ?></span></a>
      </li>
      <li class="nav-item pl-1 float-right">
        <a class="nav-link btn btn-outline-danger" href="../modules/xlDangXuat.php">Đăng xuất</a>
      </li>
      
    </ul>
  </div>
</nav>
