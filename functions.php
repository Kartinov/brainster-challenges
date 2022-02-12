<?php

// Function that returns an array of roman values as keys and their values as value.
function romanMap() {
  $romanMap = [
    'M'  => 1000,
    'CM' => 900,
    'D'  => 500,
    'CD' => 400,
    'C'  => 100,
    'XC' => 90,
    'L'  => 50,
    'XL' => 40,
    'X'  => 10,
    'IX' => 9,
    'V'  => 5,
    'IV' => 4,
    'I'  => 1
  ];
  return $romanMap;
}

// ========== DECIMAL TO BINARY ==========
function decimalToBinary($number) {
  $n = abs($number);
  $binaryArr = [];
  $binaryNum = '';

  for ($i = 0; $n > 0; $i++) {
    $binaryArr[$i] = $n % 2;
    $n = floor($n / 2);
  }

  for ($i -= 1; $i >= 0; $i--) {
    $binaryNum .= $binaryArr[$i];
  }
  return $binaryNum;
}

// ========== DECIMAL TO ROMAN UP TO 3999 ==========
function decimalToRoman($number) {
  if ($number < 4000) {
    $romanMap = romanMap();
    $result = '';

    while ($number > 0) {
      foreach ($romanMap as $roman => $num) {
        if ($number >= $num) {
          $number -= $num;
          $result .= $roman;
          break;
        }
      }
    }
    return $result;
  } else {
    return "Invalid number please input numbers less than 4000";
  }
}

// ========== BINARY TO DECIMAL ==========
function binaryToDecimal($number) {
  $result = 0;
  $base = 1;

  for($number; $number; ($number /= 10)) {
    $lastDigit = $number % 10;
    $result += $lastDigit * $base;
    $base *= 2;
  }
  return $result;
}
