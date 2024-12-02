<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Call the updategender method of the xloop object to update the user's gender.
// Pass the following parameters received via POST:
// - 'gender': the user's updated gender value.
// - 'uid': the unique user ID to identify which user's gender to update.
$obj->updategender(
    $_POST['gender'], // The updated gender value (e.g., "Male", "Female", "Other").
    $_POST['uid']     // The unique identifier for the user whose gender is being updated.
);

// Output the updated gender as confirmation.
echo $_POST['gender'];
?>
