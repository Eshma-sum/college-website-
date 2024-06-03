<?php  
$pageTitle = "About-us";
include('includes/header.php'); 
?>

<section class="bg-main bg-color more-info-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-md-12 col-lg-6 img-selection">
                   <figure>
                    <img src="assets\img\speaker.gif" alt="dif" class="img-fluid">
                   </figure>
            </div>

            <div class="col-12 col-md-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                <h2 class="text-capitalize fw-bolder text-white"> <?= aboutUs('title') ?? ''; ?></h2>
                <p class="mt-3 mb-5 para-width text-light-grey">
                <?= aboutUs('description1') ?? ''; ?>
                </p>
            </div>
            <div class="align-items-start">
                <p class="mt-3 mb-5 para-width text-light-grey">
                <?= aboutUs('description2') ?? ''; ?>
                </p>
            </div>
            

        </div>
    </div>
    <div class="custom-shape-divider-bottom-1714996964 col-xl-6 xol-lg-6 col-md-12 col-12">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
  </section> 
  <!-- digital products -->

<!-- mission vision objective section starts -->
  <div class="container">
    <div class="row mb-5">
    <div >
        <p>
        <h4 class="text-capitalize text-center text-success p-2">Our Mission :</h4>
        <hr class="w-25 mx-auto text-light-grey">
        SPC focuses on producing and developing business leaders and entrepreneurial cadres who are ready to solve the societal problems through entrepreneurship.
        <h4  class="text-capitalize text-center text-success p-2">Our Vision :</h4>
        <hr class="w-25 mx-auto text-light-grey">
        “To promote SPC as an outstanding centre of knowledge and education to the students of all types and from every corner of the country in reasonable fee structure”.
        <h4  class="text-capitalize text-center text-success p-2">Objectives :</h4>
        <hr class="w-25 mx-auto text-light-grey">
        To equip the students with the required conceptual knowledge of business and administration to develop a general management perspective in them.<br>
        To provide higher level quality education in practical basis.<br>
        To encourage entrepreneurial capabilities in students to make them effective change agents in the Nepalese society.<br>
        To develop required attitudes, abilities and practical skill in students, which constitute a foundation for their growth into competent and responsible Business Managers.<br>
        To develop necessary foundation for higher studies in management and thereafter take up careers in teaching, research and consultancy.
        </p>
    </div>
    <div>
        <p>
        <h4 class="text-capitalize text-center text-success p-3">WHY TO CHOOSE SPC?</h4>
        <hr class="w-25 mx-auto text-light-grey">
        <ul>
            <li>We offer quality education to explore and enhance student's potentials for career building and individual development.</li>
            <li>We develop managerial skills and entrepreneurship through interactive and modern approaches of teaching.</li>
            <li>We use technology blended teaching method in order to make teaching learning effective and situational in the present   context.</li>
            <li>We boast of highly trained professional lecturers who use modern tools and techniques to make teaching delivery effective and more students centered.</li>
            <li>We invite some subject experts in various sectors to conduct guest lectures on career building.</li>
        </ul>
        </p>
    </div>
    </div>
  </div>  
<!-- mission vision objective section ends -->
<?php  include('includes/footer.php'); ?>