
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main-container">
    <div class="form-group">
        <h2>Thêm mới sản phẩm</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="select_category">Chọn danh mục :</label>
        <select name="category_id" id="category_id" class="form-control">
            <?php foreach ($select_all_category as $category): ?>
                <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="from-group">
        <label for="name_product">Nhập tên sản phẩm* :</label>
        <input type="text" name="name_product" value="<?php echo (isset($_POST['name_product']))?$_POST['name_product']:'';?>" class="form-control" id="name_product">
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện :</label>
        <input type="file" name="avatar" class="form-control" id="avatar">
    </div>
    <div class="form-group">
        <label for="price">Giá sản phẩm* :</label>
        <input type="number" min="0" value="<?php echo (isset($_POST['price']))?$_POST['price']:'';?>" name="price" class="form-control" id="price">
    </div>
    <div class="form-group">
        <label for="amount">Số lượng sản phẩm* :</label>
        <input type="number" value="<?php echo (isset($_POST['amount']))?$_POST['amount']:'';?>" min="0" name="amount" class="form-control" id="amount">
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn về sản phẩm :</label>
        <textarea name="summary" id="summary" rows="5" class="form-control"><?php echo (isset($_POST['summary']))?$_POST['summary']:'';?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả chi tiết sản phẩm :</label>
        <textarea name="description" id="control" ><?php echo (isset($_POST['description']))?$_POST['description']:'';?></textarea>
    </div>
    <div class="form-group">
        <label for="seo_title">Seo title :</label>
        <input type="text" name="seo_title" value="<?php echo (isset($_POST['seo_title']))?$_POST['seo_title']:'';?>" class="form-control" id="seo_title">
    </div>
    <div class="form-group">
        <label id="seo_description">Seo description :</label>
        <input type="text" name="seo_description" value="<?php echo (isset($_POST['seo_description']))?$_POST['seo_description']:'';?>" id="seo_description" class="form-control">
    </div>
    <div class="form-group">
        <label for="seo_keywords">Seo keywords :</label>
        <input type="text" name="seo_keywords" value="<?php echo (isset($_POST['seo_keywords']))?$_POST['seo_keywords']:'';?>" id="seo_keywords" class="form-control">
    </div>
    <div class="form-group">
        <?php
        $checked_0 = '';
        $checked_1 = '';
            if(isset($_POST['status'])){
                if($_POST['status'] == 0){
                    $checked_0 = "selected";
                }else{
                    $checked_1 = "selected";
                }
            }
        ?>
        <label for="status">Trạng thái :</label>
        <select name="status" id="status" class="form-control">
            <option value="0" <?php echo $checked_0?>>Active</option>
            <option value="1" <?php echo $checked_1?>>Disable</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Save" name="create" class="btn btn-primary">
        <a href="index.php?controller=product" class="btn btn-secondary">Cancel</a>
    </div>
    </form>
</div>