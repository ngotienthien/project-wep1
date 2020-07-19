
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12 text-center">
        <h1 class=" h1 alert alert-danger">Error 404</h1>
        </div>
    </div>
</div>

<?php
    if(isset($_GET["id"]))
    {
        switch ($_GET["id"])
        {
            case 1:
                echo "Tên đăng nhập và mật khẩu không tồn tại";
            break;
        }
    }
?>