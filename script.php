<?php
// This file is required in index.php
// The results are printed in index.php
$title = "Challenge 11 - PHP";

$name      = "Kathrin";
$mainName  = "Kathrin";

$rating = 5;
$rated = true;

// Current Hour 24 Format
$hourNow = date('G');

// Default messages
$welcomeMsg = "Nice name";
$ratingMsg  = "Invalid rating, only numbers between 1 and 10.";
$hourMsg    = "Good morning {$mainName}";

// Check for a variable value and store a welcome message.
if ($name == $mainName) {
  $welcomeMsg = "Hello {$mainName}";
}

// Store message in variable based on current hour
if ($hourNow > 18) {
  $hourMsg = "Good evening {$mainName}";
} elseif ($hourNow > 11) {
  $hourMsg = "Good afternoon {$mainName}";
}

// First check if user has already voted
if ($rated) {
  $ratingMsg = "You already voted";
} elseif ((is_int($rating)) && ($rating > 0 && $rating <= 10)) {
  $ratingMsg = "Thanks for voting";
}

$voters = [
  "Patrick" => [false, 9],
  "Derick"  => [true, 9],
  "John"    => [true, 5],
  "Jack"    => [false, 5],
  "Taylor"  => [true, 3],
  "Kevin"   => [false, 68],
  "Joe"     => [true, 10],
  "Katy"    => [true, 6],
  "Selena"  => [false, 0],
  "James"   => [true, 9]
];

// Loop is written in index.php