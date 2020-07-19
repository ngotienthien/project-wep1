<?php 
    include "../../libs/DataProvider.php";
    $ran = rand(1,5);

    $sql = "SELECT * FROM captcha WHERE MaCaptcha = $ran";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $data = $row["HinhURL"];
    echo "<img src='images/Captcha/$data' />";
    
    $captchaCode = substr($data,0,5);
    echo "<p style='display:none;' id='CaptchaCode'>$captchaCode</p>";
?>