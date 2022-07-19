<link rel="stylesheet" href="style.css">
<?php

try
{

$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,company,year,month,money,kwh FROM cost WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<h1>電気使用料、料金一覧</h1><br /><br />';

print '<form method="post" action="eco_branch.php">';
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="procode" value="'.$rec['code']. '">';
	print $rec['company'].' ';
        print $rec['year'].'年　';
        print $rec['month'].'月　';
        print $rec['money'].'円　';
        print $rec['kwh'].'kwh';
	print '<br />';
}


print '<input type="submit" name="add" value="追加">';
//print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>
<h2><a href="eco.php">戻る<a/><h2/>