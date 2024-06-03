<?php
include('includes/header.php');
?>
<div class="row">
    <div class="col-md-12">
        <?=  alertMessage(); ?>
    </div>
        <div class="col-md-3 mb-4">           
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Enquiries</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('contact') ?>
                    </h5>
                </div>
        </div>
        <div class="col-md-3 mb-4">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total users</p>
                    <h5 class="font-weight-bolder mb-0">
                        <?= getCount('users')?>
                    </h5>
                </div>
        </div>
        <div class="col-md-3 mb-4">           
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today Enquiries</p>
                    <h5 class="font-weight-bolder mb-0">
                       <?php
                       $today_date= date('Y-m-d');
                       $query = "SELECT * FROM contact WHERE created_at='$today_date' ";
                       $result = mysqli_query($conn,$query);
                       $totalcount= mysqli_num_rows($result);
                       echo $totalcount;
                    ?>
                    </h5>
                </div>
        </div>
        <!-- <div class="col-md-3 mb-4">
                <div class="card card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">To</p>
                    <h5 class="font-weight-bolder mb-0">
                        2
                    </h5>
                </div>
        </div> -->
</div>

<?php
include('includes/footer.php');
?>