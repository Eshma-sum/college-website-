<?php
include('includes/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h4>
                        About-us Page Settings
                    </h4>
                </div>
                <div class="card-body">

                <?= alertMessage(); ?>
                    <form action="code.php" method="POST">

                    <?php
                    $aboutUs= getById('about_us',1);
                    ?>
                    <input type="hidden" name="aboutId" value="<?= $aboutUs['data']['id'] ?? 'insert' ?>" />

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="<?= $aboutUs['data']['title'] ?? "" ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>URL / Domain</label>
                        <input type="text" name="slug" value="<?= $aboutUs['data']['slug'] ?? "" ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description 1</label>
                        <textarea type="text" name="description1" class="form-control mySummernote">
                        <?= $aboutUs['data']['description1'] ?? "" ?>
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label>Description 2</label>
                        <textarea type="text" name="description2" class="form-control mySummernote">
                        <?= $aboutUs['data']['description2'] ?? "" ?>
                        </textarea>
                    </div>

                    <h4 class="my-3">SEO Settings</h4>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3"><?= $aboutUs['data']['meta_description'] ?? "" ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"><?= $aboutUs['data']['meta_keyword'] ?? "" ?></textarea>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" name="saveAbout" class="btn bg-gradient-info">Save</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>