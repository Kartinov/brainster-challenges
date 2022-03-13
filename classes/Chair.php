<?php

require_once __DIR__ . '/Furniture.php';

class Chair extends Furniture
{
    public function __construct(...$params)
    {
        parent::__construct(...$params);

        // Defaults for Chair, later can be changed.
        $this->set_is_for_seating(true);
    }
}
