<?php
    $dpHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword ='';
    $dbName = 'anodra';
    $conn = mysqli_connect($dpHost,$dbUsername,$dbPassword,$dbName);
    if(!$conn){
        die("Ma'lumotlar ba'zasi bilan ulanishda xatolik!");
    }
?>