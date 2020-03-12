<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
echo '<html>
<head>
<title>Фильтрация</title>
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
<h1>Что будем фильтровать?</h1>
<form method="get" action="endfiltr.php">
<a>Откуда рейс</a>
<input type="text" name="from" value="">
<br>
<a>Куда рейс</a>
<input type="text" name="to" value="">
<br>
<a>Дата</a>
<input type="text" name="date" value="">
<br>
<a>Время вылета</a>
<input type="text" name="timeoff" value="">
<br>
<a>Класс</a>
<input type="text" name="class" value="">
<br>
<a>Багаж</a>
<input type="text" name="bagage" value="">
<br>
<a>Цена до</a>
<input type="text" name="price" value="">
<br><br>
<input name="show" type="submit" value="Поиск">
</form>
</div>
</body>
</html>';
?>