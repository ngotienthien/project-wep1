<?php
    session_start();
    session_destroy();

    include "../libs/DataProvider.php";
    DataProvider::ChangeURL("../index.php");
?>