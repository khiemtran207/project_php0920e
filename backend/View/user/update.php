
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <div class="form-group">
        <h2>Cập nhật tài khoản: #<?php echo $select_one['id']?></h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username: *</label>
            <input type="text" name="username" value="<?php echo $select_one['username'] ?>" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="first_name">First_name:</label>
            <input type="text" name="first_name"  value="<?php echo $select_one['first_name'] ?>" class="form-control" id="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Last_name:</label>
            <input type="text" name="last_name"  value="<?php echo $select_one['last_name'] ?>" class="form-control" id="last_name">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" name="phone"  value="<?php echo $select_one['phone'] ?>" class="form-control" id="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email"  value="<?php echo $select_one['email'] ?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address"  value="<?php echo $select_one['address'] ?>" class="form-control" id="address">
        </div>
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
            <img src="Assets/container_file/<?php echo $select_one['avatar'] ?>" alt="" height="80px" width="80px">
        </div>
        <div class="form-group">
            <label for="job">Jobs:</label>
            <input type="text" name="job"  value="<?php echo $select_one['jobs'] ?>" class="form-control" id="job">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" name="facebook"  value="<?php echo $select_one['facebook'] ?>" class="form-control" id="facebook">
        </div>
        <div class="form-group">
            <?php
            $selected_0 = "";
            $selected_1 = "";
            $selected_0 = ($select_one['status'] == 0)?"selected":$selected_1="selected";
            ?>
            <label for="status">Trạng thái:</label>
            <select name="status" id="status" class="form-control">
                <option value="0" <?php echo $selected_0 ?>>Active</option>
                <option value="1" <?php echo $selected_1 ?>>Disable</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="update" value="Save" class="btn btn-primary">
            <a href="index.php?controller=user" class="btn btn-secondary">Cancel</a>
        </div>

    </form>
</div>