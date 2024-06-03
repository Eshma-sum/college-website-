<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Services 
                    <a href="services.php" class="btn btn-danger float-end">Back</a>
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

                    $service = getById('services',$paramResult);
                    if($service)
                    {
                        if($service['status']== 200)
                        {
                            ?>
                            <input type="hidden" name="serviceId" value="<?= $service['data']['id'];?>">
                                <div class="mb-3">
                                    <label>Service Name</label>
                                    <input type="text" name="name" value="<?= $service['data']['name']?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Small Description</label>
                                    <textarea name="small_description" required class="form-control" rows="3"><?= $service['data']['small_description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Upload Service Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="<?='../'.$service['data']['image'];?>" alt = "img" style="width: 70px; height: 70px;"/>
                                </div>

                                <h5>SEO Tags</h5>
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="<?= $service['data']['meta_title'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"><?= $service['data']['meta_description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3"><?= $service['data']['meta_keyword'];?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Status(checked=hidden, un-checked=visible)</label>
                                    <br/>
                                    <input type="checkbox" name="status" <?= $service['data']['status'] == 1 ? 'checked':'' ;?> style="width:30px; height:30px;">
                                </div>
                                
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updateService" class="btn btn-info">Update Service</button>
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