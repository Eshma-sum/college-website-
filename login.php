<?php

$pageTitle = "Login";

if(isset($_SESSION['auth']))
{
    redirect('index.php','You are already Logged in');
}
include('includes/header.php');

?>
    
<div class="p-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow border-info" style="height:500px;">
                        <div class="card-header text-center bg-color text-success">
                            <h5 class="fw-bold">Login</h5>
                        </div>

                        <div class="card-body bg-color">

                            <?= alertMessage(); ?>

                            <form action="login-code.php" method="POST">
                                <div class="mb-3">
                                    <label class="pt-3 text-info"><h4>Email Address</h4></label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="pt-5 text-info"><h4>Password</h4></label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3 pt-5">
                                    <button type="submit" name="loginBtn" class="btn btn-warning w-100 ">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<!-- <?php  include('includes/footer.php'); ?> -->


