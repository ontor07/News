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
                            <h4 class="m-b-10">EDIT ADMIN</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="view_admin.php">View Admin</a></li>
                            <li class="breadcrumb-item"><a href="edit_admin.php">Edit Admin</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="view_admin.php" class="btn btn-info">View Admin</a>
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
                            <div class="col-md-10">
                                
                                <?php

                                if(isset($_GET['id']))
                                {

                                    $id = $_GET['id'];

                                    $username = isset($_POST['username'])?$_POST['username']:'';
                                    $mail = isset($_POST['mail'])?$_POST['mail']:'';
                                    $phone = isset($_POST['phone'])?$_POST['phone']:'';
                                    $adress = isset($_POST['adress'])?$_POST['adress']:'';
                                    $type = isset($_POST['type'])?$_POST['type']:'';
                                    $password = isset($_POST['password'])?$_POST['password']:'';
                                    $confirm_password = isset($_POST['confirm_password'])?$_POST['confirm_password']:'';
                                    $image = isset($_POST['image'])?$_POST['image']:'';

                                    if(isset($_POST['save']))
                                    {
                                        if($password != $confirm_password)
                                        {
                                            echo "<div class='alert alert-danger'>Password Does Not Matched</div>";
                                        }
                                        else
                                        {
                                            $username = mysqli_real_escape_string($db->link,$username);
                                            $mail = mysqli_real_escape_string($db->link,$mail);
                                            $phone = mysqli_real_escape_string($db->link,$phone);
                                            $adress = mysqli_real_escape_string($db->link,$adress);
                                            $type = mysqli_real_escape_string($db->link,$type);
                                            $password = mysqli_real_escape_string($db->link,md5($password));
                                            $confirm_password = mysqli_real_escape_string($db->link,md5($confirm_password));

                                            $sql = $db->link->query("UPDATE `create_admin` SET `username`='$username',`mail`='$mail',`phone`='$phone',`adress`='$adress',`type`='$type',`password`='$password',`confirm_password`='$confirm_password' WHERE `id`='$id' ");

                                            if($sql)
                                            {
                                                $file = $_FILES['image']['name'];

                                                if($file)
                                                { 
                                                    $pathImage = $db->link->query("SELECT `image` FROM `create_admin` WHERE `id`='$id' ");
                                                    $fetch_image = $pathImage->fetch_assoc();

                                                    $path = '../../asset/img/admin_image/'.$fetch_image['image'];

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

                                                    $path = '../../asset/img/admin_image/'.$image_name;

                                                    move_uploaded_file($_FILES['image']['tmp_name'],$path);
                                                    $db->link->query("UPDATE `create_admin` SET `image`='$image_name' WHERE `id`='$id'");


                                                }

                                                echo '<div class="alert alert-success">Data Updated Successfully</div>';
                                            }
                                        }
                                        
                                    }





                                    $sql = $db->link->query("SELECT * FROM `create_admin` WHERE `id`='$id'");

                                    if($sql)
                                    {
                                        $showdata = $sql->fetch_assoc();
                                    }
                                }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="name" name="username" class="form-control" value="<?php echo $showdata['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="mail" class="form-control" value="<?php echo $showdata['mail']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone" class="form-control" value="<?php echo $showdata['phone']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="adress" class="form-control" value="<?php echo $showdata['adress']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                    <select id="inputState" name="type" class="form-control" required>
                                    <?php
                                    if($showdata['type'] == 1)
                                    {
                                        ?>
                                        <option value="">Select One</option>
                                      <option selected value="1">Active User</option>
                                      <option value="0">Inactive User</option>
                                    <?php
                                    }
                                    else
                                    {
                                   ?>
                                   <option value="">Select One</option>
                                      <option value="1">Active User</option>
                                      <option selected value="0">Inactive User</option>
                                   <?php 
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" value="<?php echo $showdata['password_recover']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirm_password" class="form-control" value="<?php echo $showdata['password_recover']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Picture</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="filestyle" name="image">
                                            <img src="../../asset/img/admin_image/<?php echo $showdata['image']; ?>" class="img-fluid" alt="" height="80px" width="80px">
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align: center !important;">
                                        <input type="submit" name="save" class="btn btn-primary" value="Update">
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