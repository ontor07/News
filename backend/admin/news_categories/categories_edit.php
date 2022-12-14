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
                            <h4 class="m-b-10">Add Categories</h4>
                        </div>
                        <div class="button">
                        <a href="categories.php" class="btn btn-primary">view categories</a>
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
                            $id = $_GET['id'];
                                               
                            $class = isset($_POST['class'])?$_POST['class']:'';
                           
                
                            if(isset($_POST['save']))
                            {
                                $query = "UPDATE `categories` SET `categories`='$class' WHERE `id`='$id'";
                    
                                $sql = $db->link->query($query);
                    
                                if($sql)
                                {
                                    echo "<div class='alert alert-success'>Data Update Successfllly</div>";
                                }
                                else
                                {
                                    echo "<div class='alert alert-danger'>Data Update Unsuccessfully</div>";
                                }
                            }
                            if(isset($_GET['id']))
                            {
                                $id = $_GET['id'];

                                // echo $id;

                                $query = "SELECT * FROM `categories` WHERE `id`='$id'";

                                $sql = $db->link->query($query);

                                if($sql)
                                {
                                    $showdata = $sql->fetch_assoc();
                                }
                            }
                              ?>
                              <form method="POST" enctype="multipart/form-data">
                              <h6>Add Categories</h6>
                                  <div class="input-single-box">
                                      <label>Categories</label>
                                      <input type="text" name="class" class="form-control" value="<?php echo $showdata['categories'];?>" required >
                                  </div>
                                  <div class="input-single-box mt-4" style="text-align: center;">
                                      <input type="submit" name="save"
                                      class="btn btn-success" id="save">
                                  </div>
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