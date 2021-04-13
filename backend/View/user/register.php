
<style>
    .sub-main-w3 input[type="text"], .sub-main-w3 input[type="password"] {
        outline: none;
        font-size: .9em;
        padding: 1em 3em 1em 1em;
        border: none;
        margin-bottom: 0.3em;
        background: rgba(255, 255, 255, 0.85);
        width: 82%;
        color: #000;
        border-radius: 30px;
        font-weight: 400;
        font-family: 'Open Sans', sans-serif;
        letter-spacing: 1px;
    }
    .error {
        padding: 20px 0;
        background: rgb(239 89 89 / 84%);
        margin-bottom: 20px;
        border-radius: 19px;
        color: #e6e6e6;
    }
</style>
<div class="header-w3l">
    <h1>Đăng kí tài khoản</h1>
</div>
<!--//header-->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <div class="wthree-pro">
            <h2>Form register</h2>
            <?php if(isset($this->error)): ?>
                <div class="error">
                    <?php echo $this->error?>
                </div>
            <?php endif;?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="error">
                    <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
                </div>
            <?php endif;?>
        </div>
        <form action="" method="post">
            <div class="pom-agile">
                <input placeholder="Username" name="username" value="<?php echo (isset($_POST['username']))?$_POST['username']:''?>" class="user" type="text" required="">
                <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <div class="pom-agile">
                <input  placeholder="Password" name="password" value="<?php echo (isset($_POST['password']))?$_POST['password']:''?>" class="pass" id="password" type="password" required="">
                <span class="icon2"><i id="show" class="fa fa-unlock" aria-hidden="true"></i></span>
            </div>
            <div class="pom-agile">
                <input  placeholder="Confirm password" id="password_confirm" value="<?php echo (isset($_POST['password_confirm']))?$_POST['password_confirm']:''?>" name="password_confirm" class="pass" type="password" required="">
<!--                <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>-->
            </div>
            <div class="sub-w3l">
                <p style="
    color: #e5e5e5;
    font-size: 13px;
    text-align: left; padding-left: 10px

">Đã có tài khoản, <a style="color: #fbe232; text-decoration: underline" href="index.php?controller=login&action=login">đăng nhập</a> ngay !</p>
                <div class="right-w3l">
                    <input type="submit" name="register" value="Register">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    window.onload =function (){
        var x = true;
        document.getElementById('show').addEventListener('click',function (){
            if(x){
                document.getElementById('password').type ="text";
                document.getElementById('password_confirm').type ="text";
                x = false;
            }else{
                document.getElementById('password').type ="password";
                document.getElementById('password_confirm').type ="password";
                x = true;
            }
            event.preventDefault();
        })
    }
</script>