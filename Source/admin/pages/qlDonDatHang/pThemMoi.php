
<form action="pages/qlDonDatHang/xlThemMoi.php" method="post" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded ">
    <fieldset >
        <legend class="text-light bg-dark">Thêm mới đơn đặt hàng</legend>
        <div >
            <label for="txtMaKH">Mã khách hàng:</label>
            <input type="text" class="w-50 form-control" name="txtMaKH" id="txtMaKH" placeholder="Nhập mã khách hàng" >
        </div>
        <div id="CT_DDH">
            <div  class="d-flex mt-2" id="CT">
                <label for="txtMaSP">Mã sản phẩm:</label>
                <div>
                    <input type="text" class="w-100 form-control" name="txtMaSP" id="txtMaSP" placeholder="Nhập mã sản phẩm" >
                </div>
                <label class="ml-2"  for="txtSoLuong">Số lượng:</label>
                <div> <input type="text" class="w-100 form-control" name="txtSoLuong" id="txtMaSP" placeholder="Nhập số lượng sản phẩm"  >
                    </div>
                <a href="#" class="btn btn-outline-success ml-2 px-4" id="Add">+</a>
                <a href="#" class="btn btn-outline-danger ml-2 px-4" id="Del">x</a>
            </div>
        </div>
        
        <br>
        <span>Tình trạng</span>
        <div >
            <select class="w-50 custom-select custom-select-sm" name="txtTinhTrang">
                <?php 
                    $sql = "SELECT * FROM tinhtrang";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row1 = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaTinhTrang"] ?>"> 
                            <?php echo $row1["TenTinhTrang"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-primary" value="Thêm đơn đặt hàng">
        </div>
    </fieldset>
</form>


<script>
    $(document).ready(function(){
        $("#Add").click(function(){
            $("#CT").clone(true).appendTo("#CT_DDH");
        });
        $("#Del").click(function(){
            $(this).parent().remove();
        });
    });
</script>