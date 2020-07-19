<div  class="containerSU" >
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form class="modal-content" style="min-height: 720px;" action="pages/TaoTaiKhoan/xlTaoTaiKhoan.php" method="post" onsubmit="return KiemTra()">
        <h1>Đăng ký tài khoản</h1>
        <hr> 
        <h2>Thông tin cá nhân</h2>
        <div class="thongtinTK">
          <div class="f-r">
            <span>Tên hiển thị</span> <span class="Start">*</span> <input type="text" name="txtTen" id="txtTen" maxlength="20" /> <br>
            <a class="err" id="eTen"></a>
          </div>
          <div class="f-r">
            <span>Số điện thoại di động</span> <input type="text" name="txtPhone" id="txtPhone"/> <br>
          </div > 
          <div class="f-r">
            <span>Email</span> <input type="text" name="txtMail" id="txtMail" /> <br> 
          </div>
          <div class="f-r">
            <span>Nơi sống hiện tại của bạn: </span>
            <?php
                $sql = "SELECT * FROM thanhpho";
                $result = DataProvider::ExecuteQuery($sql);
            ?>
            <select name="selected" id="select" style="margin-top: 10px">
              <?php
                  while ($row = mysqli_fetch_array($result))
                  {
                    ?>
                      <option value="<?php echo $row["MaThanhPho"]; ?>" ><?php echo $row["TenThanhPho"]; ?></option>
                    <?php
                  }
              ?>
            </select><br> 
          </div>
        </div>
        <div class="thongtinTK">
          <h2>Thông tin tài khoản</h2>
          <div class="f-r">
            <span>Tên đăng nhập</span> <span class="Start">*</span> <input type="text" name="txtUS" id="txtUS" maxlength="30"/> <br>
            <a class="err" id="eUS"></a>
          </div>
          <div class="f-r">
            <span>Mật khẩu</span> <span class="Start">*</span> <input type="password" name="txtPS" id="txtPS"/> <br>
            <a class="err" id="ePS"></a>
          </div > 
          <div class="f-r">
            <span>Xác nhận lại mật khẩu</span> <span class="Start">*</span> <input type="password" name="txtRPS" id="txtRPS" /> 
            <a class="err" id="eRPS"></a>
          </div>
        </div>
        <div class="KiemTra">
          <h2>Mã kiểm tra</h2>
          <a onclick="showCaptcha()"><img src="img/reload.png" width="30px" height = "30px" style="float: right; margin-top: 15px; margin-right: 250px; "/></a>
          <div id="picCaptcha" style="width: 100%; margin-left: 25px;">
            </div>
          <div class="f-r">
            <span>Nhập mã kiểm tra</span> <span class="Start">*</span> <input type="text" name="txtMaKT" id="txtMaKT"/> <br>
            <a class="err" id="eKT"></a>
          </div >   
        </div>     
        <div class="clearfix">
          <button type="button" onclick="CancelEvent()" id="cancelbtn">Thoát</button>
          <button type="submit" id="signupbtn">Đăng ký</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    var captchaCode;
    

    $(document).ready(function(){
        $("#picCaptcha").load(showCaptcha());
    });

   

    function CancelEvent()
    {
        location = "index.php?a=1";
    }

    function KiemTra()
    {
        var co = true;

        var control = document.getElementById('txtTen');
        var err = document.getElementById('eTen');

        if (control.value == "")
        {
            co = false;
            err.innerHTML = "*Tên hiển thị không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        var control = document.getElementById('txtUS');
        var err = document.getElementById('eUS');

        if (control.value == "")
        {
            co = false;
            err.innerHTML = "*Tên đăng nhập không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }
        
        control = document.getElementById('txtPS');
        err = document.getElementById('ePS');
        if (control.value == "")
        {
            co = false;
            err.innerHTML = "*Mật khẩu không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }
        
        control1 = document.getElementById('txtRPS');
        err = document.getElementById('eRPS');
        if (control.value != control1.value)
        {
            co = false;
            err.innerHTML = "*Nhập lại mật khẩu xác nhận không khớp";
        }
        else
        {
          err.innerHTML = "";
        }
        control = document.getElementById('txtMaKT');
        capt = document.getElementById('CaptchaCode');
        err = document.getElementById('eKT');
        if (control.value == "" )
        {
            co = false;
            err.innerHTML = "*Mã kiểm tra không được rỗng";
        }
        else if (control.value != capt.textContent)
        {
            co = false;
            err.innerHTML = "*Mã kiểm tra không Đúng";
        }
        else
        {
            err.innerHTML = "";
        }
        return co;
    }

      
  function showCaptcha() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("picCaptcha").innerHTML = this.responseText;
        
      }
    };
    xhttp.open("GET", "pages/TaoTaiKhoan/layHinhCaptcha.php", true);
    xhttp.send();
  }

</script>
<?php
    if (isset($_GET["err"]))
    {
        ?>
            <script type="text/javascript">
                var err = document.getElementById('eUS');
                err.innerHTML = "Tên đăng nhập đã tồn tại xin vui lòng chọn tên khác";
            </script>
        <?php
    }
    else
    {
        ?>
            <script type="text/javascript">
                var err = document.getElementById('eUS');
                err.innerHTML = "";
            </script>
        <?php
    }
?>