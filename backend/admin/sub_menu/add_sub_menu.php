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
                            <h4 class="m-b-10">ADD SUB MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_sub_menu.php">Add Sub Menu</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="view_sub_menu.php" class="btn btn-info">View Sub Menu</a>
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
                                    $sl = $_POST['sl']?$_POST['sl']:'';
                                    $main_menu = $_POST['main_menu']?$_POST['main_menu']:'';
                                    $link_name = $_POST['link_name']?$_POST['link_name']:'';
                                    $route_name = $_POST['route_name']?$_POST['route_name']:'';
                        
                                    $sql_check = $db->link->query("SELECT * FROM `sub_menu` WHERE `sl`='$sl'");
                                    if(mysqli_num_rows($sql_check) > 0)
                                    {
                                        echo "<div class='alert alert-info'>This Serial Number is Already Taken</div>";
                                    }
                                    else
                                    {
                                        $sql = $db->link->query("INSERT INTO `sub_menu`(`sl`,`main_menu`, `link_name`,`route_name`,`status`) VALUES ('$sl','$main_menu','$link_name','$route_name','1')");
                                        if($sql)
                                        {
                                            echo "<div class='alert alert-success'>Data Insert Successfully</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-danger'>Data Insert Unsuccessfllly</div>";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Serial No</label>
                                        <input type="number" name="sl" class="form-control" placeholder="EX:001">
                                    </div>
                                    <div class="form-group">
                                        <label>Main Menu</label>
                                        <select name="main_menu" class="form-control select2">
                                            <option>Select One</option>
                                            <?php
                                            $main_menu = $db->link->query("SELECT * FROM `main_menu` WHERE `status`='1' ");
                                            if($main_menu)
                                            {
                                                while($showmain_menu = $main_menu->fetch_assoc())
                                                {
                                                    ?>
                                                    <option value="<?php echo $showmain_menu['id']; ?>"><?php echo $showmain_menu['main_menu_name']; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Link Name</label>
                                        <input type="text" name="link_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Route Name</label>
                                        <input type="text" name="route_name" class="form-control">
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