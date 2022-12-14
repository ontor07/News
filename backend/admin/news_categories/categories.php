<?php 
include('../layouts/header.php');
include('../layouts/sidebar.php'); 
?>
<!-- Start app main Content -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Add Categories</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_main_menu.php">Web Settings</a></li>
                        </ul>
                        <br>
                        
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
                            <div class="form-section">
                            <?php
                              if(isset($_POST['save']))
                              {
                                $class = $_POST['class'];
                                $db->insert('categories',['categories'=>$class]);
                              
                              }
                              ?>
                              <form method="POST" enctype="multipart/form-data">
                              <h6>Add Categories</h6>
                                  <div class="input-single-box">
                                      <label>Categories</label>
                                      <input type="text" name="class" class="form-control" value="" required >
                                  </div>
                                  <div class="input-single-box mt-4" style="text-align: center;">
                                      <input type="submit" name="save"
                                      class="btn btn-success" id="save">
                                  </div>
                              </form>  
                            </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->
        <?php
                $sql=$db->link->query("SELECT * FROM `categories`");
                if (mysqli_num_rows($sql) > 0) 
                {
            ?>
             <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Categories</h5>
                     
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>sl</th>
                                        <th>Categories</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                            $sql = $db->link->query("SELECT * FROM `categories`");
                            if($sql)
                            { 
                              $sl=1;
                                while ($showdata = $sql->fetch_array()) 
                                {
                                ?>
                                <tr>
                                <td>
                                    <?php echo $sl++ ?>
                            </td>
                                    <td><?php echo $showdata['1']; ?></td>
                                    <td>
                                       <a href="categories_edit.php?id=<?php echo $showdata['0']; ?>" class="btn btn-outline-info">Edit</a>
                                       <a href="delete_categories.php?id=<?php echo $showdata['0']; ?>" class="btn btn-outline-danger">Delete</a>
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
                    <?php
                      }
                    ?>
                </div>
            </div>
            <!-- [ stiped-table ] end --> 

    </div>
</section>
<?php include('../layouts/footer.php'); ?>