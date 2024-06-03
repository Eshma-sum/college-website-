<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Course
                    <a href="course.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <!-- <div class="mb-3">
                    <label>Description</label>
                    <textarea name="small_description" required class="form-control" rows="3"></textarea>
                </div> -->
                <div class="mb-3">
                    <label>Upload File</label>
                    <input type="file" name="file" required class="form-control">
                </div>
                <!-- <div class="mb-3">
                    <label>Upload Syllabus Image</label>
                    <input type="file" name="syllabus" class="form-control" accept="image/*, video/*">
                </div>
                <div class="mb-3">
                    <label>Upload Fee Image</label>
                    <input type="file" name="fee" class="form-control" accept="image/*, video/*">
                </div>

                <h5>SEO Tags</h5>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" required class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                </div> -->

                <div class="mb-3">
                    <label>Status(checked=hidden, un-checked=visible)</label>
                    <br/>
                    <input type="checkbox" name="status" style="width:30px; height:30px;">
                </div>
                
                <div class="mb-3 text-end">
                    <button type="submit" name="saveCourse" class="btn btn-info">Save Course</button>
                </div>
               
            </form>

            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>