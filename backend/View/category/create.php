
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h2 style="margin-bottom: 20px">Thêm mới danh mục:</h2>
            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" value="<?php echo (isset($_POST['name']))?$_POST['name']:""?>" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="avatar">Ảnh đại diện:</label>
            <input type="file" class="form-control" name="avatar" id="avatar">
        </div>
        <div class="form-group">
            <?php
                $checked_sp = "";
                $checked_tt = "";
                if(isset($_POST['type_category'])){
                    if($_POST['type_category'] == 0){
                        $checked_sp = "checked";
                    }else{
                        $checked_tt = "checked";
                    }
                }
            ?>
            <label for="type_category">Kiểu danh mục:</label><br>
            <table>
                <tr>
                    <td style="padding-right: 10px"><input type="radio"  value="0" name="type_category" <?php echo $checked_sp ?>> Sản phẩm</td>
                    <td><input type="radio" value="1" name="type_category"  <?php echo $checked_tt ?>>Tin tức</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <label for="mt">Mô tả:</label>
            <textarea name="description" id="mt"><?php echo (isset($_POST['description']))?$_POST['description']:""?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <?php
            $active = "";
            $disable = "";
                if(isset($_POST['status'])){
                    if($_POST['status'] == 0){
                        $active = "selected";
                    }else{
                        $disable = "selected";
                    }
                }
            ?>
            <select name="status" id="status" class="form-control">
                <option value="0" <?php echo $active?>>Active</option>
                <option value="1" <?php echo $disable?>>Disable</option>
            </select>
        </div>
        <input type="submit" name="create" value="Save" class="btn btn-primary">
        <a href="index.php?controller=category" class="btn btn-secondary">Cancel</a>
    </form>
</div>
