<?php require_once "./script.php" ?>

<!DOCTYPE html>
<html>

<head>
  <title>Challenge 11 - PHP</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <!-- Latest compiled and minified Bootstrap 4.6.1 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- Latest Font-Awesome CDN -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

  <div class="container-fluid mt-3">
    <h1 class="text-center">Challenge 11 - PHP</h1>
    <div class="row mt-5">
      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="container border border-secondary">
          <p class="border-bottom border-secondary">1. Output</p>

          <p><?= $welcomeMsg; ?></p>
          <p><?= $ratingMsg; ?></p>

        </div>
      </div>
      <div class="col-lg-4 mb-5 mb-lg-0 ">
        <div class="container border border-secondary">
          <p class="border-bottom border-secondary">2. Output</p>

          <p><?= $hourMsg; ?></p>

        </div>
      </div>
      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="container border border-secondary">
          <p class="border-bottom border-secondary">2. Output</p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum laborum maiores officiis libero facere quia qui, cupiditate optio fugit veritatis aliquid labore maxime perferendis possimus, perspiciatis consequuntur alias commodi molestiae nulla odio atque animi! Voluptates, vel dicta. Possimus dolorem soluta doloribus natus inventore, recusandae suscipit quis. Accusantium facilis non vitae.
        </div>
      </div>
    </div>
  </div>
  </div>


</body>

</html>