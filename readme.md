



<script>
    // Get the container element
    const backgroundContainer = document.querySelector('.background-container');

    // Check if the media is available and set the background
    <?php if($row['media'] != '') : ?>
        <?php $fileExtension = pathinfo($row['media'], PATHINFO_EXTENSION); ?>
        <?php if (in_array($fileExtension, ['mp4', 'webm', 'ogg'])) : ?>
            // If media is a video
            backgroundContainer.style.background = "url('<?= $row['media']; ?>')";
            backgroundContainer.style.backgroundSize = "cover";
            backgroundContainer.style.backgroundPosition = "center";
            backgroundContainer.style.opacity = "0.5"; // Adjust opacity as needed
        <?php else : ?>
            // If media is an image
            backgroundContainer.style.background = "url('<?= $row['media']; ?>')";
            backgroundContainer.style.backgroundSize = "cover";
            backgroundContainer.style.backgroundPosition = "center";
            backgroundContainer.style.opacity = "0.5"; // Adjust opacity as needed
        <?php endif; ?>
    <?php else : ?>
        // If media is not available, use a default image
        backgroundContainer.style.background = "url('assets/img/default-background.jpg')";
        backgroundContainer.style.backgroundSize = "cover";
        backgroundContainer.style.backgroundPosition = "center";
        backgroundContainer.style.opacity = "0.5"; // Adjust opacity as needed
    <?php endif; ?>
</script>











<!-- course -->
 <div class="col-12 col-md-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                <h4 class="text-capitalize fw-bolder text-success pt-5">Subject Offered for BBS</h4>
                                <hr class="container mx-auto text-light-grey">
                                <?php if($row['syllabus'] != '') : ?>
                                    <img src = "<?=$row['syllabus']; ?>" class="rounded px-5" alt="img" class="d-block px-5 pb-5 w-100" >
                                <?php else : ?>
                                    <img src = "assets\img\service1.jpg" class="rounded px-5" alt="img" class="d-block px-5 pb-5 w-100">
                                <?php endif; ?> 
                                    <!-- <img src="assets\img\syllabus.png" class="d-block px-5 pb-5 w-100" 
                                    alt="fees" > -->
                            </div>
                            <div class="align-items-start pb-5">
                                <h4 class="text-capitalize fw-bolder text-success pt-5">Fee Structure</h4>
                                <hr class="container mx-auto text-light-grey">
                                <p class="mt-3 mb-5 para-width text-light-grey">
                                    Siddha Public College, being a nonprofit making community college, constructs its fee structure to an affordable level to meet its operating costs. It is always guided by the feeling of cost recovery not by profit motive.
                                </p>
                                <!-- <img src="assets\img\fee.png" class="d-block px-5 pb-5 w-100" 
                                    alt="fees" > -->
                                    <?php if($row['fee'] != '') : ?>
                                        <img src = "<?=$row['fee']; ?>" class="rounded px-5" alt="img"  class="d-block px-5 pb-5 w-100" >
                                    <?php else : ?>
                                        <img src = "assets\img\service1.jpg" class="rounded px-5" alt="img" class="d-block px-5 pb-5 w-100">
                                    <?php endif; ?> 
                            </div>