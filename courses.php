<?php  
$pageTitle = "Courses";
include('includes/header.php'); ?>

    <section class="gradient-custom">
    <div class="container">
        <div class="row">
            
        <?php
            $courseQuery = "SELECT * FROM courses WHERE status='0'";
            $result = mysqli_query($conn,$courseQuery);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {
                        ?>
                           <div class="container">
                            <div class="col-md-6">
                            <h4 class="text-capitalize fw-bolder text-success pt-5">
                                <?=$row['name']?>
                            </h4>
                               
                            </div>
                           </div>
                            <hr class="container mx-auto text-light-grey">
                            <div class="p-5">
                                <button class="bg-color p-3">
                                <a href="<?=$row['file'];?>" class="text-capitalize text-success fw-bold">See file</a>
                                <!-- <a href="assets\file\bbs.pdf" class="text-capitalize text-info fw-bold">download file</a> -->
                                </button>
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
</section>

<?php  include('includes/footer.php'); ?>
