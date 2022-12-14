<?php 
include('../../../database/connection.php');
$db=new database();

if(isset($_GET['id']))
{
	$id = $_GET['id'];

	// print $id;
    $pathImage =$db->link->query("SELECT `image` FROM `ads` WHERE `id`='$id' ");
    $fetch_image= $pathImage->fetch_assoc();

    $path = '../../asset/img/ads/'.$fetch_image['image'];
    if(file_exists($path))
    {
        unlink($path);
    }

	$sql = $db->link->query("DELETE FROM `ads` WHERE `id`='$id'");

	if($sql)
	{
		echo "<script>location='ads_view.php'</script>";
	}
	else
	{
		echo "<script>location='ads_view.php'</script>";
	}
}
?>