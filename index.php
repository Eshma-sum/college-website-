<?php  
$pageTitle = "Home";
include('includes/header.php'); ?>

    <div class="container-fluid first">
        <?= alertMessage(); ?>
        <?php
            $infoQuery = "SELECT * FROM infos WHERE status='0'";
            $result = mysqli_query($conn,$infoQuery);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {
                        ?>
                                            
                            <section class=" align-items-center hero-section media ">
                                      
                                            <?php if($row['media'] != '') : ?>
                                                <video autoplay loop muted src="<?=$row['media'];?>" width="100%";>
                                                    Your browser does not support the video tag.
                                                </video>
                                            <?php else : ?>
                                                    <img src ="<?=$row['media']?>" class="w-100" alt="img">
                                            <?php endif; ?> 
                                            <div class="text-overlay container-fliud">
                                                <div class="text-center">
                                                    <h4 class="text-capitalize text-center fw-bold text-success">
                                                        Scroll down
                                                    </h4>  
                                                    <a href="#services" class=""><img src="assets\img\arrow-1455_128.gif" alt="..." width="50px"></a>             
                                                        <!-- <button class="text-capitalize btn bg-color" width="50px" >
                                                            <a href="about-us.php" class=" nav-link text-center text-success">
                                                                learn more
                                                            </a>
                                                        </button> -->
                                                </div>
                                            </div>
                            </section>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="col-md-12">
                        <h5> No Infos Available </h5>
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
    <div>
            <section class="bg-main bg-color">    
                    <div class="custom-shape-divider-bottom-1714996964">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                        </svg>
                    </div>
            </section>
    </div>

   <div class="container-fluid text-center py-5">
        <h1><p class="text-capitalize fw-bolder text-warning">
                <?= $row['name'];?>
            </p>
        </h1>
    </div>
                                                
                                                
                                           


<div class="py-5">
    <div class="container">
        <h4 class="text-bold text-capitalize text-center" id="services">Services And Admission</h4>
        <hr class="w-25 mx-auto">
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">

        <?php
            $serviceQuery = "SELECT * FROM services WHERE status='0'";
            $result = mysqli_query($conn,$serviceQuery);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {
                        ?>
                        <!-- <div class="container ">
                            <div class="card mb-3" style="max-width: 1000px;"> -->
                            <div class="container mt-3 shadow">
                                <div class="card mb-3 centered-card">
                                    <div class="row g-0 bg-color">
                                        <div class="col-md-3">
                                            <?php if($row['image'] != '') : ?>
                                                <img src = "<?=$row['image']; ?>" class="rounded" alt="img" height="200px" width="250px">

                                            <?php else : ?>
                                                <img src = "assets\img\service1.jpg" class="rounded" alt="img" style="min-height:200px;max-height:200px;">
                                            <?php endif; ?> 
                                        </div>
                                            
                                            <div class="col-md-9">
                                                <div class="card-body">
                                                    <h5 class="card-title text-bold text-success"><?=$row['name'];?></h5>
                                                    <p class="card-text">
                                                        <?=$row['small_description']?>
                                                    </p>
                                                </div>
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
</div>

<!-- gallery section starts -->
<div class="py-5" id="gallery">
    <div class="container">
        <h4 class="text-bold text-capitalize text-center">Gallery</h4>
        <hr class="w-25 mx-auto">
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $galleryQuery = "SELECT * FROM gallery WHERE status='0'";
                $result = mysqli_query($conn, $galleryQuery);

                if ($result && mysqli_num_rows($result) > 0) {
                    $first = true;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="carousel-item <?= $first ? 'active' : ''; ?>">
                            <?php if ($row['image'] != '') : ?>
                                <img src="<?= $row['image']; ?>" class="d-block"  height="500px" width="100%" alt="Slide <?= $row['id']; ?>">
                            <?php else : ?>
                                <img src="assets/img/service1.jpg" class="d-block" height="500px" width="100%" alt="Slide <?= $row['id']; ?>">
                            <?php endif; ?>
                        </div>
                        <?php
                        $first = false;
                    }
                } else {
                    ?>
                    <div class="carousel-item active">
                        <img src="assets/img/service1.jpg" height="500px" class="d-block" width="100%" alt="No Images Available">
                    </div>
                    <?php
                }
                ?>

            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
</div>
<!-- gallery section ends -->

<!--blog section -->
<div class="py-5">
    <div class="container">
        <h4 class="text-bold text-capitalize text-center">Student's Voice</h4>
        <hr class="w-25 mx-auto">
    </div>
</div>

<div class="py-5">
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center">

        <?php
            $voiceQuery = "SELECT * FROM voice WHERE status='0'";
            $result = mysqli_query($conn,$voiceQuery);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {   ?>
                        
                                <div class="col-xl-3 col-md-6 col-12 ">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="card shadow" style="width: 18rem;">
                                                    <?php if ($row['image'] != '') : ?>
                                                        <img src="<?= $row['image']; ?>" class="d-block"  height="500px" width="100%" alt="Slide <?= $row['id']; ?>">
                                                    <?php else : ?>
                                                        <img src="assets/img/service1.jpg" class="d-block" height="500px" width="100%" alt="Slide <?= $row['id']; ?>">
                                                    <?php endif; ?>
                                           
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <p class="small text-grey "><i class="fa-solid fa-book-open-reader"></i> <?=$row['year']; ?></p>
                                                </div>
                                                <h5 class="card-title"><?=$row['name']?></h5>
                                                <p class="card-text mb-3">
                                                    <?= $row['description']; ?>
                                                </p>
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
                        <h5> No voice Available </h5>
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
</div>

<!--    blog section end -->


<!--contact section-->
<section class="common-section bg-color contact-section text-white">
    <div class="custom-shape-divider-top-1684211116">
        <svg data-name="Layer 1" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path class="shape-fill"
                  d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    <div class="container text-center fw-bold common-title ">
        <h2 class="common-heading text-white ">Connect with us</h2>
        <hr class="w-25 mx-auto text-light-grey">
    </div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="form-section">
            <form action="code.php" method="POST">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label>First name</label>
                            <input  type="text" class="form-control" placeholder="First name" id="fname" name="fname" required>
                        </div>
                        <div class="col">
                            <label>Last name</label>
                            <input type="text" class="form-control" placeholder="Last name" id="lname" name="lname" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" class="form-control" required name="email" id="email"
                           placeholder="Enter your email">
                    <div class="form-text text-white">
                        We'll never share your email with anyone else.
                    </div>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" placeholder="Phone-Number" id="number" name="number" required>
                </div>
                <div class="pt-3">
                    <button type="submit" name="contactBtn" class="btn btn-warning">Submit</button>
                    <!-- <button type="submit" name="editBtn" class="btn btn-warning">Re-submit</button> -->
                </div>
            </form>
        </div>
    </div>

</section>
<!--contact section end -->
    
<?php  include('includes/footer.php'); ?>