<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Gallery 
                    <a href="gallery.php" class="btn btn-danger float-end">Back</a>
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

                    $gallery = getById('gallery',$paramResult);
                    if($gallery)
                    {
                        if($gallery['status']== 200)
                        {
                            ?>
                            <input type="hidden" name="galleryId" value="<?= $gallery['data']['id'];?>">
                                <div class="mb-3">
                                    <label>Image Name</label>
                                    <input type="text" name="name" value="<?= $gallery['data']['name'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="<?='../' . $gallery['data']['image'] ;?>" alt = "img" style="width: 70px; height: 70px;"/>
                                </div>

                                <div class="mb-3">
                                    <label>Status(checked=hidden, un-checked=visible)</label>
                                    <br/>
                                    <input type="checkbox" name="status" <?= $gallery['data']['status'] == 1 ? 'checked':'' ;?> style="width:30px; height:30px;">
                                </div>
                                
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updateImage" class="btn btn-info">Update gallery</button>
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