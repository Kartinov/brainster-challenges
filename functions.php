<?php

/**
 * Object origin
 * @param Printable object
 */
function print_class_origin(Printable $class_name)
{
    $output = '';

    $output .= $class_name->sneakpeek();
    $parent_class = get_parent_class($class_name);
    if ($parent_class != '') {
        $output .= " extends {$parent_class}";
    }
    $output .= PHP_EOL;

    return $output;
}

/**
 * Product informations
 * @param array of pruducts
 */
function print_products_info(array $products) {
    foreach ($products as $product) {
        echo '<h3>' . nl2br(print_class_origin($product)) . '</h3>';
        echo $product->full_info() . '<br>';
    }
}