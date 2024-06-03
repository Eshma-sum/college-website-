<?php
require 'C:\xampp\htdocs\summer project\php-admin-pannel\config\function.php';

include ('authentication.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/x-icon" href="../assets/img/spc1.png">
  <title>
    SIDDHA PUBLIC COLLEGE
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />


  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script>
        function validateForm() {
            const phone = document.forms["contactForm"]["number"].value;
            const phonePattern = /^\d{10}$/; // Example pattern for a 10-digit phone number
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="g-sidenav-show  bg-gray-100">

<?php
 include('sidebar.php');
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
<?php
 include('navbar.php');
?>

<div class="container-fluid py-4">