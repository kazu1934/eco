<?php
// 出したいカレンダーの年と月
$year = 2022;
$month = 7;
 
// APIURL
$api1URL = sprintf("http://koyomi.zingsystem.com/api/?mode=m&cnt=01&targetyyyy=%s&targetmm=%02s",$year,$month);
 
// 暦JSON取得
$json1 = file_get_contents($api1URL);
 
// jSON解析
$calendar_obj = json_decode($json1);
 
// 指定された月の最初の日を作る
$timestamp = mktime(0, 0, 0, $month, 1, $year);
// 日付情報を得る
$date = getdate($timestamp);
 
// その月の最初の日の曜日を得る
$first_wday = $date['wday'];
 
// 曜日位置判定用の変数 0 (日曜) から 6 (土曜)
$wday_index = 0;
 
print '<table border="1">';
print "\n<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr>\n";
print '<tr>';
 
// 最初の曜日の位置まで進める
for ($i = 0; $i < $first_wday; $i++) {
 
    print("<td></td>");
    $wday_index++;
}
 
// カレンダーを作る
foreach ($calendar_obj->datelist as $date => $info) {
//    print($date);
 
    // 日曜日だったら行を変える
    if ($wday_index==0) {
        print "<tr>";
    }
 
    //datelistの2022-05-01という文字列を日付に戻して日だけ得る
    $day = getdate(strtotime($date))["mday"];
    print "<td>";
    // 六曜の出力
    print $day."<br>".$info->rokuyou;
    // 祝日がある場合は
    if ( isset($info->holiday)  ){
        // 出力する
        print "<br>".$info->holiday;
    }
    print "</td>";
 
    // 土曜日までいったら
    if ($wday_index==6) {
        // 、行を終了して列番号をリセット
        print "</tr>\n";
        $wday_index = 0;
    } else {
        // そうでない場合は列番号を進める
        $wday_index++;
    }
}
 
print '</table>';
