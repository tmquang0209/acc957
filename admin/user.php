<?php

require('../system/function.php');
require('head.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<?php
if(isset($_GET['username'])){ 
$data = $db->query("SELECT * FROM `user` WHERE `username` = '".$_GET['username']."'")->fetch();
    if(isset($_POST['submit'])){
        $amount = (int)$_POST['admount'];
        $admin = (int)$_POST['admin'];
        $ban = (int)$_POST['ban'];

        $is_admin = array(0,1,9);
        $is_ban = array(0,1);

        if(in_array($admin,$is_admin, true)){
            if(in_array($ban,$is_ban, true)){
                if($data['username'] != null){
                $db->exec("UPDATE `user` SET `cash` = '.$amount.', `admin` = '$admin', `ban` = '.$ban.' WHERE `username` = '".$_GET['username']."'");
                header('Location: user.php');
                }else{ echo '<div class="alert alert-danger" role="alert">User not exists!</div>'; }
            }else{ header("Location: https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A1o_%C4%91%E1%BB%A9c"); }
        }else{ header("Location: https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A1o_%C4%91%E1%BB%A9c"); }
    }
?>

<div class="card shadow mb-4">
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary">Action</h6>
 </div>
 <div class="card-body">
 <form method="post">
 <div class="">
 <label>Amount</label>
 <input type="number" name="amount" class="form-control" value="<?=data_user('cash');?>"/>
 </div>

 <div class="">
 <label>Admin</label>
 <select class="form-control" name="admin">
        <option value="0" <?php if(admin() == 'User'){ echo 'selected'; } ?>>User</option>
        <option value="1" <?php if(admin() == 'Collaborators'){ echo 'selected'; } ?>>Collaborators</option>
        <option value="9" <?php if(admin() == 'Admin'){ echo 'selected'; } ?>>Admin</option>
 </select>
 </div>

 <div class="">
 <label>Admin</label>
 <select class="form-control" name="ban">
        <option value="0" <?php if(ban() == 'Active'){ echo 'selected'; } ?>>Active</option>
        <option value="1" <?php if(ban() == 'Inactive'){ echo 'selected'; } ?>>Inactive</option>
 </select>
 </div>

<input type="submit" name="submit" class="btn btn-primary mr-2"/>

 </form>
 </div></div>  
<?php } ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users</h1>
<p class="mb-4">Member information management.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of users in the site</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Cash</th>
                        <th>Admin</th>
                        <th>Ban</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Cash</th>
                        <th>Admin</th>
                        <th>Ban</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </tfoot>
                <tbody>
<?php
$table = $db->query("SELECT * FROM `user`");
foreach($table as $data){
?>
                    <tr>
                        <td><?=$data['id'];?></td>
                        <td><?=$data['username'];?></td>
                        <td><?=$data['cash'];?></td>
                        <td><?=admin();?></td>
                        <td><?=ban();?></td>
                        <td><?=$data['date'];?></td>
                        <td><a href="?username=<?=data_user('username');?>" class="btn btn-danger mr-2">Edit</a>
                                    </div></td>
                    </tr>
 <?php } ?>                   
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require('foot.php');
?>