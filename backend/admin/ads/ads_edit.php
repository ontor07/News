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
                                if(isset($_POST['save']))
                                {
                                    $title = $_POST['title'];
                                    
                                    
                                    if(isset($_POST['ads']))
                                    {
                                        $ads = $_POST['ads'];
                                        $db->insert('ads',['title'=>$title,'ads'=>$ads]);
                                    }
                                    else
                                    {
                                        $db->insert('ads',['title'=>$title]);
                                    }

                                    $file = $_FILES['image']['name'];
                                    
                                    if($file)
                                    {
                                        $id = $db->link->insert_id;
                                        $extension = pathinfo($file, PATHINFO_EXTENSION);

                                        $image_name = rand().'.'.$extension;

                                        $image_path = '../../asset/img/ads/'.$image_name;

                                        move_uploaded_file($_FILES['image']['tmp_name'],$image_path);

                                        $db->update('ads',['image'=>$image_name],"id='$id'");

                                    }

                                }
                            ?>
                                
                                <form method="POST" enctype="multipart/form-data">
                                   <div class="form-group">
                                        <label> News Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>  
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" >
                                    </div>                                   
                                    <div class="form-group">
                                    <label>Top ADS</label>
                                    <input value="1" class="" type="checkbox" name="ads">
                                    
                                    
                                    </div> 
                                    <div class="form-group">
                                     <label>Middle ADS</label>
                                    <input value="2" class="" type="checkbox" name="ads">
                                    
                                   
                                    </div> 
                                    <div class="form-group">
                                    <label>Footer ADS</label>
                                    <input value="3" class="" type="checkbox" name="ads">
                                   
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