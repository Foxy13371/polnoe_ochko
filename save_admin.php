<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
if (!$_GET['timeoff']) {
    echo 'GG will not((';
}
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
$query ="update  flying set number='. $numb . ', from=' . $fr . ', to=' . $t . ', date=' . $data . ', timeoff=' . $tof . ', timeon=' . $ton . ', passengers=' . $pas . ', class=' . $cl . ', bagage=' . $bag . ', price=' . $pr . '  where id=" . $_GET['id'];
header ('Location: airadmin.php');
?>