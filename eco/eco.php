
<!DOCTYPE html>
<html>
    <head>
        <title>みんなで節電アプリ</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body>
        <h1>みんなで節電アプリ</h1><!-- comment -->
        <br/>
        　
        <!-- comment <h2>現在の東電電力使用率は</h2><a href="eco_cost.php"><h2>こちら</h2></a>-->
        <img src="setsuden_airconditioner.png" alt="節電"></br>
        <h4>アプリの使い方　東電電力使用率を気にしながら、自分達で出来る節電を心がけましょう♪</h4>
<?php
//ローカルではfile_get_contentsが使えるのですが、xfreeがfile_get_contentsが使用できないため、APIが本番環境で使用できないので、ご了承ください。
// CSVデータのURL
$url = "http://tepco-usage-api.appspot.com/quick.txt";
 
// 読み込み
$csv = file_get_contents($url);
 
// 文字化け防止
$csv = mb_convert_encoding($csv, 'UTF-8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
 
// csv分解して時間、使用量、供給量に分ける
list($time,$now,$max) = str_getcsv($csv);
//$now=4069;
//$max=4945;
 
// 使用率(小数点は切捨て）
$usageRate = (int) ($now / $max * 100);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>東京電力の最新電気供給量</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body>
	<div id="panel">
            <h2><li>現在の東電電力使用率</li></h2>
	    <!--使用率を表示-->
	    <div id="percent"><?= $usageRate ?>%</div>
	    <!--使用率でメーター表示-->
	    <div>
		<p><meter min="0" max="100" value="<?= $usageRate ?>"></meter></p>
		<p class="center">使用量:<span class="num"><?= $now?></span>万kW</p>
		<p class="center">供給量:<span class="num"><?= $max?></span>万kW</p>
	    </div>
	</div>
    </body>
</html>

        
	
  
<?php

try
{

$dsn='mysql:dbname=portfolio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,comment,percent FROM eco WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<h2><li>節電活動一覧</li></h2><br />';

print '<form method="post" action="eco_do_branch.php">';
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="procode" value="'.$rec['code']. '">';
	print $rec['comment'].'---';
	print $rec['percent'].'%（削電効果）';
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
<br />
<h2><li>あなたの電気使用料、料金一覧は</li></h2><a href="eco_cost.php"><h3>こちら</h3></a>

</body>
</html>