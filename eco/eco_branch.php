<?php




if(isset($_POST['add'])==true)
{
    
	
	header('Location:eco_add.html');
	exit();
}




if(isset($_POST['delete'])==true)
{
	if(isset($_POST['procode'])==false)
	{
		header('Location:eco_ng.html');
		exit();
	}
	$pro_code=$_POST['procode'];
    
	header('Location:eco_delete.php?procode='.$pro_code);
	exit();
}

?>


