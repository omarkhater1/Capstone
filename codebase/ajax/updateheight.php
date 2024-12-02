<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Call the updateheight method of the xloop object to update the user's height.
// Pass the following parameters received via POST:
// - 'height': the user's updated height value.
// - 'uid': the unique user ID to identify which user's height to update.
$obj->updateheight(
    $_POST['height'], // The updated height value (e.g., in centimeters or inches, depending on the system).
    $_POST['uid']     // The unique identifier for the user whose height is being updated.
);

// Output the updated height as confirmation.
echo $_POST['height'];
?>
