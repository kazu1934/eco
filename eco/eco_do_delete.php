


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

$sql='SELECT comment,percent FROM eco WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_comment=$rec['comment'];
$pro_percent=$rec['percent'];


$dbh=null;



?>

節電活動<br />
<br />
<?php print $pro_comment; ?>
<br />
<?php print $pro_percent; ?>%
<br />

こちらを削除してよろしいですか？<br />
<br />
<form method="post" action="eco_do_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">

<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>
