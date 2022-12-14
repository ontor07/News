<?php
include ('header.php');
include ('sidebar.php');
?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
			<!-- [ card ] start -->
			<div class="col-xl-12">
				<div class="row">
					<?php 
					$sql_admin = $db->link->query("SELECT * FROM `create_admin`");
					$number = mysqli_num_rows($sql_admin);
					?>
					<div class="col-sm-4">
						<a href="../create_admin/view_admin.php" style="text-decoration: none;">
						<div class="card" style="background: #3e5871; border-bottom: none;">
							<!-- <div class="card-header" style="border-bottom: none;">
								
							</div> -->
							<div class="card-body">
								<h2 class="card-title text-white"><?php echo $number; ?></h2>
								<p><h5 class="card-text text-white">Admin Created.</h5></p>
							</div>
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="card text-white bg-success">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title text-white">Light card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card text-white bg-danger ">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title text-white">Dark card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<!-- [ card ] end -->
		</div>
        <!-- [ Main Content ] end -->
    </div>
</div>


<?php
include ('footer.php');
?>
