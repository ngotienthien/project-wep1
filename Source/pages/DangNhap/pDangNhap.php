<div class="containerSU">
    <div class="row justify-content-center">
        <div class="col-sm-6">
        <form class="modal-content" action="pages/DangNhap/xlDangNhap.php" method="post" onsubmit="return KiemTra()">
            <h1>Đăng nhập tài khoản</h1>
            <hr>  
            <h2>Thông tin tài khoản</h2>
            <div class="thongtinTK">
                <div class="f-r">
                    <span>Tên đăng nhập</span> <span class="Start">*</span> <input type="text" name="txtUS" id="txtUS" /> <br>
                    <a class="err" id="eUS"></a>
                </div>
                <div class="f-r">
                    <span>Mật khẩu</span> <span class="Start">*</span> <input type="password" name="txtPS" id="txtPS"/> <br>
                    <a class="err" id="ePS"></a>
                </div > 
                </div>
                <div class="f-r">
                <div class="clearfix">
                    <button type="button" onclick="CancelEvent()" id="cancelbtn">Thoát</button>
                    <button type="submit" id="signupbtn">Đăng nhập</button>
                </div>
        </form>
        </div>
    </div>
</div>


<script type="text/javascript">   
    function CancelEvent()
    {
        location = "index.php?a=1";
    }

    function KiemTra()
    {
        var co = true;

        var control = document.getElementById('txtUS');
        var err = document.getElementById('eUS');

        if (control.value == "")
        {
            co = false;
            err.innerHTML = "*Tên đăng nhập không được được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }

        var control = document.getElementById('txtPS');
        var err = document.getElementById('ePS');

        if (control.value == "")
        {
            co = false;
            err.innerHTML = "*Mật khẩu không được rỗng";
        }
        else
        {
            err.innerHTML = "";
        }
        return co;
    }
</script>