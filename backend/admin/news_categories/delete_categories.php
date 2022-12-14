<?php 
include('../../../database/connection.php');
$db=new database();

if(isset($_GET['id']))
{
	$id = $_GET['id'];

	// print $id;

	$sql = $db->link->query("DELETE FROM `categories` WHERE `id`='$id'");

	if($sql)
	{
		echo "<script>location='categories.php'</script>";
	}
	else
	{
		echo "<script>location='categories.php'</script>";
	}
}
?>