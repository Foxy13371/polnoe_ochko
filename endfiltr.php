<?php
$open = mysqli_connect('localhost', 'root', '', 'airlines', '3306');
if (!$open){
    echo 'Код ошибки :'. mysqli_connect_errno();
    echo 'Текст ошибки:'. mysqli_connect_error();
    exit;
}
$fr = $_GET['from'];
$t = $_GET['to'];
$data = $_GET['date'];
$tof = $_GET['timeoff'];
$cl = $_GET['class'];
$bag = $_GET['bagage'];
$pr = $_GET['price'];
if (empty($fr) and empty($t) and empty($data) and empty($tof) and empty($cl) and empty($bag) and empty($pr)){
    header ('Location: airtable.php');
}
$summ = 0;
$query = 'select * from flying where ';
if (!empty($fr)) {
    if (!$summ) {
        $summ++;
    }
    $query .= "`from`='{$fr}'";
}
if (!empty($t)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `to`='{$t}'";
}
if (!empty($data)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `date`='{$data}'";
}
if (!empty($tof)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `timeoff`='{$tof}'";
}
if (!empty($cl)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `class`='{$cl}'";
}
if (!empty($bag)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `bagage`='{$bag}'";
}
if (!empty($pr)) {
    if (!$summ) {
        $summ++;
    } else {
        $query .= ' and ';
    }
    $query .= " `price`<='{$pr}'";
}
$res = $open->query($query);
var_dump("select * from flying where `from`='{$fr}' and `to`='{$t}' and `date`='{$data}' and `timeoff`='{$tof}' and `class`='{$cl}' and `bagage`={$bag} and `price`<={$pr}");
var_dump($query);
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
td{
border: 2px double black;
padding: 10px;
}
 .FTable{
 padding: 3px;
 font-size: 20px;
 text-align: center;
 width: 1300px;
 height: 300px;
 margin: auto;
 }
 a{
 font-size: 30px;
 text-decoration: none;
 }
</style>
</head>
<body>
<br><br><br>
<div align="center"><a>Результат фильтрации</a>
<br>
<a href="airtable.php">Бекап</a>
</div>
<br><br>
</div>';
echo '
<div align="center">
<table class="border">
<tr>
<td><a href="filtr_menu.php">Фильтрация</a></td>
<td><a href="sort_menu.php">Сортировка</a></td>
</tr>
</table>
</div>
<br>
<br>
';
echo '<table class="FTable">
<tr>
<td>
<a>Номер рейса</a>
</td>
<td>
<a>Откуда</a>
</td>
<td>
<a>Куда</a>
</td>
<td>
<a>Дата</a>
</td>
<td>
<a>Время вылета</a>
</td>
<td>
<a>Время прибытия</a>
</td>
<td>
<a>Количество мест</a>
</td>
<td>
<a>Класс</a>
</td>
<td>
<a>Багаж</a>
</td>
<td>
<a>Цена билета</a>
</td>
</tr>
';
for ($i=0; $i<$num_rows; $i++){
    echo '<tr>';
    echo '<td>';
    echo $data[$i]['number'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['from'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['to'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['date'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['timeoff'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['timeon'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['passengers'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['class'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['bagage'];
    echo '</td>';
    echo '<td>';
    echo $data[$i]['price'];
    echo '</td>';
    echo '<td>';
    echo '<form method="post" action="red_admin.php">';
    echo '<input type="hidden" name="id" value="' . $data[$i]['id'] . '">';
    echo '<input name="del" type="image" src="pencil.jpg" />';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form method="post" action="del_admin.php">';
    echo '<input type="hidden" name="id" value="' . $data[$i]['id'] . '">';
    echo '<input name="del" type="image" src="bag.jpg" />';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form method="post" action="add_admin.php">';
    echo '<input type="hidden" name="id" value="' . $data[$i]['id'] . '">';
    echo '<input name="del" type="image" src="plus.jpg">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
echo
'</body>
</html>';
?>