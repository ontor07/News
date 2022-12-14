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
                            <h4 class="m-b-10">VIEW SUB MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_sub_menu.php">Add Sub Menu</a></li>
                            <li class="breadcrumb-item"><a href="view_sub_menu.php">View Sub Menu</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="add_sub_menu.php" class="btn btn-info">Add Sub Menu</a>
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
                            <div class="col-12">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Main Menu</th>
                                            <th>Link Name</th>
                                            <th>Route Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $db->link->query("SELECT sub_menu.*,main_menu.main_menu_name FROM `sub_menu`INNER JOIN `main_menu` ON sub_menu.main_menu=main_menu.id");
                                        if($sql)
                                        {
                                            while ($showdata = $sql->fetch_assoc())
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $showdata['sl']; ?></td>
                                                    <td><?php echo $showdata['main_menu_name']; ?></td>
                                                    <td><?php echo $showdata['link_name']; ?></td>
                                                    <td><?php echo $showdata['route_name']; ?></td>
                                                    <td>
                                                        <a href="edit_sub_menu.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-info">Edit</a>
                                                        <a href="delete_sub_menu.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
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

<?php
include ('../layouts/footer.php');
?>