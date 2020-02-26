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
        'id' => $row['id'],
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
.line{
padding-left: 20px;
}
.Tname{
font-size: 20px;
padding-left: 30px;
}
.names{
font-size: 18px;
}
</style>
</head>
<body>
<!--<script src="admin.js"></script>-->
<br><br><br>
<div align="center"><h1>Данные о полетах</h1></div>
<div align="center">
<br><br><br>';
echo '<div class="names">';

for ($i=0; $i<$num_rows; $i++) {
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
    echo '<br>';
    echo '<form method="post">';
    echo '<input type="hidden" name="' . $i . '" value="' . $i . '">';
    echo '<button name="red_' . $i . '" id="' . $i . '">Редактировать</button>';
    echo '</form>';
    echo '<form method="post" action="del_admin.php">';
    echo '<input type="hidden" name="id" value="' . $data[$i]['id'] . '"/>';
    echo '<input name="del" type="submit" value="Удалить" />';
    echo '</form>';
    echo '<br>';
    }
echo '</div>';
echo
'</body>
</html>';
?>