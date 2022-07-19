<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>みんなで節電アプリ</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php

try
{



$pro_company=$_POST['company'];
$pro_year=$_POST['year'];
$pro_month=$_POST['month'];
$pro_money=$_POST['money'];
$pro_kwh=$_POST['kwh'];


$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO cost (company,year,month,money,kwh) VALUES (?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_company;
$data[]=$pro_year;
$data[]=$pro_month;
$data[]=$pro_money;
$data[]=$pro_kwh;

$stmt->execute($data);

$dbh=null;


print '一件追加しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="eco.php"> 戻る</a>

</body>
</html>
