<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
$res ="delete * from flying where id = '5'";
header ('Location: airadmin.php');
?>