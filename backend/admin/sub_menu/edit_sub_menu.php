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
                            <h4 class="m-b-10">EDIT SUB MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_sub_menu.php">Add Sub Menu</a></li>
                            <li class="breadcrumb-item"><a href="view_sub_menu.php">View Sub Menu</a></li>
                            <li class="breadcrumb-item"><a href="edit_sub_menu.php">Edit Sub Menu</a></li>
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
                                if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];
                        
                                    if(isset($_POST['save']))
                                    {
                                        $sl = $_POST['sl']?$_POST['sl']:'';
                                        $main_menu = $_POST['main_menu']?$_POST['main_menu']:'';
                                        $link_name = $_POST['link_name']?$_POST['link_name']:'';
                                        $route_name = $_POST['route_name']?$_POST['route_name']:'';
                            
                                        $sql = $db->link->query("UPDATE `sub_menu` SET `sl`='$sl',`main_menu`='$main_menu',`link_name`='$link_name',`route_name`='$route_name' WHERE `id`='$id'");
                                        if($sql)
                                        {
                                            echo "<div class='alert alert-success'>Data Updated!</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-danger'>Data Can not Update</div>";
                                        }
                                    }
                                    
                                    $sql_get = $db->link->query("SELECT * FROM `sub_menu` WHERE `id`='$id.'");
                        
                                    if($sql_get)
                                    {
                                             $showdata = $sql_get->fetch_assoc();
                                            }
                                        }
                                        ?>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Serial No</label>
                                                <input type="number" name="sl" class="form-control"  value="<?php echo $showdata['sl']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Main Menu</label>
                                                <select class="form-control" name="main_menu">
                                                    <option>Select One</option>
                                                    <?php 
                                                    $main_menu = $db->link->query("SELECT * FROM `main_menu`");
                                                    if($main_menu)
                                                    {
                                                        while($showmain_menu = $main_menu->fetch_array())
                                                        {
                                                            if($showmain_menu['0'] == $showdata['main_menu'])
                                                            {
                                                                $selected = 'selected';
                                                            }
                                                            else
                                                            {
                                                                $selected='';
                                                            }
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $showmain_menu['0']; ?>"><?php echo $showmain_menu['2']; ?></option>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <label>Link Name</label>
                                                        <input type="text" name="link_name" class="form-control" value="<?php echo $showdata['link_name']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Route Name</label>
                                                        <input type="text" name="route_name" class="form-control" value="<?php echo $showdata['route_name']; ?>">
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