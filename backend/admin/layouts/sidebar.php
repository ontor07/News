<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						
						<img class="img-radius" src="../../asset/img/admin_image/<?php echo $_SESSION['image']; ?>" alt="User-Profile-Image">
						<div class="user-details">
							<span><?php echo $_SESSION['username']; ?></span>
							<div id="more-details">Super Admin<i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="../admin_menu/profile.php"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="../logout.php"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Dashboard</label>
					</li>
					<li class="nav-item">
					    <a href="../../index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<?php
                    if($_SESSION['admin_type'] == 'developer')
                    {

                    ?>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Developer Option</span></a>
					    <ul class="pcoded-submenu">
					        <li><a class="nav-link " href="../main_menu/add_main_menu.php">Main Menu</a></li>
					        <li><a class="nav-link " href="../sub_menu/add_sub_menu.php">Sub Menu</a></li>
					    </ul> 
					</li>
					<?php
                    } 
                    ?>

					<li class="nav-item pcoded-menu-caption"> 
					    <label>Starter</label>
					</li>
					<?php 
					$sql = $db->link->query("SELECT * FROM `main_menu` WHERE `status`=1 order by 'sl' ASC ");
					if($sql)
					{
						while($showmain_menu = $sql->fetch_assoc())
						{
							?>
					<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link "><span class="pcoded-micon"><i class="<?php echo $showmain_menu['icon']; ?>"></i></span><span class="pcoded-mtext"><?php echo $showmain_menu['main_menu_name']; ?></span></a>
					    <ul class="pcoded-submenu">
							<?php
							$sql_sub = $db->link->query("SELECT * FROM `sub_menu` WHERE `status`='1' ");
							if($sql_sub)
							{
								while($showsub_menu = $sql_sub->fetch_assoc())
								{
									if($showmain_menu['id'] == $showsub_menu['main_menu'])
									{
										?>
										<li><a class="nav-link" href="<?php echo $showsub_menu['route_name']; ?>"><?php echo $showsub_menu['link_name']; ?></a></li>
										<?php
										}
									}
								}
								?>
					    </ul>
					</li>
					<?php
					}
				}
				?>
				<li class="nav-item pcoded-menu-caption">
						<label>Setting</label>
						<li class="nav-item">
					    <a href="../setting/setting.php" class="nav-link "><span class="pcoded-micon"><i class="fas fa-wrench"></i></span><span class="pcoded-mtext">Settings</span></a>
					</li>
					</li>
				</ul>

			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->