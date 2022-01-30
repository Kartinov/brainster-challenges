<?php require_once "./script.php" ?>

<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?></title>
  <meta charset="utf-8" />
  <meta name="author" content="Dimche Kartinov">
  <meta name="description" content="Challenge using if statements, loops, associative arra">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <!-- Latest compiled and minified Bootstrap 4.6.1 CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

  <div class="container-fluid mt-3">
    <h1 class="text-center"><?= $title ?></h1>
    <div class="row mt-5">
      <div class="col-12 mb-5">
        <h2 class="text-center">1. Output</h2>
        <div class="container border border-secondary">
          <p><?= $welcomeMsg; ?></p>
          <p>It's <?= $hourNow; ?> o'clock</p>
          <p><?= $hourMsg; ?></p>
          <p><?= $ratingMsg; ?></p>
        </div>
      </div>

      <div class="col-12">
        <h2 class="text-center">2. Output</h2>
        <div class="container border border-secondary">
          <div class="row">

            <?php
            foreach ($voters as $human => $voteInfo) {
              $voteArr = explode(",", "$voteInfo");

              $rated  = $voteArr[0];
              $rating = $voteArr[1];

              $welcomeMsg = "Nice name";
              $ratingMsg  = "Invalid rating, only numbers between 1 and 10.";
              $hourMsg    = "Good morning {$human}";

              if ($hourNow > 18) {
                $hourMsg = "Good evening {$human}";
              } elseif ($hourNow > 11) {
                $hourMsg = "Good afternoon {$human}";
              }

              if ($rated == "true") {
                $ratingMsg = "You already voted";
              } elseif ((is_numeric($rating)) && ($rating > 0 && $rating <= 10)) {
                $ratingMsg = "Thanks for voting";
              }
            ?>

              <!-- LOOP Output -->
              <div class="col-md-6 col-lg-4 border">
                <?= "<p>$hourMsg</p>"; ?>
                <?= "<p>$ratingMsg</p>"; ?>
              </div>

            <?php } ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>


</body>

</html>