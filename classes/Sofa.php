<?php

require_once __DIR__ . '/Furniture.php';
require_once __DIR__ . '/../interfaces/Printable.php';

class Sofa extends Furniture implements Printable
{
    protected $seats;
    protected $armrests;
    protected $length_opened;

    /**
     * setters, getters methods
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

    public function set_armrests(int $armrests)
    {
        $this->armrests = $armrests;
        return $this;
    }

    public function get_armrests()
    {
        return $this->armrests;
    }

    public function set_length_opened(float $length_opened)
    {
        $this->length_opened = $length_opened;
        return $this;
    }

    public function get_length_opened()
    {
        return $this->length_opened;
    }

    public function area_opened()
    {
        return
            !$this->is_for_sleeping()
            ?
            "This sofa is for sitting only, it has 
                {$this->get_armrests()} armrests and {$this->get_seats()} seats."
            : (floatval($this->get_width()) * $this->get_length_opened()) .
            $this->get_unit('cm2');
    }
}
