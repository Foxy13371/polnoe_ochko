<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
echo '<html>
<head>
<title>Добавление рейса</title>
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
<h1>Добавление записи</h1>
<form method="get" action="save_changes_admin.php">
<a>Номер рейса: </a>
<input type="hidden" name="id" value="">
<input type="text" name="number" value="">
<br>
<a>Откуда рейс: </a>
<input type="text" name="from" value="">
<br>
<a>Куда рейс: </a>
<input type="text" name="to" value="">
<br>
<a>Дата: </a>
<input type="text" name="date" value="">
<br>
<a>Время вылета: </a>
<input type="text" name="timeoff" value="">
<br>
<a>Время посадки: </a>
<input type="text" name="timeon" value="">
<br>
<a>Количество пассажиров: </a>
<input type="text" name="passengers" value="">
<br>
<a>Класс: </a>
<input type="text" name="class" value="">
<br>
<a>Багаж: </a>
<input type="text" name="bagage" value="">
<br>
<a>Цена: </a>
<input type="text" name="price" value="">
<br><br>
<input name="save" type="submit" value="Сохранить">
</form>
</div>
</body>
</html>';
?>