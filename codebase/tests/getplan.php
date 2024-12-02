<?php

// Import the PHPUnit TestCase class for testing functionality
use PHPUnit\Framework\TestCase;

// Define a test class for testing the GetPlan functionality
class GetPlanTest extends TestCase
{
    // Test case for a valid user retrieving a plan
    public function testGetPlanValidUser()
    {
        
        $_POST['bmr'] = 1500; // Basal metabolic rate
        $_POST['uid'] = 123;  // Valid user ID

        // Capture the output of the included script
        ob_start();
        include '../ajax/getplan.php'; 
        $output = ob_get_clean();

        // Assert that the output is in JSON format
        $this->assertJson($output);

        // Decode the JSON response
        $response = json_decode($output, true);

        // Assert that the response contains a 'plan' key
        $this->assertArrayHasKey('plan', $response);

        // Assert that the 'bmr' value in the response matches the expected value
        $this->assertEquals(1500, $response['plan']['bmr']);
    }

    // Test case for missing user ID in the request
    public function testGetPlanMissingUserId()
    {
        // Simulate POST request with missing user ID
        $_POST['bmr'] = 1500; // Basal metabolic rate provided
        

        // Capture the output of the included script
        ob_start();
        include '../ajax/getplan.php'; 
        $output = ob_get_clean();

        // Assert that the output contains an error message
        $this->assertStringContainsString('Error', $output); 
    }
}
