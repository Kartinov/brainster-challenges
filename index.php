<?php

require_once __DIR__ . '/classes/Furniture.php';

$fur = new Furniture(4.5, 4.5, 4.5);

$fur->set_is_for_seating(true);
$fur->set_is_for_sleeping(false);

echo $fur->get_height() . '<br>';
echo $fur->get_width() . '<br>';
echo $fur->get_length() . '<br>';
echo $fur->is_for_seating() . '<br>';
echo $fur->is_for_sleeping() . '<br>';
echo $fur->area() . '<br>';
echo $fur->volume() . '<br>';
