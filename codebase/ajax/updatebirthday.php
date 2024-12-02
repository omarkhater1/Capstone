<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Call the updatebirthday method of the xloop object to update the user's birthday.
// Pass the following parameters received via POST:
// - 'birthday': the user's updated date of birth.
// - 'uid': the unique user ID to identify which user's birthday to update.
$obj->updatebirthday(
    $_POST['birthday'], // The updated birthday date (e.g., "YYYY-MM-DD").
    $_POST['uid']       // The unique identifier for the user whose birthday is being updated.
);

// Output the updated birthday as confirmation.
echo $_POST['birthday'];
?>
