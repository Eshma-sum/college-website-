<?php
require 'config/function.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?= webSetting('meta_description') ?? 'Meta Desc'; ?>">
    <meta name="keyword" content="<?= webSetting('meta_keyword') ?? 'Meta keyword'; ?>">
    
    <link rel="icon" type="image/x-icon" href="assets/img/spc1.png">
    <title><?php if(isset($pageTitle)) {echo $pageTitle; } else { echo webSetting('title') ?? 'Siddha Public College';}?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">

</head>
<body>
<div>
  <div class="text-success bg-color text-center py-2">
    <div class="<container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              Address: <?= webSetting('address') ?? ''; ?>,
              Phone: <?= webSetting('phone') ?? ''; ?>
            </div>         
        </div>
      </div>
  </div>
</div>

<?php
require 'navbar.php';
?>

