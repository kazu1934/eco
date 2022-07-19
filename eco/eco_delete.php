


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>みんなで節電アプリ</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php



$pro_code=$_GET['procode'];

$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT company,year,month,money,kwh FROM cost WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_company=$rec['company'];
$pro_year=$rec['year'];
$pro_month=$rec['month'];
$pro_money=$rec['money'];
$pro_kwh=$rec['kwh'];

$dbh=null;



?>

電気使用料、料金削除<br />
<br />
会社名<br />
<?php print $pro_company; ?>
<br />
<?php print $pro_year; ?>年
<br />
<?php print $pro_month; ?>月
<br />料金
<?php print $pro_money; ?>円
<br />
<?php print $pro_kwh; ?>kwh
こちらを削除してよろしいですか？<br />
<br />
<form method="post" action="eco_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">

<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>