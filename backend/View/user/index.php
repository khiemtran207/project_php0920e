<style>
    .edit td,th{
        font-size: 0.85rem !important;
        padding: 20px 6px !important;
    }
</style>
<div class="main-controller">
    <div class="form-group">
        <h3>Tìm kiếm:</h3>
        <form action="" method="get">
            <label for="username">Nhập tên user:</label>
            <input type="text" id="username" name="username" class="form-control" style="margin-bottom: 15px">
            <input type="hidden" name="controller" value="user">
            <input type="hidden" name="action" value="index">
            <input type="submit" name="search" value="Search" class="btn btn-success">
            <a href="index.php?controller=user" class="btn btn-danger">Xóa Filter</a>
        </form>
    </div>
    <div class="form-group" style="margin-top: 20px">
        <h2 style="margin-bottom: 20px">Danh sách user:</h2>
        <a href="index.php?controller=user&action=create" class="btn btn-primary"><i class="fas fa-plus"></i>  Thêm mới</a>
    </div>
    <div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Jobs</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($select_all_pagination)): ?>
                    <?php foreach ($select_all_pagination as $item): ?>
                        <tr class="edit">
                            <td><?php echo $item['id']?></td>
                            <td><?php echo $item['username']?></td>
                            <td><?php echo $item['first_name'].' '.$item['last_name']?></td>
                            <td><?php echo $item['phone']?></td>
                            <td><?php echo $item['address']?></td>
                            <td><?php echo $item['email']?></td>
                            <td><img src="Assets/container_file/<?php echo $item['avatar']?>" alt=""></td>
                            <td><?php echo $item['jobs']?></td>
                            <td>
                                <a href="index.php?controller=user&action=detail&id=<?php echo $item['id'] ?>"
                                   title="Chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?controller=user&action=update&id=<?php echo $item['id'] ?>"
                                   title="Chi tiết">
                                    <i class="fas fa-wrench"></i>
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa thư mục này?')" href="index.php?controller=user&action=delete&id=<?php echo $item['id'] ?>"
                                   title="Chi tiết">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        <tr>
                            <td style="padding-left: 0" colspan="8"><?php echo $pagination_page?></td>
                        </tr>
                <?php else:echo "<tr><td colspan='8'>Not data</td></tr>"?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
