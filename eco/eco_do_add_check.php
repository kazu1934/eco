
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>みんなで節電アプリ</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php



//$post= sanitize($_POST);
$pro_comment=$_POST['comment'];
$pro_percent=$_POST['percent'];


if($pro_comment=='')
{
	print '節電活動が入力されていません。<br />';
}
else
{
	print '節電活動:';
	print $pro_comment;
	print '<br />';
}

if(preg_match('/\A[0-9]+\z/',$pro_percent)==0)
{
	print '%（削減効果）をきちんと入力してください。<br />';
}
else
{
	
	print $pro_percent;
	print '%<br />';
}



if($pro_comment=='' || preg_match('/\A[0-9]+\z/',$pro_percent)==0 )
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="eco_do_add_done.php">';
	print '<input type="hidden" name="comment" value="'.$pro_comment.'">';
	print '<input type="hidden" name="percent" value="'.$pro_percent.'">';
	
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>

