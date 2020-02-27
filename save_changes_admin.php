<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
/*if (!$_GET['timeoff']) {
    echo 'GG will not((';
}*/
$numb = $_GET['number'];
$fr = $_GET['from'];
$t = $_GET['to'];
$data = $_GET['date'];
$tof = $_GET['timeoff'];
$ton = $_GET['timeon'];
$pas = $_GET['passengers'];
$cl = $_GET['class'];
$bag = $_GET['bagage'];
$pr = $_GET['price'];
$sql = mysqli_query($open, "insert into  flying ('number', 'from', 'to', 'date', 'timeoff', 'timeon', 'passengers', 'class', 'bagage', 'price') values ('{$numb}', '{$fr}', '{$t}', '{$data}', '{$tof}', '{$ton}', '{$pas}', '{$cl}', '{$bag}', '{$pr}' )");
/*header ('Location: airadmin.php');*/
?>