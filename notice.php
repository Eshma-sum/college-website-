<?php  
$pageTitle = "About-us";
include('includes/header.php'); 
?>

<div class="py-5">
    <div class="container">
        <h4 class="text-bold text-capitalize text-center">Notices</h4>
        <hr class="w-25 mx-auto">
    </div>
</div>

<div class="container">
    <div class="row">
    <?php
            $noticeQuery = "SELECT * FROM notices WHERE status='0'";
            $result = mysqli_query($conn,$noticeQuery);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {
                        ?>
                            <div class="card mb-3" style="max-width: 800px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <?php if($row['image'] != '') : ?>
                                            <img src = "<?=$row['image']; ?>" class="rounded w-100" alt="img">
                                        <?php else : ?>
                                            <img src = "assets\img\service1.jpg" class="rounded" alt="img">
                                        <?php endif; ?> 
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$row['name'];?></h5>
                                        <p class="card-text"><?=$row['description']?></p>
                                        <p class="card-text"><small class="text-body-secondary"><?= $row['date']?></small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        
                    }
                }
                else
                {
                    ?>
                        <div class="col-md-12">
                        <h5> No Services Available </h5>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                        <div class="col-md-12">
                        <h5> Something Went Wrong! </h5>
                        </div>
                    <?php
            }
        ?>

    </div>
</div>
<?php  include('includes/footer.php'); ?>