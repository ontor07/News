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
                            <h4 class="m-b-10">VIEW PROFILE</h4>
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
                            <div class="card-body">
                                <div class="wrapper">
                                    <div class="left">
                                        <img class="user" src="../../asset/img/admin_image/<?php echo $_SESSION['image']; ?>" alt="User-Profile-Image">
                                        <h4><?php echo $_SESSION['username']; ?></h4>
                                    </div>
                                    <div class="right">
                                        <div class="info">
                                            <h3>User Information</h3>
                                            <div class="info_data">
                                                <div class="data">
                                                    <h4>Email</h4>
                                                    <p><?php echo $_SESSION['email']; ?></p>
                                                </div>
                                                <?php
                                                
                                                ?>
                                                <div class="data">
                                                    <h4>Phone</h4>
                                                    <p><?php echo $_SESSION['phone']; ?></p>
                                                </div>
                                                <div class="data">
                                                    <h4>Address</h4>
                                                    <p><?php echo $_SESSION['adress']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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