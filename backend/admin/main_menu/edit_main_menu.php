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
                            <h4 class="m-b-10">EDIT MAIN MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_main_menu.php">Add Main Menu</a></li>
                            <li class="breadcrumb-item"><a href="view_main_menu.php">View Main Menu</a></li>
                            <li class="breadcrumb-item"><a href="edit_main_menu.php">Edit Main Menu</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="view_main_menu.php" class="btn btn-info">View Main Menu</a>
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
                                $id = $_GET['id'];
                    
                                $sl = isset($_POST['sl'])?$_POST['sl']:'';
                                $link_name = isset($_POST['link_name'])?$_POST['link_name']:'';
                                $icon = isset($_POST['icon'])?$_POST['icon']:'';
                                $status = isset($_POST['status'])?$_POST['status']:'';
                    
                                if(isset($_POST['save']))
                                {
                                    $query = "UPDATE `main_menu` SET `main_menu_name`='$link_name',`icon`='$icon',`status`='$status' WHERE `id`='$id'";
                        
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

                                    $query = "SELECT * FROM `main_menu` WHERE `id`='$id'";

                                    $sql = $db->link->query($query);

                                    if($sql)
                                    {
                                        $showdata = $sql->fetch_assoc();
                                    }
                                }

                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Serial No</label>
                                        <input type="number" name="sl" class="form-control"  value="<?php echo $showdata['sl']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Name</label>
                                        <input type="text" name="link_name" class="form-control"  value="<?php echo $showdata['main_menu_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Icon Name</label>
                                        <input type="text" name="icon" class="form-control"  value="<?php echo $showdata['icon']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Main Menu</label>
                                            <select class="form-control select2" name="status">
                                                <?php 
                                                if($showdata['status'] == 1)
                                                {
                                                    ?>
                                                    <option value="">Select One</option>
                                                    <option selected value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <option value="">Select One</option>
                                                        <option value="1">Active</option>
                                                        <option selected value="0">Inactive</option>
                                                        <?php
                                                    }
                                                    ?> 
                                                    </select>
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