<div class="columns-container">
    <div id="columns" class="container">

        <!-- Breadcrumb -->
        <div class="breadcrumb_container">
            <div class="container">
                <div id="themejs-breadcrumb" class="breadcrumb clearfix titleFont">
                    <a class="home" href="trang-chu.html" title="Quay lại Trang chủ"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang Chủ</font></font></a>
                    <span class=""><i class="fas fa-chevron-circle-right"></i></span>
                    <span class="navigation_page"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">	Xác thực</font></font></span>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <h1 class="page-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xác thực</font></font></h1>


                <!---->
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <form action="" method="post" id="create-account_form" class="box">
                            <h3 class="page-subheading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tạo một tài khoản</font></font></h3>
                            <div class="form_content clearfix">
                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui lòng nhập địa chỉ email của bạn để tạo một tài khoản.</font></font></p>
                                <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                                <div class="form-group">
                                    <label for="email_create"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ email</font></font></label>
                                    <input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="">
                                </div>
                                <div class="submit">
                                    <input type="submit" name="register" value="Tạo một tài khoản" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <form action="" method="post" id="login_form" class="box">
                            <h3 class="page-subheading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đã đăng ký?</font></font></h3>
                            <div class="form_content clearfix">
                                <div class="form-group">
                                    <label for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Địa chỉ email</font></font></label>
                                    <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="">
                                </div>
                                <div class="form-group">
                                    <label for="passwd"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mật khẩu</font></font></label>
                                    <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="password" value="">
                                </div>
                                <p class="lost_password form-group"><a href="" title="Khôi phục mật khẩu đã quên" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quên mật khẩu?</font></font></a></p>
                                <p class="submit">
                                    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div>