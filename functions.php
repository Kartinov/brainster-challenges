<?php

// Decimal to binary
function decimalToBinary($number) {
  $n = abs($number);
  $binary = [];
  $binaryNum = '';

  for ($i = 0; $n > 0; $i++) {
    $binary[$i] = $n % 2;
    $n = floor($n / 2);
  }

  for ($i -= 1; $i >= 0; $i--) {
    $binaryNum .= $binary[$i];
  }
  return $binaryNum;
}


