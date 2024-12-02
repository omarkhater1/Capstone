<?php
// Include the main class file, which contains the definition of the xloop class.
include('../xloop/mainclass.php');

// Create an instance of the xloop class to access its methods.
$obj = new xloop();

// Call the setPlan method of the xloop object to insert or update the user's plan data.
// Pass the following parameters received via POST:
// - 'calories': the user's daily calorie target.
// - 'target_weight': the user's target weight.
// - 'progress': the user's progress toward their goal.
// - 'date': the date associated with the plan.
// - 'uid': the unique user ID.
$obj->setPlan(
    $_POST['calories'],      // Daily calorie intake target.
    $_POST['target_weight'], // Target weight to achieve.
    $_POST['progress'],      // Current progress (e.g., weight loss or gain).
    $_POST['date'],          // Associated date for the plan (could be a record or goal date).
    $_POST['uid']            // User ID to identify the plan's owner.
);

// Uncomment the following line for debugging purposes to inspect the POST data.
// print_r($_POST);

// Output a success message after the plan has been successfully inserted or updated.
echo "Successfully Inserted";
?>
