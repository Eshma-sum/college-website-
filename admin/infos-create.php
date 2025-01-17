<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Infos 
                    <a href="infos.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Highlight</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="small_description" required class="form-control mySummernote" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Upload Video</label>
                    <input type="file" name="media" class="form-control" accept="image/*, video/*">
                    <!-- <input type="file" name="image" class="form-control"> -->
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
                </div>

                <div class="mb-3">
                    <label>Status(checked=hidden, un-checked=visible)</label>
                    <br/>
                    <input type="checkbox" name="status" style="width:30px; height:30px;">
                </div>
                
                <div class="mb-3 text-end">
                    <button type="submit" name="saveInfo" class="btn btn-info">Save Info</button>
                </div>
               
            </form>

            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>