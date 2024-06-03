<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Infos 
                    <a href="infos.php" class="btn btn-danger float-end">Back</a>
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

                    $info = getById('infos',$paramResult);
                    if($info)
                    {
                        if($info['status']== 200)
                        {
                            ?>
                            <input type="hidden" name="infoId" value="<?= $info['data']['id'];?>">
                                <div class="mb-3">
                                    <label>Highlight</label>
                                    <input type="text" name="name" value="<?= $info['data']['name'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="small_description" required class="form-control mySummernote" rows="3"><?= $info['data']['small_description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Upload Video</label>
                                    <input type="file" name="media" class="form-control" accept="image/*, video/*">

                                    <?php
                                        $media_path = '../' . $info['data']['media'];
                                        $media_extension = pathinfo($media_path, PATHINFO_EXTENSION);
                                        if (in_array($media_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                            // If it's an image, display as image
                                            echo '<img src="' . $media_path . '" alt="Media" style="width: 70px; height: 70px;">';
                                        } elseif (in_array($media_extension, ['mp4', 'webm', 'ogg'])) {
                                            // If it's a video, display as video
                                            echo '<video width="70" height="70" controls muted loop>';
                                            echo '<source src="' . $media_path . '" type="video/' . $media_extension . '">';
                                            echo 'Your browser does not support the video tag.';
                                            echo '</video>';
                                        } else {
                                            echo 'Invalid file type';
                                        }
                                    ?>
                                </div>

                                <h5>SEO Tags</h5>
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="<?= $info['data']['meta_title'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"><?= $info['data']['meta_description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3"><?= $info['data']['meta_keyword'];?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Status(checked=hidden, un-checked=visible)</label>
                                    <br/>
                                    <input type="checkbox" name="status" <?= $info['data']['status'] == 1 ? 'checked':'' ;?> style="width:30px; height:30px;">
                                </div>
                                
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updateInfo" class="btn btn-info">Update Info</button>
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