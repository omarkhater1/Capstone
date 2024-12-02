<?php

// Import the PHPUnit TestCase class to enable testing functionality
use PHPUnit\Framework\TestCase;

class SetDietPlanTest extends TestCase
{
    // Test case to verify that a diet plan is successfully set with valid inputs
    public function testSetDietPlanSuccess()
    {
        // Simulate valid POST data
        $_POST['calories'] = 2000;           // Number of calories
        $_POST['target_weight'] = 70;       // Target weight in kilograms
        $_POST['progress'] = 'good';        // User progress status
        $_POST['date'] = '2024-11-01';      // Date for the diet plan
        $_POST['uid'] = 123;                // User ID

        // Capture the output of the setdietplan.php script
        ob_start();
        include '../ajax/setdietplan.php';  
        $output = ob_get_clean();

        // Assert that the output contains the success message
        $this->assertStringContainsString('Successfully Inserted', $output);
    }

    // Test case to handle invalid inputs when setting a diet plan
    public function testSetDietPlanInvalidInputs()
    {
        // Simulate invalid POST data
        $_POST['calories'] = '';            // Missing calories
        $_POST['target_weight'] = 0;        // Invalid target weight
        $_POST['progress'] = null;          // Missing progress status
        $_POST['date'] = '';                // Missing date
        $_POST['uid'] = null;               // Missing user ID

        // Capture the output of the setdietplan.php script
        ob_start();
        include '../ajax/setdietplan.php';  
        $output = ob_get_clean();

        // Assert that the output contains an error message
        $this->assertStringContainsString('Error', $output); 
    }
}
