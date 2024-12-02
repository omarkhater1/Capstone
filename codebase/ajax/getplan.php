<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Uncomment the following line to debug the value of the 'bmr' key in the POST request.
// var_dump($_POST['bmr']);exit;

// Check if the 'uid' key exists in the POST request and is not empty.
if (!empty($_POST['uid'])) {
    // Call the getPlan method of the xloop object with the provided 'bmr' and 'uid' values from the POST request.
    $result = $obj->getPlan($_POST['bmr'], $_POST['uid']);
} else {
    // Start a session to access session variables.
    session_start();

    // If 'uid' is not provided, use the 'rm_user_id' from the session for the getPlan method.
    $result = $obj->getPlan($_POST['bmr'], $_SESSION['rm_user_id']);
}

// Initialize an empty array to store the results.
$arr;

// Iterate through the result set returned by the getPlan method.
foreach ($result as $r) {
    // Append each element of the result set to the array.
    $arr[] = $r;
}

// Convert the array of results into a JSON format and output it as a response.
echo json_encode($arr);
?>
