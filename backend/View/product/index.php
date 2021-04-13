<style>
    .form-group {
        margin: 20px 0;
    }
</style>
<div class="main_container">
    <div class="form-group">
        <h3>Tìm kiếm:</h3>
        <form action="" method="get">
            <div class="form-group">
                <label for="product_name">Nhập tên sản phẩm:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" style="margin-bottom: 15px">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="index">
                <label for="category">Chọn danh mục :</label>
                <select name="category_id" id="category_id" class="form-control">
                    <?php foreach ($select_category as $category): ?>
                        <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="search" value="Search" class="btn btn-success">
                <a href="index.php?controller=product" class="btn btn-danger">Xóa Filter</a>
            </div>
        </form>
    </div>
    <div class="form-group" style="margin-top: 20px">
        <h2 style="margin-bottom: 20px">Danh sách sản phẩm:</h2>
    </div>
    <div class="form-group">
        <a href="index.php?controller=product&action=create" class="btn btn-primary"><i class="fas fa-plus"></i>  Thêm mới</a>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Category name</th>
                <th>Title</th>
                <th>Avatar</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($select_Pagination)): ?>
                <?php foreach ($select_Pagination as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['category_name'] ?></td>
                        <td><?php echo $item['title'] ?></td>
                        <td>
                            <img src="Assets/container_file/<?php echo $item['avatar']?>" alt="">
                        </td>
                        <?php
                        $status = ($item['status'] == 0)?"Active":"Disable";
                        ?>
                        <td><?php echo $item['price'] ?></td>
                        <td><?php echo $item['amount'] ?></td>
                        <td><?php echo $status ?></td>
                        <td><?php echo date("Y/m/d",strtotime($item['created_at'])); ?></td>
                        <td><?php echo (!empty( $item['updated_at']))?date("Y/m/d",strtotime($item['updated_at'])):''?></td>
                        <td>
                            <a href="index.php?controller=product&action=detail&id=<?php echo $item['id'] ?>"
                               title="Chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="index.php?controller=product&action=update&id=<?php echo $item['id'] ?>"
                               title="Chi tiết">
                                <i class="fas fa-wrench"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa thư mục này?')" href="index.php?controller=product&action=delete&id=<?php echo $item['id'] ?>"
                               title="Chi tiết">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="9" style="padding-left:0; padding-bottom: 0"><?php echo $pagination_page?></td>
                </tr>
            <?php else:echo "<tr><td colspan='8'>Not data</td></tr>"?>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

