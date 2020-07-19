
<form action="pages/qlHang/xlThemMoi.php" method="POST" class="shadow p-3 mx-auto bg-white rounded was-validated w-50" enctype="multipart/form-data" >
    <fieldset>
        <legend class="text-light bg-dark">Thêm mới một hãng sản xuất</legend>
        <div>
            <span >Tên hãng sản xuất:</span>
            <input type="text" name="txtTen" id="txtTen" placeholder="Nhập tên hãng sản xuất mới" required  class=" form-control">
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên loại sản phẩm</div>
        </div>
        <span class="input-text">Logo</span>
        <div class=" custom-file">
            <input type="file" name="fHinh" class="custom-file-input-dark" >
        </div>
        <br>
        <div>
             <input type="submit" value="Thêm mới" class="btn btn-primary"> 
        </div>
    </fieldset>  
</form>