<?php 
include('../../../database/connection.php');
$db=new database();
if(isset($_GET['id']))
{
	$id = $_GET['id'];

	// print $id;

	$pathImage =$db->link->query("SELECT `image` FROM `create_admin` WHERE `id`='$id' ");
    $fetch_image= $pathImage->fetch_assoc();

    $path = '../../asset/img/admin_image/'.$fetch_image['image'];
    if(file_exists($path))
    {
        unlink($path);
    }

	$sql = $db->link->query("DELETE FROM `create_admin` WHERE `id`='$id'");

	if($sql)
	{
		echo "<script>location='view_admin.php'</script>";
	}
	else
	{
		echo "<script>location='view_admin.php'</script>";
	}
}
?>