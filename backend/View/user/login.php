
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
    <h1>Đăng nhập hệ thống</h1>
</div>
<div class="main-content-agile">
    <div class="sub-main-w3">
        <div class="wthree-pro">
            <h2>Form login</h2>
            <?php if(isset($this->error)): ?>
                <div class="error">
                    <?php echo $this->error?>
                </div>
            <?php endif;?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="error" style="background: rgb(96 197 43 / 70%);">
                    <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
                </div>
            <?php elseif (isset($_SESSION['error'])): ?>
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
                <input  placeholder="Password" id="password" name="password" value="<?php echo (isset($_POST['password']))?$_POST['password']:''?>" class="pass" type="password" required="">
                <span class="icon2"><i style="cursor: pointer" class="fa fa-unlock" id="show" aria-hidden="true"></i></span>
            </div>
            <div class="sub-w3l">
                <p style="
    color: #e5e5e5;
    font-size: 13px;
    text-align: left; padding-left: 10px

">Chưa có tài khoản, <a style="color: #fbe232; text-decoration: underline" href="index.php?controller=login&action=register">đăng kí</a> ngay !</p>
                <div class="right-w3l">
                    <input type="submit" name="login" value="login">
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
                x = false;
            }else{
                document.getElementById('password').type ="password";
                x = true;
                 document.getElementById('show').classList.remove("fa fa-unlock");
                document.getElementById('show').classList.add("fas fa-lock");
            }
            event.preventDefault();
        })
    }
</script>