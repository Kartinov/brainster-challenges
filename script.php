<?php

// Variables
$name = "Kevin";
$mainPerson = "Kathrin";
$welcomeMsg = "Nice name"; // Default message

$rating = 1;
$ratingMsg = "Invalid rating, only numbers between 1 and 10."; // Default message

$rated = true;

$hourNow = date('G'); // Get current Hour
$hourMsg = "Good morning {$mainPerson}"; // Default message

// Check for a variable value and store a welcome message.
if ($name == $mainPerson)
{
  $welcomeMsg = "Hello {$mainPerson}";
}

// Checks if $rating is integer _ IF NOT default msg remains
if (is_int($rating))
{
  // Checks if $rating has a valid rate number.
  if ($rating > 0 && $rating <= 10)
  {
    // Check if a user has voted.
    if ($rated)
    {
      $ratingMsg = "You already voted";
    }
    else
    {
      $ratingMsg = "Thanks for voting";
    }
  }
}



// Store message in variable based on current hour
if ($hourNow > 18)
{
  $hourMsg = "Good afternoon {$mainPerson}";
}
elseif ($hourNow > 11)
{
  $hourMsg = "Good evening {$mainPerson}";
}
