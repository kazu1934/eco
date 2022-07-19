<?php
// CSVデータのURL
$url = "http://tepco-usage-api.appspot.com/quick.txt";
 
// 読み込み
$csv = file_get_contents($url);
 
// 文字化け防止
$csv = mb_convert_encoding($csv, 'UTF-8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
 
// csv分解して時間、使用量、供給量に分ける
list($time,$now,$max) = str_getcsv($csv);
 
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
	    <h1>東電電力使用率</h1>
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
