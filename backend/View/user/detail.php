
<style>
    th,td{
        padding: 1rem 1rem;
    }
</style>
<div class="main-container">
    <div class="form-group">
        <h2>Chi tiết user: #<?php echo $select_one['id']?></h2>
    </div>
    <br>
    <div class="form-group">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo $select_one['id']?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>User name</th>
                    <td><?php echo $select_one['username']?></td>
                </tr> <tr>
                    <th>First name</th>
                    <td><?php echo $select_one['first_name']?></td>
                </tr> <tr>
                    <th>last name</th>
                    <td><?php echo $select_one['last_name']?></td>
                </tr> <tr>
                    <th>Phone</th>
                    <td><?php echo $select_one['phone']?></td>
                </tr> <tr>
                    <th>Address</th>
                    <td><?php echo $select_one['address']?></td>
                </tr> <tr>
                    <th>Email</th>
                    <td><?php echo $select_one['email']?></td>
                </tr> <tr>
                    <th>Avatar</th>
                    <td><img src="Assets/container_file/<?php echo $select_one['username']?>" alt=""></td>
                </tr> <tr>
                    <th>Jobs</th>
                    <td><?php echo $select_one['jobs']?></td>
                </tr> <tr>
                    <th>Last login</th>
                    <td><?php echo $select_one['last_login']?></td>
                </tr> <tr>
                    <th>status</th>
                    <?php $status = ($select_one['status'] == 0)?"Active":"Disable"?>
                    <td><?php echo $status?></td>
                </tr><tr>
                    <th>Created_at</th>
                    <td><?php echo $select_one['created_at']?></td>
                </tr><tr>
                    <th>Updated_at</th>
                    <td><?php echo $select_one['updated_at']?></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="index.php?controller=user" class="btn btn-secondary">Cancel</a></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>