<?php

// Variables
$name = "Kevin";
$mainPerson = "Kathrin";
$welcomeMsg = "Nice name";

$rating = 1;
$ratingMsg = "Invalid rating, only numbers between 1 and 10.";

$hourNow = 12;
$hourMsg = "Good morning {$mainPerson}";

// Check for variable value and prints welcome message
if ($name == $mainPerson)
{
  $welcomeMsg = "Hello {$mainPerson}";
}

if ($rating > 0 && $rating <= 10)
{
  $ratingMsg = "Thank you for rating";
}


