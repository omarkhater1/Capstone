<!DOCTYPE html>
<html>
<head>
    <title>Preparing</title> <!-- Sets the page title -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures responsive design for mobile devices -->
    
    <!-- Link to external CSS for loader styling -->
    <link href="css/loader.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!-- Main container for the diet preparation screen -->
    <div class="diet-screen">
        <!-- Header section -->
        <div class="mp-heading">
            <!-- Display the "Preparing" message dynamically from the language file -->
            <h1 class="mp-welcome"><?php echo $wo['lang']['preparing']; ?></h1>
            
            <!-- Display "Your Plan" message dynamically -->
            <h3 class="mp-username">
                <span><?php echo $wo['lang']['your_plan']; ?></span>
            </h3>
            
            <!-- Logo image -->
            <img class="mp-logo" src="images/mp-logo.png" alt="Diet App Logo">
        </div>
    </div>
</body>
<script>
    // Set a timer to redirect to the program page after 3 seconds
    setTimeout(changeLocation, 3000);

    function changeLocation() {
        // Redirect to the program page
        window.location.href = "program.php";
    }
</script>
