<?php

use PHPUnit\Framework\TestCase;

class UpdateWeightTest extends TestCase
{
    // Test case for successfully updating the user's weight
    public function testUpdateWeightSuccess()
    {
        // Simulate valid POST data
        $_POST['weight'] = 80;  // New weight value
        $_POST['uid'] = 123;    // Valid user ID

        // Capture the output of the updateweight.php script
        ob_start();
        include '../ajax/updateweight.php';  
        $output = ob_get_clean();

        // Assert that the output matches the updated weight value
        $this->assertEquals('80', $output); 
    }

    // Test case for handling invalid inputs when updating the user's weight
    public function testUpdateWeightInvalidInputs()
    {
        // Simulate invalid POST data
        $_POST['weight'] = null;  // Missing weight value
        $_POST['uid'] = null;     // Missing user ID

        // Capture the output of the updateweight.php script
        ob_start();
        include '../ajax/updateweight.php';  
        $output = ob_get_clean();

        // Assert that the output contains an error message
        $this->assertStringContainsString('Error', $output); 
}
