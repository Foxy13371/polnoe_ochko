<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
if (!$_POST['id']) {
    exit;
}
$res ="delete from flying where id=" . $_POST['id'];
$open->query($res);
header ('Location: airtable.php');
?>