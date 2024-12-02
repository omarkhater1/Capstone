<?php
// Include the configuration file. 
// Using 'dirname(dirname(__DIR__))' ensures the script correctly identifies the path to the config file 
// regardless of its current directory in the file structure.
require_once dirname(dirname(__DIR__)).'/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Diet App</title> <!-- Set the title of the webpage -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures the page is mobile-friendly -->
    <!-- Link to the CSS file for styling the loader -->
    <link href="css/loader.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <!-- Main container for the diet screen -->
    <div class="diet-screen">
      <!-- Heading section -->
      <div class="mp-heading">
        <!-- Display the welcome message fetched dynamically from the language configuration in $wo['lang']['welcome'] -->
        <h1 class="mp-welcome"><?php echo $wo['lang']['welcome'] ?></h1>

        <!-- Display a subheading prompting the user to complete their fitness profile -->
        <h3 class="mp-username">
          <span><?php echo $wo['lang']['complete_your_fitness_profile'] ?></span>
        </h3>

        <!-- Uncomment this line if you'd like to display a logo -->
        <!-- <img class="mp-logo" src="images/mp-logo.png"> -->

        <!-- Button to redirect the user to the fitness profile page -->
        <button type="button" id="btnnext" class="next-des">
          <!-- The button includes an anchor tag for navigation. 
               It dynamically fetches the URL from $site_url and appends '/fitness-profile'. -->
          <a style="color:#fff; text-transform: uppercase; text-decoration:none;" 
             href="<?php echo $site_url.'/fitness-profile'; ?>" 
             target="_parent">Go To Profile</a>
        </button>
      </div>
    </div>
  </body>
</html>
