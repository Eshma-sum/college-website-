<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Notices 
                    <a href="notices.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">
            <?php
                    $paramResult = checkParamId('id');
                    if(!is_numeric($paramResult))
                    {
                        echo '<h5>'.$paramResult.'</h5>';
                        return false;
                    }

                    $notices = getById('notices',$paramResult);
                    if($notices)
                    {
                        if($notices['status']== 200)
                        {
                            ?>
                            <input type="hidden" name="noticeId" value="<?= $notices['data']['id'];?>">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="name" value="<?= $notices['data']['name'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Created At</label>
                                    <input type="date" name="date" value="<?= $notices['data']['date'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" required class="form-control mySummernote" rows="3"><?= $notices['data']['description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Upload Image</label>                                    
                                    <input type="file" name="image" required class="form-control">
                                    <img src="<?='../'.$notices['data']['image'];?>" alt = "img" style="width: 70px; height: 70px;"/>
                                </div>

                                <div class="mb-3">
                                    <label>Status(checked=hidden, un-checked=visible)</label>
                                    <br/>
                                    <input type="checkbox" name="status" <?= $notices['data']['status'] == 1 ? 'checked':'' ;?> style="width:30px; height:30px;">
                                </div>
                                
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updatenotices" class="btn btn-info">Update notices</button>
                                </div>
                            <?php
                        }
                        else
                        {
                            echo "<h5>No such data found!</h5>";
                        }
                    }
                    else
                    {
                        echo "<h5>Something went wrong!</h5>";
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