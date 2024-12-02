<?php
// Include the 'stepin.php' file for backend initialization (e.g., session handling, database connection).
include_once('xloop/stepin.php');

// Call a method to reset the user log using the user ID passed via the GET request.
// This function `resetuserlog` should handle clearing or resetting the log data for the specified user.
// Ensure `$_GET['uid']` is sanitized to prevent injection attacks.
$obj->resetuserlog($_GET['uid']);

// Redirect the user to the index page after resetting the log.
// The `header` function sends a raw HTTP header for redirection.
// Ensure there is no output before this to avoid header-related errors.
header("Location: index.php");
?>
