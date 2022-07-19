
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
$pro_company=$_POST['company'];
$pro_year=$_POST['year'];
$pro_month=$_POST['month'];
$pro_money=$_POST['money'];
$pro_kwh=$_POST['kwh'];

if($pro_company=='')
{
	print '会社名が入力されていません。<br />';
}
else
{
	print '会社名:';
	print $pro_company;
	print '<br />';
}

if(preg_match('/\A[0-9]+\z/',$pro_year)==0)
{
	print '価格をきちんと入力してください。<br />';
}
else
{
	
	print $pro_year;
	print '年<br />';
}

if(preg_match('/\A[0-9]+\z/',$pro_month)==0)
{
	print '月をきちんと入力してください。<br />';
}
else
{
	
	print $pro_month;
	print '月<br />';
}

if(preg_match('/\A[0-9]+\z/',$pro_money)==0)
{
	print '料金をきちんと入力してください。<br />';
}
else
{
	
	print $pro_money;
	print '円<br />';
}
if(preg_match('/\A[0-9]+\z/',$pro_kwh)==0)
{
	print '料金をきちんと入力してください。<br />';
}
else
{
	
	print $pro_kwh;
	print 'kwh<br />';
}


if($pro_company=='' || preg_match('/\A[0-9]+\z/',$pro_year)==0 || preg_match('/\A[0-9]+\z/',$pro_month)==0 || preg_match('/\A[0-9]+\z/',$pro_money)==0 || preg_match('/\A[0-9]+\z/',$pro_kwh)==0)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="eco_add_done.php">';
	print '<input type="hidden" name="company" value="'.$pro_company.'">';
	print '<input type="hidden" name="year" value="'.$pro_year.'">';
	print '<input type="hidden" name="month" value="'.$pro_month.'">';
        print '<input type="hidden" name="money" value="'.$pro_money.'">';
        print '<input type="hidden" name="kwh" value="'.$pro_kwh.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>
