<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
$res = $open->query('select * from flying where id=' . $_POST['id']);
$data = [];
if (mysqli_num_rows($res) !== 1) {
    echo 'иди нахуй';
    exit();
}
while ($row = $res->fetch_assoc()) {
    $data = [
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

echo '<html>
<head>
<title>Редактирование рейса</title>
<style>
body {
background-color: #ffbb29;
}
h1{
color: black;
font-size: 45px;
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
a{
 font-size: 35px;
 }
input{
height: 30px;
width: 150px;
}
</style>
</head>
<body>
<div align="center">
<br><br><br>
<h1>Редактирование записи</h1>
<form method="get" action="save_admin.php">
<a>Номер рейса: </a>
<input type="hidden" name="id" value="' . $data['id'] . '">
<input type="text" name="number" value="' . $data['number'] .'">
<br>
<a>Откуда рейс: </a>
<input type="text" name="from" value="' . $data['from'] .'">
<br>
<a>Куда рейс: </a>
<input type="text" name="to" value="' . $data['to'] .'">
<br>
<a>Дата: </a>
<input type="text" name="date" value="' . $data['date'] .'">
<br>
<a>Время вылета: </a>
<input type="text" name="timeoff" value="' . $data['timeoff'] .'">
<br>
<a>Время посадки: </a>
<input type="text" name="timeon" value="' . $data['timeon'] .'">
<br>
<a>Количество пассажиров: </a>
<input type="text" name="passengers" value="' . $data['passengers'] .'">
<br>
<a>Класс: </a>
<input type="text" name="class" value="' . $data['class'] .'">
<br>
<a>Багаж: </a>
<input type="text" name="bagage" value="' . $data['bagage'] .'">
<br>
<a>Цена: </a>
<input type="text" name="price" value="' . $data['price'] .'">
<br><br>
<input name="save" type="submit" value="Сохранить">
</form>
</div>
</body>
</html>';
?>