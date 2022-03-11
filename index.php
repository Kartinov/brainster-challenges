<?php

require_once __DIR__ . '/classes/Furniture.php';
require_once __DIR__ . '/classes/Sofa.php';

/**
 * Furniture
 */
$furniture = new Furniture(3, 1, 3);

$furniture->set_is_for_seating(true)->set_is_for_sleeping(false);

echo '<h2>Furniture:</h2>';
echo $furniture->get_height()       . '<br>';
echo $furniture->get_width()        . '<br>';
echo $furniture->get_length()       . '<br>';
echo $furniture->is_for_seating()   . '<br>';
echo $furniture->is_for_sleeping()  . '<br>';
echo $furniture->area()             . '<br>';
echo $furniture->volume()           . '<br><hr>';


/**
 * Sofa
 */
$sofa = new Sofa(3, 1, 4);

$sofa->set_seats(4)->set_armrests(2);
$sofa->set_is_for_seating(true)->set_is_for_sleeping(false);

echo '<h2>Sofa:</h2>';
echo $sofa->area()        . '<br>';
echo $sofa->volume()      . '<br>';
echo $sofa->area_opened() . '<br>';

// When sofa is sleeper
$sofa->set_is_for_sleeping(true)->set_length_opened(5);

echo $sofa->area_opened();
