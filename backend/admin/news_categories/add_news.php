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
                            <h4 class="m-b-10">Add News</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../layouts/index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="add_sub_menu.php">Add News</a></li>
                        </ul>
                        <br>
                        <div class="links">
                            <a href="view_sub_menu.php" class="btn btn-info">View News</a>
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
                                    $categories = $_POST['categories']?$_POST['categories']:'';
                                    $publisher = $_POST['publisher']?$_POST['publisher']:'';
                                    $date = $_POST['date']?$_POST['date']:'';
                                    $title = $_POST['title']?$_POST['title']:'';
                                    $description = $_POST['description']?$_POST['description']:'';
                        
                                    $sql = $db->link->query("INSERT INTO `add_news`(`categories`, `publisher`, `date`, `title`, `description`) VALUES ('$categories','$publisher','$date','$title','$description')");
                                    if($sql)
                                    {
                                        echo "<div class='alert alert-success'>Data Insert Successfully</div>";
                                    }
                                    else
                                    {
                                        echo "<div class='alert alert-danger'>Data Insert Unsuccessfllly</div>";
                                    }
                                }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label>News Categories</label>
                                        <select name="categories" class="form-control select2">
                                            <option>Select One</option>
                                            <?php
                                            $main_menu = $db->link->query("SELECT * FROM `categories`");
                                            if($main_menu)
                                            {
                                                while($showmain_menu = $main_menu->fetch_assoc())
                                                {
                                                    ?>
                                                    <option value="<?php echo $showmain_menu['id']; ?>"><?php echo $showmain_menu['categories']; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Publisher</label>
                                        <select name="publisher" class="form-control select2">
                                            <option>Select One</option>
                                            <?php
                                            $main_menu = $db->link->query("SELECT * FROM `create_admin` ");
                                            if($main_menu)
                                            {
                                                while($showmain_menu = $main_menu->fetch_assoc())
                                                {
                                                    ?>
                                                    <option value="<?php echo $showmain_menu['id']; ?>"><?php echo $showmain_menu['username']; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control datepicker"  required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label> News Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>                                   
                                    <div class="form-group">
                                        <label>News</label>
                                        <textarea name="description" class="form-control summernote" id="summernote"></textarea>
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