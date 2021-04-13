<?php
//    echo "<pre>";
// print_r($select_one_product);
//    echo "</pre>";
//?>
<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main-container">
    <div class="form-group">
        <h2>Cập nhật sản phẩm #<?php echo $select_one_product['id']?></h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="select_category">Chọn danh mục :</label>
            <select name="category_id" id="category_id" class="form-control">
                <?php foreach ($categorise as $category): ?>
                    <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="from-group">
            <label for="name_product">Nhập tên sản phẩm* :</label>
            <input type="text" name="name_product" value="<?php echo $select_one_product['title'] ;?>" class="form-control" id="name_product">
        </div>
        <div class="form-group">
            <label for="avatar">Ảnh đại diện :</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
            <img src="Assets/container_file/<?php echo $select_one_product['avatar'] ?>" width="90px" alt="ảnh đại diện">
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm* :</label>
            <input type="number" min="0" value="<?php echo $select_one_product['price']?>" name="price" class="form-control" id="price">
        </div>
        <div class="form-group">
            <label for="amount">Số lượng sản phẩm* :</label>
            <input type="number" value="<?php echo $select_one_product['amount'];?>" min="0" name="amount" class="form-control" id="amount">
        </div>
        <div class="form-group">
            <label for="summary">Mô tả ngắn về sản phẩm :</label>
            <textarea name="summary" id="summary" rows="5" class="form-control"><?php echo $select_one_product['summary'];?></textarea>
        </div>
        <div class="form-group">
            <label for="description">Mô tả chi tiết sản phẩm :</label>
            <textarea name="description" id="description" ><?php echo $select_one_product['content'] ;?></textarea>
        </div>
        <div class="form-group">
            <label for="seo_title">Seo title :</label>
            <input type="text" name="seo_title" value="<?php echo $select_one_product['seo_title'];?>" class="form-control" id="seo_title">
        </div>
        <div class="form-group">
            <label id="seo_description">Seo description :</label>
            <input type="text" name="seo_description" value="<?php echo $select_one_product['seo_description'] ;?>" id="seo_description" class="form-control">
        </div>
        <div class="form-group">
            <label for="seo_keywords">Seo keywords :</label>
            <input type="text" name="seo_keywords" value="<?php echo $select_one_product['seo_keywords'];?>" id="seo_keywords" class="form-control">
        </div>
        <div class="form-group">
            <?php
            $checked_0 = '';
            $checked_1 = '';
                if($select_one_product['status'] == 0){
                    $checked_0 = "selected";
                }else{
                    $checked_1 = "selected";
            }
            ?>
            <label for="status">Trạng thái :</label>
            <select name="status" id="status" class="form-control">
                <option value="0" <?php echo $checked_0?>>Active</option>
                <option value="1" <?php echo $checked_1?>>Disable</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Save" name="update" class="btn btn-primary">
            <a href="index.php?controller=product" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>