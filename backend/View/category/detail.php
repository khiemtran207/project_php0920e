<style>
    th,td{
        padding: 1rem 1rem;
    }
</style>
<div class="main-container">
    <div class="form-group">
        <h2>Chi tiết category: #<?php echo $select_id['id']?></h2>
    </div>
    <br>
    <div class="form-group">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th><?php echo $select_id['id']?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Name</th>
                <td><?php echo $select_id['name']?></td>
            </tr> <tr>
                <th>Avatar</th>
                <td>
                    <img src="Assets/container_file/<?php echo $select_id['avatar']?>" width="60px" height="60px" alt="">
                </td>
            </tr><tr>
                <th>Type</th>
                <td><?php echo $select_id['type']?></td>
            </tr> <tr>
                <th>Descripton</th>
                <td><?php echo $select_id['description']?></td>
            </tr> <tr>
                <th>Status</th>
                <td><?php echo $select_id['status']?></td>
            </tr> <tr>
                <th>Created_at</th>
                <td><?php echo $select_id['created_at']?></td>
            </tr> <tr>
                <th>Updated_at</th>
                <td><?php echo $select_id['updated_at']?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="from-group">
        <a href="index.php?controller=category" class="btn btn-danger">Back</a>
    </div>
</div>