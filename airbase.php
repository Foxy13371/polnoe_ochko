<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
$res = $open->query('select * from flying');
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = [
        'number' => $row['number'],
        'from' => $row['from'],
        'to' => $row['to'],
        'date' => $row['date'],
        'timeoff' => $row['timeoff'],
        'timeon' => $row['timeon'],
        'passengers' => $row['passengers'],
        'class' => $row['class'],
        'bagage' => $row['bagage'],
        'price' => $row['price']
    ];
}
$num_rows = mysqli_num_rows($res);
echo '<html>
<head>
<title>Жмых-airlines</title>
<style>
body {
background-color: #ffbb29;
}
h1{
color: black;
font-size: 45px;
}
.menu{
border: none;
font-size: 30px;
}
.line{
padding-left: 20px;
}
.Tname{
font-size: 20px;
padding-left: 30px;
}
.names{
font-size: 20px;
}
 .bag {
 position: relative;
 left: 850px;
 font-size: 30px ;
 color: #ff2f1b;
 background: none;
 border: 0;
 color: black;
 }
 .bag-div{
 position: relative;
 right: 300px;
 }
</style>
</head>
<body>
<br><br><br>
<div align="center"><h1>Данные о полетах</h1></div>
<div align="center">
<table class="menu">
<tr>
<td class="line"> Сортировка</td>
<td class="line"> Фильтрация</td>
</tr>
</table>
<div align="center" class="bag-div">
<form method="post" action="airadmin.php">
<input type="submit" name="bag" id="bag" value="Админка" class="bag">
</form>
</div>
<br><br><br>';
echo '<div class="names">';
for ($i=0; $i<$num_rows; $i++){
    echo 'Номер рейса: ' . $data[$i]['number'] . ' ';
    echo 'Из ' . $data[$i]['from'] . ' ';
    echo 'в ' . $data[$i]['to'] . ' ';
    echo 'Дата: ' . $data[$i]['date'] . ' ';
    echo 'Время вылета: ' . $data[$i]['timeoff'] . ' ';
    echo 'Время прибытия: ' . $data[$i]['timeon'] . ' ';
    echo 'Количество мест: ' . $data[$i]['passengers'] . ' ';
    echo 'Класс: ' . $data[$i]['class'] . ' ';
    echo 'Допустимый объем багажа: ' . $data[$i]['bagage'] . ' Кг. ';
    echo 'Цена билета: ' . $data[$i]['price'];
    echo '<br><br><br>';
}
echo '</div>';
echo
'</body>
</html>';
?>