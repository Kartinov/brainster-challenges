<?php

// Function that returns an array of roman values as keys and their values as value.
function romanMap() {
  $romanMap = [
    '|M|' => 1000000,
    '|D|' => 500000,
    '|C|' => 100000,
    '|L|' => 50000,
    '|X|' => 10000,
    '|V|' => 5000,
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

// ========== BINARY TO DECIMAL ==========
function binaryToDecimal($number) {
  $result = 0;
  $base = 1;

  for ($number; $number; ($number /= 10)) {
    $lastDigit = $number % 10;
    $result   += $lastDigit * $base;
    $base     *= 2;
  }
  return $result;
}

// ========== DECIMAL TO ROMAN UP TO 3999999 ==========
// This is extended function up to 3999999, previous was up to 3999.
// I keep one function, if function need to print up to 3999, just change $upTo variable.
function decimalToRoman($number) {
  $upTo = 3999999;
  if ($number < $upTo) {
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
  }
  return "Invalid number please input numbers less than {$upTo}}";
}

// ========== ROMAN TO DECIMAL ==========
function romanToDecimal($roman) {
  $roman = strtoupper($roman);
  $romanMap = romanMap();
  $result = 0;

  foreach ($romanMap as $key => $value) {
    while (strpos($roman, $key) === 0) {
      $result += $value;
      $roman = substr($roman, strlen($key));
    }
  }
  return $result;
}

// Function that accepts one argument as decimal/roman/binary number and returns an array of converted number
function formatCheckAndConvert($number) {
  $string = str_split($number);
  $converted = [];
  $errorMessage = "Invalid number. This number can not be converted.";

  if (($number[0] == "+" || $number[0] == "-")) {
    if ($number[1] > 0) {
      $converted['decimal'] = $number;
      $converted['binary']  = decimalToBinary($number);
      $converted['roman']   = decimalToRoman($number);
      return $converted;
    }
    $errorMessage = "Decimal number should not start with 0.";
    return $errorMessage;
  }

  if (preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', strtoupper($number))) {
    $converted['roman']    = $number;
    $converted['decimal']  = romanToDecimal($number);
    $converted['binary']   = decimalToBinary($converted['decimal']);
    return $converted;
  }

  if (preg_match('~^[01]+$~', $number)) {
    $converted['binary']   = $number;
    $converted['decimal']  = binaryToDecimal($number);
    $converted['roman']    = decimalToRoman($converted['decimal']);
    return $converted;
  }
  return $errorMessage;
}

function checkAndPrintArrayValues($array) {
  for ($i = 0; $i < count($array); $i++) {
    $conv = formatCheckAndConvert($array[$i]);

    echo "<div class='result'>";
    if (is_array($conv)) {
      foreach ($conv as $key => $val) {
        echo "{$key}: {$val}<br>";
      }
    } elseif (is_string($conv)) {
      echo  "{$conv}";
    }
    echo "</div>";
  }
}
