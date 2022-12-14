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
                            <h4 class="m-b-10">VIEW MAIN MENU</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_main_menu.php">Add Main Menu</a></li>
                            <li class="breadcrumb-item"><a href="view_main_menu.php">View Main Menu</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="add_main_menu.php" class="btn btn-info">Add Main Menu</a>
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
                                            <th>Link Name</th>
                                            <th>Icon Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $db->link->query("SELECT * FROM `main_menu`");
                                        if($sql)
                                        {
                                            $sl = 1;
                                             while ($showdata = $sql->fetch_array())
                                             {
                                                ?>
                                                <tr>
                                                <td><?php echo $sl++; ?></td>
                                                    <td><?php echo $showdata['2']; ?></td>
                                                    <td><?php echo $showdata['3']; ?></td>
                                                    <td>
                                                        <a href="edit_main_menu.php?id=<?php echo $showdata['0']; ?>" class="btn btn-outline-info">Edit</a>
                                                        <a href="delete_main_menu.php?id=<?php echo $showdata['0']; ?>" class="btn btn-outline-danger">Delete</a>
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