<?php
// Include the 'stepin.php' file which likely initializes necessary classes, functions, or configurations.
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diet App</title> <!-- Title of the application -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes the page responsive for mobile devices -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!-- Sets character encoding to UTF-8 -->
  
  <!-- Meta keywords for SEO optimization -->
  <meta name="keywords" content="Fit Health App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  
  <!-- Script to hide the URL bar for mobile devices -->
  <script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); }
  </script>
  
  <!-- Links to external resources and stylesheets -->
  <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- Font Awesome icons -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap framework -->
  <link href="css/goals-page.css" rel="stylesheet" type="text/css" /> <!-- Custom styles -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.css" rel="stylesheet" /> <!-- Slider library -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet"> <!-- Google Fonts -->
</head>
<body>
  <!-- Container for the main diet app screen -->
  <div class="diet-screen">

    <!-- Navigation arrow to go back to the previous page -->
    <div class="arrow">
      <div class="previous" onclick="history.back()">
        <i class="fa-solid fa fa-arrow-circle-left "></i> <!-- Font Awesome back arrow -->
      </div>
    </div>

    <!-- User details section -->
    <div class="details">
      <h1 class="heading1"><?php echo $obj->getUserDataDI('full_name'); ?></h1> <!-- Dynamic user name -->
      <h1 class="heading2"><?php echo $wo['lang']['what_is_your_goal']; ?></h1> <!-- Dynamic goal heading -->
      <p class="paragraph"><?php echo $wo['lang']['diet_goal_description']; ?></p> <!-- Goal description -->
    </div>

    <!-- Goals section -->
    <div class="goalsarea">
      <!-- Goal: Lose Weight -->
      <div onclick="openWeightModal()" class="goals">
        <h2 class="heading3"><?php echo $wo['lang']['lose_weight']; ?></h2>
        <iconify-icon icon="healthicons:underweight-outline" class="image1"></iconify-icon> <!-- Icon for losing weight -->
      </div>
      
      <!-- Goal: Gain Weight -->
      <div onclick="openGainWeightModal()" class="goals">
        <h2 class="heading3"><?php echo $wo['lang']['gain_weight']; ?></h2>
        <iconify-icon icon="mdi:weight-lifter" class="image1"></iconify-icon> <!-- Icon for gaining weight -->
      </div>

      <!-- Goal: Stay Healthy -->
      <div class="goals" onclick="handleGoal()">
        <h2 class="heading3"><?php echo $wo['lang']['stay_healthy']; ?></h2>
        <iconify-icon icon="mdi:trophy-award" class="image1"></iconify-icon> <!-- Icon for staying healthy -->
      </div>
    </div>
  </div>
</body>
<!-- jQuery for DOM manipulation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Slider library for weight goal customization -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/roundSlider/1.3.2/roundslider.min.js"></script>

<!-- Custom JavaScript for the goals page -->
<script src="js/goals-page.js"></script>
