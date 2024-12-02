<?php
// Include the 'stepin.php' file for backend logic like session handling and database interactions.
include_once('xloop/stepin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diet App</title> <!-- Page title -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive layout -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <!-- Character encoding -->
    <meta charset="utf-8">
    
    <!-- External Fonts and Libraries -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet"> <!-- Google Fonts -->
    <link href="css/style.css" rel="stylesheet" type="text/css" /> <!-- Custom CSS -->
    <script src="js/jquery-2.1.4.min.js"></script> <!-- jQuery -->
</head>
<body>
    <div class="diet-screen">
        <!-- Back Arrow for Navigation -->
        <div class="arrow">
            <div class="previous" onclick="history.back()">
                <i class="fa-solid fa fa-arrow-circle-left"></i>
            </div>
        </div>

        <!-- User Information -->
        <div class="main-content">
            <h1 class="heading1"><?php echo $obj->getUserDataDI('full_name'); ?></h1>
            
            <!-- Box 1: Gender and Birthday -->
            <div class="box1">
                <!-- Gender -->
                <div onclick="openModal()" class="inner-box" id="genderbox">
                    <h2 class="boxtitle"><?php echo $wo['lang']['gender']; ?></h2>
                    <h2 class="heading2" id="showgender"><?php echo ucfirst($obj->getUserDataDI('gender')); ?></h2>
                </div>
                <!-- Birthday -->
                <div onclick="openBirthdayModal()" class="inner-box">
                    <h2 class="boxtitle"><?= $wo['lang']['date_of_birth']; ?></h2>
                    <h2 class="heading2" id="birthdate"><?php echo $obj->getUserDataDI('birthday'); ?></h2>
                </div>
            </div>

            <!-- Box 2: Height and Weight -->
            <div class="box1">
                <!-- Height -->
                <div onclick="openHeightModal()" class="inner-box">
                    <h1 class="boxtitle"><?= $wo['lang']['height']; ?></h1>
                    <h2 class="heading2" id="showheight"><?php echo $obj->getUserDataDI('height'); ?> cm</h2>
                </div>
                <!-- Weight -->
                <div onclick="openWeightModal()" class="inner-box">
                    <h1 class="boxtitle"><?= $wo['lang']['weight']; ?></h1>
                    <h2 class="heading2"><span id="weight"><?php echo $obj->getUserDataDI('weight'); ?></span> Kg</h2>
                </div>
            </div>

            <!-- Next Button -->
            <div class="next">
                <button type="button" id="btnnext" class="next-des"><?= $wo['lang']['next']; ?></button>
            </div>
        </div>
    </div>
    
    $(document).ready(function() {
    // Update gender
    $("#genderbtn").click(function() {
        $.post('ajax/updategender.php', {
            gender: $("#gender").val(),
            uid: $("#uid").val()
        }, function(response) {
            $("#showgender").html(response);
        });
        closeModal();
    });

    // Update birthday
    $("#birthdaybtn").click(function() {
        $.post('ajax/updatebirthday.php', {
            birthday: $("#birthday-input").val(),
            uid: $("#uid").val()
        }, function(response) {
            $("#birthdate").html(response);
        });
        closeBirthdayModal();
    });

    // Update height
    $("#heightbtn").click(function() {
        $.post('ajax/updateheight.php', {
            height: $("#range").val() * 100,
            uid: $("#uid").val()
        }, function(response) {
            $("#showheight").html(response / 100 + "m");
        });
        closeHeightModal();
    });

    // Update weight
    $("#weightbtn").click(function() {
        $.post('ajax/updateweight.php', {
            weight: $('.rs-tooltip').html(),
            uid: $("#uid").val()
        }, function(response) {
            $("#weight").html(response);
        });
        close

