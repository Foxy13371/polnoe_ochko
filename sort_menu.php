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
<a href="airtable.php">Бекап</a>
<br><br><br>
<h1>По чему сортируем?</h1>
<form method="get" action="endsort.php">
<input type="hidden" name="id" value="' . $data[$i]['id'] . '">
<input type="submit" name="price" value="price">
<br><br><br>
<input type="hidden" name="id" value="' . $data[$i]['id'] . '">
<input type="submit" name="date" value="date">
<br><br><br>
<input type="hidden" name="id" value="' . $data[$i]['id'] . '">
<input type="submit" name="timeoff" value="timeoff">
</form>
<br>
</div>
</body>
</html>';
?>