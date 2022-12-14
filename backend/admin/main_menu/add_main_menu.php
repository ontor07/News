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
                            <h4 class="m-b-10">ADD MAIN MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_main_menu.php">Add Main Menu</a></li>
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
                                $sl = isset($_POST['sl'])?$_POST['sl']:'';
                                $link_name = isset($_POST['link_name'])?$_POST['link_name']:'';
                                $icon = isset($_POST['icon'])?$_POST['icon']:'';
                                $status = isset($_POST['status'])?$_POST['status']:'';
                            
                                if(isset($_POST['save']))
                                {
                                    if(!empty($sl) && !empty($link_name) && !empty($icon))
                                    {
                                        $sql = $db->link->query("INSERT INTO `main_menu`(`sl`, `main_menu_name`, `icon`, `status`) VALUES ('$sl','$link_name','$icon','$status')");
                                        if($sql)
                                        {
                                            echo "<div class='alert alert-success'>Data Insert Successfllly!</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-danger'>Data Insert Unsuccessfllly!</div>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<div class='alert alert-danger'>Please Fill Out All The Fields!</div>";
                                    }
                                }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Serial No</label>
                                        <input type="number" name="sl" class="form-control" placeholder="EX:001">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Name</label>
                                        <input type="text" name="link_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Icon Name</label>
                                        <input type="text" name="icon" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control select2">
                                            <option value="">Select One</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
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