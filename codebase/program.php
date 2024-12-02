<?php
// Include the 'stepin.php' file which initializes the backend logic (e.g., session handling, database connections).
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en"> <!-- Sets the language to English -->
<head>
    <title>Diet App</title> <!-- Page title -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures responsive design for mobile devices -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!-- Character encoding -->
    
    <!-- Meta keywords for SEO optimization -->
    <meta name="keywords" content="Fit Health App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    
    <!-- External styles and scripts -->
    <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- Font Awesome for icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet"> <!-- Google Fonts -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> <!-- Bootstrap framework -->
    <link href="css/program.css" rel="stylesheet" type="text/css"> <!-- Custom CSS for the program page -->
    <script src="js/jquery-2.1.4.min.js"></script> <!-- jQuery library -->
</head>
<body>
    <!-- Main container for the diet screen -->
    <div class="diet-screen">
        
        <!-- Back arrow, displayed only if the user has no previous log data -->
        <?php if($obj->countUserLogData($_SESSION["rm_user_id"]) < 1): ?>
        <div class="arrow">
            <div class="previous" onclick="history.back()">
                <i class="fa-solid fa fa-arrow-circle-left"></i>
            </div>
        </div>
        <?php endif; ?>

        <!-- Program details -->
        <div class="details">
            <h1 class="heading1"><?php echo $wo['lang']['your_personal_program_is_ready']; ?></h1>
            <p class="paragraph"><?php echo $wo['lang']['target_weight_description']; ?></p>
        </div>

        <!-- Nutritional Recommendations Chart -->
        <div class="chart">
            <h2 style="color: white;"><?php echo $wo['lang']['nutritional_recommendations']; ?></h2>
            <div class="nutritional">
                <div class="total">
                    <div class="total_exc">
                        <h3 class="total_kcal">
                            <span id="newcal">
                                <?php echo $obj->getUserDataDI('calories'); ?> <?= $wo['lang']['kcal']; ?>
                            </span>
                        </h3>
                        <h4 class="daily-calo">
                            <span><?php echo $wo['lang']['required_daily_calories']; ?></span>
                        </h4>
                    </div>
                </div>
                <!-- Calorie range slider -->
                <input class="range bar" type="range" id="range" onchange="changeCalories(this.value)"
                       value="<?php echo $obj->getUserDataDI('calories'); ?>" step="1" min="750" max="3000">
            </div>
        </div>

        <!-- How To Reach Your Goal Section -->
        <div class="reach-goal">
            <div class="how">
                <h3><?php echo $wo['lang']['required_daily_calories']; ?></h3>
                <p><?php echo $wo['lang']['do_these_activities']; ?></p>
            </div>
            <div class="four-goals">
                <!-- Goal 1: Track Your Food -->
                <div class="track">
                    <iconify-icon class="goal-icon" icon="material-symbols:food-bank"></iconify-icon>
                    <p><?php echo $wo['lang']['track_your_food']; ?></p>
                </div>
                <!-- Goal 2: Balance Your Intake -->
                <div class="track">
                    <iconify-icon class="goal-icon" icon="material-symbols:balance"></iconify-icon>
                    <p><?php echo $wo['lang']['balance_your_intake']; ?></p>
                </div>
                <!-- Goal 3: Stay Hydrated -->
                <div class="track">
                    <iconify-icon class="goal-icon" icon="mdi:food-fork-drink"></iconify-icon>
                    <p><?php echo $wo['lang']['stay_hydrated']; ?></p>
                </div>
                <!-- Goal 4: Update Your Weight -->
                <div class="track">
                    <iconify-icon class="goal-icon" icon="fa6-solid:weight-scale"></iconify-icon>
                    <p><?php echo $wo['lang']['update_your_weight']; ?></p>
                </div>
            </div>
            <!-- Button to explore today's meals -->
            <div class="explore-btn">
                <button onclick="window.location.href='home.php'"><?php echo $wo['lang']["todays_meal"]; ?></button>
            </div>
        </div>
    </div>
</body>
<script>
    // Change the calorie value using an AJAX POST request
    function changeCalories(cal) {
        $.post('changecalories.php', { cal: cal }, function(res) {
            $("#newcal").html(cal + " kcal"); // Update the displayed calorie value
            console.log(res); // Log the server response for debugging
        });
    }
</script>
