<?php 
include('../layouts/header.php');
include('../layouts/sidebar.php'); 
?>
<!-- Start app main Content -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Web Settings</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_main_menu.php">Web Settings</a></li>
                        </ul>
                        <br>
                        
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
                            <div class="form-section">
                  <?php
                 

                  if(isset($_POST['save']))
                  {
                    $title = $_POST['title'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $facebook = $_POST['facebook'];
                    $established  = $_POST['established'];
                    $address = $_POST['address'];

                    // $db->update('settings',['title'=>$title,'email'=>$email,],"id='1'");
                    $db->update('settings',['title'=>$title,'email'=>$email,'phone'=>$phone,'facebook'=>$facebook,'established'=>$established,'address'=>$address],"id='1'");

                    if($db->result)
                    {
                    echo"<div class='alert alert-success'>Data Update Succesfully</div>";
                    }
                    else
                    {
                    echo "<div class='alert alert-danger'>Data Update Unsuccesfully</div>";
                    }
                    
                    
                    $file = $_FILES['logo']['name'];

                    if($file)
                    { 
                        $pathImage = $db->link->query("SELECT `image` FROM `settings` WHERE `id`=1 ");
                        $fetch_image = $pathImage->fetch_assoc();

                        $path = '../../asset/img/settings/'.$fetch_image['image'];

                        if(file_exists($path))
                        {
                            unlink($path);
                        }
                    }

                    if($file)
                    {
                        $path_info = $_FILES['logo']['name'];

                        $extension = pathinfo($path_info, PATHINFO_EXTENSION);

                        $image_name = rand().'.'.$extension;

                        $path = '../../asset/img/settings/'.$image_name;

                        move_uploaded_file($_FILES['logo']['tmp_name'],$path);
                        $db->link->query("UPDATE `settings` SET `image`='$image_name' WHERE `id`=1");

                        
                    }

                  }

                  $data= $db->link->query("SELECT * FROM `settings` WHERE `id`=1");
                  if($data)
                  {
                    $showdata = $data->fetch_assoc();
                  }
                  ?>
                    
                    <form class="contact-form mt-5" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-12 text-center">
                            <label>Logo</label>
                            <input type="file" name="logo">

                            <?php
                            $path = '../../asset/img/settings/'.$showdata['image'];
                            if(file_exists($path))
                            {
                            ?>
                            <img src="../../asset/img/settings/<?php echo $showdata['image']; ?>" height="150px">
                            <?php
                            }
                            ?>
                            
                        </div>
                          <div class="form-group col-md-6">
                            <label>Title :</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $showdata['title'];?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Email Address :</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $showdata['email'];?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Phone :</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $showdata['phone'];?>">
                          </div>

                          <div class="form-group col-md-6">
                            <label>Facebook :</label>
                            <input type="text" name="facebook" class="form-control" value="<?php echo $showdata['facebook'];?>">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Established :</label>
                            <input type="text" name="established" class="form-control" value="<?php echo $showdata['established'];?>">
                          </div>
                          <div class="form-group col-md-12">
                            <label>Address :</label> 
                            <textarea name="address" id="" class="form-control summernote"><?php echo $showdata['address'];?></textarea>
                        </div>
                          
                        </div>
                        <button type="submit" class="btn btn-success wow zoomIn" name="save">Submit</button>
                      </form>
                </div>
                                
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
<?php include('../layouts/footer.php'); ?>