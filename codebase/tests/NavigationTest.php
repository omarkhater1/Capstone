<?php

// Import the PHPUnit TestCase class to enable testing functionality
use PHPUnit\Framework\TestCase;

// Define a test class for navigation links, extending PHPUnit's TestCase
class NavigationTest extends TestCase
{
    // Test method to verify if the home page contains the correct navigation link to the home.php page
    public function testHomePageLink()
    {
        // Load the HTML content of the index page
        $html = file_get_contents('../index.php');

        // Assert that the HTML contains the navigation link to home.php
        $this->assertStringContainsString('href="home.php"', $html);
    }

    // Test method to verify if the home page contains the correct navigation link to the goals-page.php page
    public function testGoalsPageLink()
    {
        // Load the HTML content of the home page
        $html = file_get_contents('../home.php');

        // Assert that the HTML contains the navigation link to goals-page.php
        $this->assertStringContainsString('href="goals-page.php"', $html);
    }
}
