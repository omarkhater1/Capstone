<?php
// Include the 'stepin.php' file which initializes the backend logic (e.g., session handling, database connection, or other setups).
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="ar"> <!-- Sets the language of the document to Arabic -->
<head>
    <title>Diet App</title> <!-- Page title -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures responsive design for mobile devices -->
    <meta charset="UTF-8"> <!-- Defines the character encoding as UTF-8 for Arabic support -->
    
    <!-- Link to external CSS for loader styles -->
    <link href="css/loader.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!-- Main container for the diet screen -->
    <div class="diet-screen">
        <!-- Header section -->
        <div class="mp-heading">
            <!-- Welcome message fetched dynamically from the language configuration -->
            <h1 class="mp-welcome"><?php echo $wo['lang']['welcome']; ?></h1>
            
            <!-- Display the user's full name dynamically -->
            <h3 class="mp-username">
                <span><?php echo $obj->getUserDataDI('full_name'); ?></span>
            </h3>
            
            <!-- Logo image -->
            <img class="mp-logo" src="images/mp-logo.png" alt="Diet App Logo">
        </div>
    </div>
</body>
<script>
    // Get the count of user log data for the current user (retrieved via PHP)
    const log_count = Math.round(<?php echo $obj->countUserLogData($_SESSION["rm_user_id"]); ?>);

    // Set a timer to automatically redirect after 2 seconds
    setTimeout(changeLocation, 2000);

    function changeLocation() {
        if (log_count > 0) {
            // Save user ID to sessionStorage for use in the program
            sessionStorage.setItem('uids', <?php echo $_SESSION["rm_user_id"]; ?>);
            
            // Redirect to the main program page if logs exist
            window.location.href = "program.php";
        } else {
            // Redirect to the user information setup page if no logs are found
            window.location.href = "user_info.php";
        }
    }
</script>
