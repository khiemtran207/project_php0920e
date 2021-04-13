<div class="columns-container">
    <div id="columns" class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb_container">
            <div class="container">
                <div id="themejs-breadcrumb" class="breadcrumb clearfix titleFont">
                    <a class="home" href="trang-chu.html" title="Quay lại Trang chủ"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang Chủ</font></font></a>
                    <span class="navigation-pipe"><i class="icon-caret-right"></i></span>
                    <span class="navigation_page"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">	Xác thực</font></font></span>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div class="col-sm-6">
            <form action="" method="post">
                <label for="gender">Gender</label>
                <?php
                    $check_mr = "";
                    $check_mrs = "";
                    if(isset($_POST['gender'])){
                        if($_POST['gender'] == 0){
                            $check_mr = "checked";
                        }else{
                            $check_mrs = "checked";
                        }
                    }
                ?>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="radio" <?php echo $check_mr?> value="0" name="gender"><b>Mr.</b>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" <?php echo $check_mrs?> value="1" name="gender"><b>Mrs.</b>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="first_name">First name *</label>
                    <input type="text" id="first_name" value="<?php echo (isset($_POST['first_name']))?$_POST['first_name']:'';?>" name="first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name *</label>
                    <input type="text" value="<?php echo (isset($_POST['last_name']))?$_POST['last_name']:'';?>" id="last_name" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" value="<?php echo $_SESSION['email'] ?>" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" value="" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="birthday">Date of Birth</label>
                    <input type="date" value="<?php echo (isset($_POST['birthday']))?$_POST['birthday']:'';?>" name="birthday" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="Register" class="btn btn-success">
                </div>
            </form>
            </div>
        </div><!-- .row -->
    </div><!-- #columns -->
</div>