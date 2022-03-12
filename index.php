<?php

require_once __DIR__ . '/classes/Furniture.php';
require_once __DIR__ . '/classes/Sofa.php';
require_once __DIR__ . '/classes/Bench.php';
require_once __DIR__ . '/classes/Chair.php';

/**
 * Furniture
 */
$furniture = new Furniture(180, 50, 70);
$furniture->set_is_for_seating(true)->set_is_for_sleeping(false);

echo '<h2>Object Furniture:</h2>';
echo "Height: "     . $furniture->get_height()       . '<br>';
echo "Width: "      . $furniture->get_width()        . '<br>';
echo "Length: "     . $furniture->get_length()       . '<br>';
echo "Seating?: "   . $furniture->is_for_seating()   . '<br>';
echo "Sleeping?: "  . $furniture->is_for_sleeping()  . '<br>';
echo "Area: "       . $furniture->area()             . '<br>';
echo "Volume: "     . $furniture->volume()           . '<br><hr>';

/**
 * Sofa
 */
$sofa = new Sofa(200, 60, 60);

$sofa->set_seats(4)->set_armrests(2);
$sofa->set_is_for_seating(true)->set_is_for_sleeping(false);

echo '<h2>Sofa:</h2>';
echo $sofa->area()        . '<br>';
echo $sofa->volume()      . '<br>';
echo $sofa->area_opened() . '<br>';

// When sofa is sleeper
$sofa->set_is_for_sleeping(true)->set_length_opened(180);
echo $sofa->area_opened() . '<br>';

echo '<hr>';

/**
 * Bench
 */
$bench = new Bench(160, 50, 60);
$bench->set_seats(3)->set_armrests(2);
$bench->set_is_for_sleeping(false)->set_is_for_seating(true);

echo '<h2>Bench:</h2>';
echo $bench->full_info() . '<br>';

/**
 * Chair
 */
$chair = new Chair(160, 50, 60);
$chair->set_is_for_sleeping(false)->set_is_for_seating(true);

echo '<h2>Chair:</h2>';
echo $chair->full_info() . '<br>';