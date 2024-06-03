<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

                <form action="code.php" method="POST">

                    <?php
                        $paramResult = checkParamId('id');
                        if(!is_numeric($paramResult))
                        {
                            echo '<h5>'.$paramResult.'</h5>';
                            return false;
                        }

                        $user = getById('users',$paramResult);
                        if($user['status'] == 200)
                        {
                            ?>

                                <input type="hidden" name="userId"  value="<?= $user['data']['id'] ;?>" required>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name"  value="<?= $user['data']['name'] ;?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone No.</label>
                                            <input type="text" name="phone" value="<?= $user['data']['phone'] ;?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?= $user['data']['email'] ;?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" value="<?= $user['data']['password'] ;?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Select Role</label>
                                            <select name="role" required class="form-select">
                                                <option value="">Select Role</option>
                                                <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected':'' ;?> >Admin</option>
                                                <option value="user" <?= $user['data']['role'] == 'user' ? 'selected':'' ;?>  >User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Is Ban</label>
                                            </br>
                                            <input type="checkbox" name="is_ban" <?= $user['data']['is_ban'] == true ? 'checked':'' ;?> style="width:30px;height:30px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 text-end">
                                            <br/>
                                            <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        else
                        {
                            echo '<h5>'.$user['message'].'</h5>';
                        }
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>




<?php
include('includes/footer.php');
?>