<?php
include ('../layouts/header.php');
include ('../layouts/sidebar.php');
?>

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Add ADS</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_sub_menu.php">Add ADS</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="ads_view.php" class="btn btn-info">View ADS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            <?php

                    if(isset($_GET['id']))
                    {

                        $id = $_GET['id'];

                        $title = isset($_POST['title'])?$_POST['title']:'';
                       
                        $ads = isset($_POST['ads'])?$_POST['ads']:'';
                        $image = isset($_POST['image'])?$_POST['image']:'';

                        if(isset($_POST['save']))
                        {

                                $title = isset($_POST['title'])?$_POST['title']:'';
                                
                                $ads = isset($_POST['ads'])?$_POST['ads']:'';

                                $sql = $db->link->query("UPDATE `ads` SET `title`='$title',`ads`='$ads' WHERE  `id`='$id' ");

                                if($sql)
                                {
                                    $file = $_FILES['image']['name'];

                                    if($file)
                                    { 
                                        $pathImage = $db->link->query("SELECT `image` FROM `ads` WHERE `id`='$id' ");
                                        $fetch_image = $pathImage->fetch_assoc();

                                        $path = '../../asset/img/ads/'.$fetch_image['image'];

                                        if(file_exists($path))
                                        {
                                            unlink($path); 
                                        }
                                    }

                                    if($file)
                                    {
                                        $path_info = $_FILES['image']['name'];

                                        $extension = pathinfo($path_info, PATHINFO_EXTENSION);

                                        $image_name = $id.'.'.$extension;

                                        $path = '../../asset/img/ads/'.$image_name;

                                        move_uploaded_file($_FILES['image']['tmp_name'],$path);
                                        $db->link->query("UPDATE `ads` SET `image`='$image_name' WHERE `id`='$id'");


                                    }

                                    echo '<div class="alert alert-success">Data Updated Successfully</div>';
                                }
                            }
                            
                        }





                        $sql = $db->link->query("SELECT * FROM `ads` WHERE `id`='$id'");

                        if($sql)
                        {
                            $showdata = $sql->fetch_assoc();
                        }
                    ?>
                                
                                <form method="POST" enctype="multipart/form-data">
                                   <div class="form-group">
                                        <label> News Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $showdata['title'];?>">
                                    </div>  
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" ><br>
                                        <img src="../../asset/img/ads/<?php echo $showdata['image'];?>" width="60%" height="30%" class="img-fluid" alt="">
                                    </div>                                   
                                    <div class="form-group">
                                    
                                    <input <?php if($showdata['ads'] == 1){ echo "checked"; } ?> value="1" class="" type="checkbox" name="ads">
                                    
                                    <label>Top ADS</label>
                                    </div> 
                                    <div class="form-group">
                                    
                                    <input <?php if($showdata['ads'] == 2){ echo "checked"; } ?>  value="2" class="" type="checkbox" name="ads">
                                    <label>Middle ADS</label>
                                   
                                    </div> 
                                    <div class="form-group">
                                    
                                    <input <?php if($showdata['ads'] == 3){ echo "checked"; } ?>  value="3" class="" type="checkbox" name="ads">
                                    <label>Footer ADS</label>
                                    </div>
                                     <div class="form-group">
                                    
                                    <input <?php if($showdata['ads'] == 4){ echo "checked"; } ?>  value="3" class="" type="checkbox" name="ads">
                                    <label>Cart ADS</label>
                                    </div>
                                    
                                    <div class="form-group" style="text-align: center !important;">
                                    <input type="submit" name="save" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>


<?php
include ('../layouts/footer.php');
?>