<?php
// Include the 'stepin.php' file for initializing the backend logic (e.g., session handling, database connections).
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diet App</title> <!-- Page title -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive layout -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!-- Character encoding -->
    <meta name="keywords" content="Fit Health App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    
    <!-- External fonts and libraries -->
    <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- Font Awesome icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> <!-- Bootstrap CSS -->
    <link href="css/progress.css" rel="stylesheet" type="text/css"> <!-- Custom CSS for progress -->
</head>
<body>
    <!-- Hidden input for user ID -->
    <input type="hidden" value="<?php echo $_SESSION["rm_user_id"]; ?>" id="uid" />

    <!-- Main container for the diet progress screen -->
    <div class="diet-screen">
        
        <!-- Back navigation arrow -->
        <div class="arrow">
            <div class="previous" onclick="history.back()">
                <i class="fa-solid fa fa-arrow-circle-left"></i>
            </div>
        </div>

        <!-- User details -->
        <div class="details">
            <h1 class="heading1"><?php echo $obj->getUserDataDI('full_name'); ?></h1>
            <h1 class="heading2"><?php echo $wo['lang']['choose_the_progress']; ?></h1>
            <p class="paragraph"><?php echo $wo['lang']['diet_goal_description']; ?></p>
        </div>

        <!-- Progress options -->
        <div class="goalsarea">
            <!-- Extreme Progress -->
            <div class="goals" onclick="handleExtreme()">
                <div class="extreme">
                    <h2 class="heading3"><?php echo $wo['lang']['extreme']; ?></h2>
                    <p><?php echo $wo['lang']['hard']; ?></p>
                </div>
                <iconify-icon icon="mdi:trophy" class="image1"></iconify-icon>
            </div>

            <!-- Very Active -->
            <div class="goals" onclick="handleVeryActive()">
                <div class="extreme">
                    <h2 class="heading3"><?php echo $wo['lang']['very_active']; ?></h2>
                    <p><?php echo $wo['lang']['very_active']; ?></p>
                </div>
                <iconify-icon icon="mdi:shimmer" class="image1"></iconify-icon>
            </div>

            <!-- Moderate -->
            <div class="goals" onclick="handleModerate()">
                <div class="extreme">
                    <h2 class="heading3"><?php echo $wo['lang']['moderate']; ?></h2>
                    <p><?php echo $wo['lang']['medium']; ?></p>
                </div>
                <iconify-icon icon="mingcute:bulb-fill" class="image1"></iconify-icon>
            </div>

            <!-- Light Active -->
            <div class="goals" onclick="handleLightActive()">
                <div class="extreme">
                    <h2 class="heading3"><?php echo $wo['lang']['light_active']; ?></h2>
                    <p><?php echo $wo['lang']['light_active']; ?></p>
                </div>
                <iconify-icon icon="mdi:hexagram-outline" class="image1"></iconify-icon>
            </div>

            <!-- Sedentary -->
            <div class="goals" onclick="handleSedentary()">
                <div class="extreme">
                    <h2 class="heading3"><?php echo $wo['lang']['sedentary']; ?></h2>
                    <p><?php echo $wo['lang']['easy']; ?></p>
                </div>
                <iconify-icon icon="carbon:thumbs-up-filled" class="image1"></iconify-icon>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    let date = new Date().toISOString().split('T')[0]; // Current date in YYYY-MM-DD format
    let gender = localStorage.getItem("gender");
    let height = localStorage.getItem("height");
    let target_weight = parseInt(localStorage.getItem("target_weight"));

    <?php
    // Calculate age using the user's birthdate
    $birthDate = $obj->getUserDataDI('birthday');
    $age = floor((time() - strtotime($birthDate)) / 31556926);
    ?>
    let age = <?php echo $age; ?>;

    // Calculate BMR based on gender
    let BMR = (gender === "Male") 
        ? 88.362 + (13.397 * target_weight) + (4.799 * height) - (5.677 * age)
        : 447.593 + (9.247 * target_weight) + (3.098 * height) - (4.330 * age);

    // Functions to handle progress selection
    function handleExtreme() {
        postProgress(BMR * 1.30, "Extreme");
    }

    function handleVeryActive() {
        postProgress(BMR * 1.20, "Very Active");
    }

    function handleModerate() {
        postProgress(BMR * 1.10, "Moderate");
    }

    function handleLightActive() {
        postProgress(BMR * 1.00, "Light Active");
    }

    function handleSedentary() {
        postProgress(BMR * 0.90, "Sedentary");
    }

    // Helper function to post progress data
    function postProgress(calories, progress) {
        $.post('ajax/setdietplan.php', {
            calories: Math.round(calories),
            target_weight: target_weight,
            progress: progress,
            date: date,
            uid: $("#uid").val()
        }, function(response) {
            console.log(response);
            window.location.href = 'preparing.php';
        });
    }
</script>
