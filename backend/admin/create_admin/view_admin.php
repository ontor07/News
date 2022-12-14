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
                            <h4 class="m-b-10">VIEW ADMIN</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="view_admin.php">View Admin</a></li>
                        </ul>
                        <br>
                        <!-- <div class="links">
                            <a href="create_admin.php" class="btn btn-info">Create Admin</a>
                        </div> -->
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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>User Type</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $db->link->query("SELECT * FROM `create_admin`");
                                        if($sql)
                                        {
                                            $sl = 1;
                                            while ($showdata = $sql->fetch_assoc())
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $sl++; ?></td>
                                                    <td><?php echo $showdata['username']; ?></td>
                                                    <td><?php echo $showdata['mail']; ?></td>
                                                    <td><?php echo $showdata['phone']; ?></td>
                                                    <td><?php echo $showdata['adress']; ?></td>
                                                    <td>
                                                        <?php
                                                        if($showdata['type'] == 1)
                                                        {
                                                            echo "<div class='badge badge-success'>Active</div>";
                                                        }
                                                        else
                                                        {
                                                            echo "<div class='badge badge-danger'>Not Active</div>";
                                                        }
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <img src="../../asset/img/admin_image/<?php echo $showdata['image']; ?>" class="img-fluid" alt="" height="80px" width="80px">
                                                        </td>
                                                        <td>
                                                            <?php 
                                                            if($_SESSION['admin_type'] == 'developer')
                                                            {
                                                                ?>
                                                                <a href="edit_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-info">Edit</a>
                                                                <a href="delete_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-danger">Delete</a>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                    if($_SESSION['admin_id'] == $showdata['id'])
                                                                    {
                                                                        ?>
                                                                        <a href="edit_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-info">Edit</a>
                                                                        <a href="delete_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-danger">Delete</a>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <div class="badge badge-danger">You Can not Edit Others Info !!</div>
                                                                            <?php
                                                                            }
                                                                            ?>
                    
                                                                    <?php
                                                                    }
                                                                    ?>
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
                        <!-- <td>
                                                            <a href="edit_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-info">Edit</a>
                                                            <a href="delete_admin.php?id=<?php echo $showdata['id']; ?>" class="btn btn-outline-danger">Delete</a>
                                                        </td> -->
                    </div>
                    <!-- [ form-element ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </section>

<?php
include ('../layouts/footer.php');
?>