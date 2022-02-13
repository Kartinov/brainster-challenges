<?php
require_once __DIR__ . "/functions.php";

$numbers = ['QQQ', "101", 'V', '+159', '+0505', "MCMXCVI", "1011011", 'XCXCXC123', 'MMDXC', '+3550650'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Challenge 12</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="wrapper">
    <?php checkAndPrintArrayValues($numbers); ?>
  </div>
</body>

</html>