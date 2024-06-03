<?php  
$pageTitle = "Thankyou";
include('includes/header.php'); 
?>
<div class="py-5 bg-color">
    <div class="container">
        <h4 class="text-success fw-bolder text-center">
            Thank you!
        </h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Thank you
                </h4>
                <div>
                    <?= alertMessage(); ?>
                </div>
            </div>
        </div>
    </div>
</div>





<?php  include('includes/footer.php'); ?>