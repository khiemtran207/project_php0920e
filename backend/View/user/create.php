
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <div class="form-group">
        <h2>Thêm mới tài khoản:</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username: *</label>
            <input type="text" name="username" value="<?php echo (isset($_POST['username']))?$_POST['username']:'' ?>" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password: *</label>
            <input type="password" name="password"  value="<?php echo (isset($_POST['password']))?$_POST['password']:'' ?>" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirm">Nhập lại Password: *</label>
            <input type="password" name="password_confirm"  value="<?php echo (isset($_POST['password_confirm']))?$_POST['password_confirm']:'' ?>" class="form-control" id="password_confirm">
        </div>
        <div class="form-group">
            <label for="first_name">First_name:</label>
            <input type="text" name="first_name"  value="<?php echo (isset($_POST['first_name']))?$_POST['first_name']:'' ?>" class="form-control" id="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Last_name:</label>
            <input type="text" name="last_name"  value="<?php echo (isset($_POST['last_name']))?$_POST['last_name']:'' ?>" class="form-control" id="last_name">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" name="phone"  value="<?php echo (isset($_POST['phone']))?$_POST['phone']:'' ?>" class="form-control" id="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email"  value="<?php echo (isset($_POST['email']))?$_POST['email']:'' ?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address"  value="<?php echo (isset($_POST['address']))?$_POST['address']:'' ?>" class="form-control" id="address">
        </div>
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
        </div>
        <div class="form-group">
            <label for="job">Jobs:</label>
            <input type="text" name="job"  value="<?php echo (isset($_POST['job']))?$_POST['job']:'' ?>" class="form-control" id="job">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" name="facebook"  value="<?php echo (isset($_POST['facebook']))?$_POST['facebook']:'' ?>" class="form-control" id="facebook">
        </div>
        <div class="form-group">
            <?php
            $selected_0 = "";
            $selected_1 = "";
            $selected_0 = (isset($_POST['status']) && $_POST['status'] == 0)?"selected":$selected_1="selected";
            ?>
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control">
                <option value="0" <?php echo $selected_0 ?>>Active</option>
                <option value="1" <?php echo $selected_1 ?>>Disable</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="create" value="Save" class="btn btn-primary">
            <a href="index.php?controller=user" class="btn btn-secondary">Cancel</a>
        </div>

    </form>
</div>