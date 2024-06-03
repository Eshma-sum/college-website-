<?php

include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Notice 
                    <a href="notices.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage();  ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="mb-3">
                    <label>Created At</label>
                    <input type="date" name="date" value="<?= $notices['data']['date'];?>" required class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" required class="form-control mySummernote" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Upload Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="<?='../'.$notices['data']['image'];?>" alt = "img" style="width: 70px; height: 70px;"/>
                </div>

                <div class="mb-3">
                    <label>Status(checked=hidden, un-checked=visible)</label>
                    <br/>
                    <input type="checkbox" name="status" style="width:30px; height:30px;">
                </div>
                
                <div class="mb-3 text-end">
                    <button type="submit" name="saveNotices" class="btn btn-info">Save Notice</button>
                </div>
               
            </form>

            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>