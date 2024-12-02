<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Call the updateweight method of the xloop object to update the user's weight.
// Pass the following parameters received via POST:
// - 'weight': the user's updated weight value.
// - 'uid': the unique user ID to identify which user's weight to update.
$obj->updateweight(
    $_POST['weight'], // The updated weight value (e.g., in kilograms or pounds, depending on the system).
    $_POST['uid']     // The unique identifier for the user whose weight is being updated.
);

// Output the updated weight as confirmation.
echo $_POST['weight'];
?>
