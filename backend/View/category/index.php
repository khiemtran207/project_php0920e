
<div class="main_container">
    <div class="form-group">
        <h3>Tìm kiếm:</h3>
        <form action="" method="get">
            <label for="category_name">Nhập tên danh mục:</label>
            <input type="text" id="category_name" name="category_name" class="form-control" style="margin-bottom: 15px">
            <input type="hidden" name="controller" value="category">
            <input type="hidden" name="action" value="index">
            <input type="submit" name="search" value="Search" class="btn btn-success">
            <a href="index.php?controller=category" class="btn btn-danger">Xóa Filter</a>
        </form>
    </div>
    <div class="form-group" style="margin-top: 20px">
        <h2 style="margin-bottom: 20px">Danh sách danh mục:</h2>
    </div>
    <div class="form-group">
        <a href="index.php?controller=category&action=create" class="btn btn-primary"><i class="fas fa-plus"></i>  Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Type Category</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Create_at</th>
                    <th>Update_at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($select_pagination)): ?>
                <?php foreach ($select_pagination as $item): ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td>
                        <img src="Assets/container_file/<?php echo $item['avatar']?>" alt="">
                    </td>
                    <?php
                        $type_category = ($item['type']==0)?"Sản phẩm":"Tin tức";
                        $status = ($item['status'] == 0)?"Active":"Disable";
                    ?>
                    <td><?php echo $type_category ?></td>
                    <td><?php echo $item['description'] ?></td>
                    <td><?php echo $status ?></td>
                    <td><?php echo date("Y/m/d",strtotime($item['created_at'])); ?></td>
                    <td><?php echo (!empty( $item['updated_at']))?date("Y/m/d",strtotime($item['updated_at'])):''?></td>
                    <td>
                        <a href="index.php?controller=category&action=detail&id=<?php echo $item['id'] ?>"
                           title="Chi tiết">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="index.php?controller=category&action=update&id=<?php echo $item['id'] ?>"
                           title="Chi tiết">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa thư mục này?')" href="index.php?controller=category&action=delete&id=<?php echo $item['id'] ?>"
                           title="Chi tiết">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="9" style="padding-left:0; padding-bottom: 0"><?php echo $pagination?></td>
                </tr>
                <?php else:echo "<tr><td colspan='8'>Not data</td></tr>"?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
