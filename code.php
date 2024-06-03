<?php
require 'config/function.php';


if(isset($_POST['contactBtn']))
{
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $number = validate($_POST['number']);
  
    if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            redirect('index.php','Invalid last name and first name. Only letters, spaces, and hyphens are allowed.');
            // echo "Invalid last name. Only letters, spaces, and hyphens are allowed.";
            exit;
        }
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect('index.php','Invalid email format.');
        // echo "Invalid email format.";
        exit;
    }

    if (!preg_match("/^\d{10}$/", $number)) {
        redirect('index.php','Invalid phone number. Must be 10 digits.');
        // echo "Invalid phone number. Must be 10 digits.";
        exit;
    }

    // $check_query = "SELECT * FROM contact WHERE email='$email' OR number='$number' ";
    // $check_result = mysqli_query($conn,$check_query);

    // if(mysqli_num_rows($check_result) > 0)
    //     {
    //         redirect('index.php','Form already sent');
    //     }
    // else
    // {
    //     $query = "INSERT INTO contact (fname,lname,email,number) 
    //          VALUES ('$fname','$lname','$email','$number')";

    //     $result = mysqli_query($conn,$query);
    //     if($result)
    //     {
    //         redirect('Thankyou.php','Thankyou for contacting us. We will contact you soon.');
    //     }
    //     else
    //     {
    //         redirect('Thankyou.php','Something went wrong');

    //     }
    // }   
    $query = "INSERT INTO contact (fname,lname,email,number) 
             VALUES ('$fname','$lname','$email','$number')";

    $result = mysqli_query($conn,$query);
    if($result)
    {
        redirect('Thankyou.php','Thankyou for contacting us. We will contact you soon.');
    }
    else
    {
        redirect('Thankyou.php','Something went wrong');

    }
}

?>