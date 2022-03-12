<?php

require_once __DIR__ . '/Furniture.php';

class Sofa extends Furniture implements Printable
{
    protected $seats;
    protected $length_opened;

    public function __construct(...$params)
    {
        parent::__construct(...$params);

        // Defaults for Sofa, later can be changed.
        $this->set_is_for_seating(true)->set_is_for_sleeping(false);
    }

    /**
     * setters and getters methods
     */
    public function set_seats(int $seats)
    {
        $this->seats = $seats;
        return $this;
    }

    public function get_seats()
    {
        return $this->seats;
    }

    public function set_length_opened(float $length_opened)
    {
        $this->length_opened = $length_opened . $this->get_unit('cm');
        return $this;
    }

    public function get_length_opened()
    {
        return !isset($this->length_opened) ? false : $this->length_opened;
    }

    /**
     * Area Opened
     */
    public function area_opened()
    {
        if (!$this->is_for_sleeping()) {
            return "This sofa is for sitting only, it has 
                {$this->get_armrests()} armrests and {$this->get_seats()} seats.";
        }

        // If Length Opened is not set
        if (!$this->get_length_opened()) {
            return "Area Opened can not be calculated if length opened is not set.";
        }

        return (floatval($this->get_width()) * floatval($this->get_length_opened())) .
            $this->get_unit('cm2');
    }
}
