<?php

require_once __DIR__ . '/functions.php';

require_once __DIR__ . '/classes/Furniture.php';
require_once __DIR__ . '/classes/Sofa.php';
require_once __DIR__ . '/classes/Bench.php';
require_once __DIR__ . '/classes/Chair.php';

/**
 * Furniture
 */
$furniture = new Furniture(180, 50, 70);
$furniture->set_is_for_seating(true);

echo '<h2>Object Furniture:</h2>';
echo "Height: "     . $furniture->get_height()       . '<br>';
echo "Width: "      . $furniture->get_width()        . '<br>';
echo "Length: "     . $furniture->get_length()       . '<br>';
echo "Area: "       . $furniture->area()             . '<br>';
echo "Volume: "     . $furniture->volume()           . '<br><hr>';

/**
 * Sofa
 */
$sofa = new Sofa(200, 60, 60);
$sofa->set_seats(4)->set_armrests(2)->set_is_for_seating(true);

echo '<h2>Object Sofa:</h2>';
echo "Area: "               . $sofa->area()        . '<br>';
echo "Volume: "             . $sofa->volume()      . '<br>';
echo "Area Opened Called: " . $sofa->area_opened() . '<br>';

// When sofa is sleeper
$sofa->set_is_for_sleeping(true)->set_length_opened(180);
echo "Area Opened Called: " . $sofa->area_opened() . '<br>';

echo '<hr>';

/**
 * Bench
 */
$bench = new Bench(160, 50, 60);
$bench->set_seats(3)->set_armrests(2);

/**
 * Chair
 */
$chair = new Chair(40, 40, 60);

echo "<hr>";

/**
 * from Printable Interface
 */
$products = [$furniture, $sofa, $bench, $chair];

print_products_info($products);

