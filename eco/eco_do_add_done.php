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



$pro_comment=$_POST['comment'];
$pro_percent=$_POST['percent'];


$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO eco (comment,percent) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_comment;
$data[]=$pro_percent;


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

