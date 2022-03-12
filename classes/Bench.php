<?php

require_once __DIR__ . '/Sofa.php';

class Bench extends Sofa implements Printable
{
    public function __construct(...$params)
    {
        parent::__construct(...$params);
    }
}
