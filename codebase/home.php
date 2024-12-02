<?php
// Include the 'stepin.php' file, which likely initializes the necessary backend logic, such as session handling or database connections.
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diet App</title> <!-- Sets the title of the web page -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes the page responsive for mobile devices -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!-- Sets the character encoding -->
    
    <!-- SEO keywords for the app -->
    <meta name="keywords" content="Fit Health App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    
    <!-- Script to hide the URL bar for mobile devices -->
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <!-- External CSS and icon libraries -->
    <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- Font Awesome for icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet"> <!-- Google Fonts -->
    <link rel="stylesheet" href="css/home.css"> <!-- Custom CSS for the home page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/> <!-- Font Awesome -->
</head>
<body>
<div class="diet-screen">
    <!-- Back navigation arrow -->
    <div class="arrow">
        <div class="previous" onclick="history.back()">
            <i class="fa-solid fa fa-arrow-circle-left "></i> <!-- Font Awesome back arrow -->
        </div>
    </div>

    <!-- Meals section -->
    <div class="pad">
        <div id="meals">
            <h1><?php echo $wo['lang']["today's_meal"]; ?></h1> <!-- Dynamically display today's meals -->
            <ul class="meals-list">
                <!-- Breakfast item -->
                <li class="breakfast list-item">
                    <input type="checkbox" checked>
                    <i></i>
                    <div class="accord">
                        <iconify-icon class="accord-icon" icon="fluent-mdl2:breakfast"></iconify-icon>
                        <h2 class="meals-heading"><?php echo $wo['lang']['breakfast']; ?></h2>
                    </div>
                </li>
                
                <!-- Lunch item -->
                <li class="lunch list-item">
                    <input type="checkbox" checked>
                    <i></i>
                    <div class="accord">
                        <iconify-icon class="accord-icon" icon="material-symbols:lunch-dining"></iconify-icon>
                        <h2 class="meals-heading"><?php echo $wo['lang']['lunch']; ?></h2>
                    </div>
                </li>
                
                <!-- Dinner item -->
                <li class="dinner list-item">
                    <input type="checkbox" checked>
                    <i></i>
                    <div class="accord">
                        <iconify-icon class="accord-icon" icon="cil:dinner"></iconify-icon>
                        <h2 class="meals-heading"><?php echo $wo['lang']['dinner']; ?></h2>
                    </div>
                </li>
            </ul>

            <!-- Reset link -->
            <h2 class="resetlink" onclick="openConfirmModal()">
                <iconify-icon class="icon" icon="carbon:reset"></iconify-icon> <?php echo $wo['lang']['rest']; ?>
            </h2>
        </div>
    </div>
</div>
<!-- Reset Confirmation Modal -->
<div id="myConfirmModal" class="modal">
    <div class="height-modal-content">
        <h1>RESET</h1> <!-- Modal title -->
        <p>Are you sure?</p> <!-- Confirmation message -->
        <div class="save">
            <!-- Confirm and Cancel buttons -->
            <button type="button" class="modalbtn" id="heightbtn">Confirm</button>
            <button type="button" class="modalbtn" onclick="closeModal()">No</button>
        </div>
    </div>
</div>
<script src="js/home.js"></script> <!-- Custom JavaScript for page functionality -->
<script src="js/jquery-2.1.4.min.js"></script> <!-- jQuery library -->

<script>
    // Open the confirmation modal
    function openConfirmModal() {
        document.getElementById("myConfirmModal").style.display = "block";
        setTimeout(function () {
            document.getElementById("myConfirmModal").querySelector('.height-modal-content').classList.add('show');
        }, 10);
    }

    // Close the confirmation modal
    function closeModal() {
        document.getElementById("myConfirmModal").querySelector('.height-modal-content').classList.remove('show');
        setTimeout(function () {
            document.getElementById("myConfirmModal").style.display = "none";
        }, 300);
    }

    // Handle reset button click
    $("#heightbtn").click(function () {
        window.location.assign('reset.php?uid=<?php echo $_SESSION["rm_user_id"]; ?>');
    });

    // Calculate user's calorie range
    let calories = Math.round(<?php echo $obj->getUserDataDI('calories'); ?>);
    if (calories == 0) {
        window.location.assign('user_info.php');
    } else {
        calories = Math.floor((calories + 249) / 250) * 250; // Rounds up to the nearest 250
        calories = Math.min(calories, 3000); // Caps at 3000
    }

    // Fetch meal plan using AJAX
    $.post('ajax/getplan.php', { bmr: calories, uid: localStorage.getItem('uids') }, function (response) {
        let data = $.parseJSON(response);
        $('.breakfast, .lunch, .dinner').empty(); // Clear existing meal items
        data.forEach(meal => {
            const itemHTML = `<p><span class='left'>${meal.item}</span><span class='right'>${meal.qty}</span></p>`;
            $(`.${meal.meal_type.toLowerCase()}`).append(itemHTML);
        });
    });
</script>


