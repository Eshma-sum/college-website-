<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Courses 
                    <a href="course.php" class="btn btn-danger float-end">Back</a>
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

                    $course = getById('courses',$paramResult);
                    if($course)
                    {
                        if($course['status']== 200)
                        {
                            ?>
                            <input type="hidden" name="courseId" value="<?= $course['data']['id'];?>">
                                <div class="mb-3">
                                    <label>Course Name</label>
                                    <input type="text" name="name" value="<?= $course['data']['name'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Upload File</label>
                                    <input type="file" name="file" required class="form-control">
                                    <!-- <img src="<?='../' . $course['data']['file'] ;?>" alt = "img" style="width: 70px; height: 70px;"/> -->
                                </div>
                                <!-- <div class="mb-3">
                                    <label>Upload Syllabus Image</label>
                                    <input type="file" name="syllabus" class="form-control">
                                    <img src="<?='../' . $course['data']['syllabus'] ;?>" alt = "img" style="width: 70px; height: 70px;"/>
                                </div>
                                <div class="mb-3">
                                    <label>Upload Fee Image</label>
                                    <input type="file" name="fee" class="form-control">
                                    <img src="<?='../' . $course['data']['fee'] ;?>" alt = "img" style="width: 70px; height: 70px;"/>
                                </div>

                                <h5>SEO Tags</h5>
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="<?= $course['data']['meta_title'];?>" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"><?= $course['data']['meta_description'];?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3"><?= $course['data']['meta_keyword'];?></textarea>
                                </div> -->

                                <div class="mb-3">
                                    <label>Status(checked=hidden, un-checked=visible)</label>
                                    <br/>
                                    <input type="checkbox" name="status" <?= $course['data']['status'] == 1 ? 'checked':'' ;?> style="width:30px; height:30px;">
                                </div>
                                
                                <div class="mb-3 text-end">
                                    <button type="submit" name="updateCourse" class="btn btn-info">Update course</button>
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