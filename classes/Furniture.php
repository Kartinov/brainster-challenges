<?php

require_once __DIR__ . '/../interfaces/Printable.php';

/**
 * The right way | Furniture class have to be Abstract Class, but
 * in the challenge description this class needs to be instantiated on object and
 * some class methods to be printed.
 */
class Furniture implements Printable
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating  = false;
    private $is_for_sleeping = false;

    // Chair can have armrests, this need to be shared from Furniture
    private $armrests = null;

    public function __construct($width, $length, $height)
    {
        $this->set_width($width)->set_length($length)->set_height($height);
    }

    /**
     * setters and getters methods
     */
    public function set_width(float $width)
    {
        $this->width = $width . $this->get_unit('cm');
        return $this;
    }

    public function get_width()
    {
        return $this->width;
    }

    public function set_height(float $height)
    {
        $this->height = $height . $this->get_unit('cm');
        return $this;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_length(float $length)
    {
        $this->length = $length . $this->get_unit('cm');
        return $this;
    }

    public function get_length()
    {
        return $this->length;
    }

    public function set_is_for_seating(bool $is_it)
    {
        $this->is_for_seating = $is_it;
        return $this;
    }

    public function is_for_seating()
    {
        return $this->is_for_seating;
    }

    public function set_is_for_sleeping(bool $is_it)
    {
        $this->is_for_sleeping = $is_it;
        return $this;
    }

    public function is_for_sleeping()
    {
        return $this->is_for_sleeping;
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

    /**
     * Calculate area WIDTH * LENGTH
     */
    public function area()
    {
        return floatval($this->get_width()) * floatval($this->get_length()) .
            $this->get_unit('cm2');
    }

    /**
     * Calculate volume AREA * HEIGHT
     */
    public function volume()
    {
        return floatval($this->area()) * floatval($this->get_height()) .
            $this->get_unit('cm3');
    }

    /**
     * Checks the purpose of the product
     * @return string
     */
    public function print_product_purpose(): string
    {
        if ($this->is_for_sleeping() && $this->is_for_seating()) {
            return "for sleeping and seating";
        }

        return !$this->is_for_sleeping() ? "seating only" : "sleeping only";
    }

    /**
     * from Printable | Returns: Class Name, Product Purpose, Area 
     * @return string 
     */
    public function print(): string
    {
        return "{$this->sneakpeek()}, {$this->print_product_purpose()}, {$this->area()}";
    }

    /**
     * from Printable | Returns: Class Name
     * @return string
     */
    public function sneakpeek(): string
    {
        return get_class($this);
    }

    /**
     * from Printable | Returns: Class Name, Product Purpose, Area, Width, Length, Height
     * @return string
     */
    public function full_info(): string
    {
        return "{$this->print()}, {$this->get_width()}, 
                {$this->get_length()}, {$this->get_height()}";
    }

    /**
     * Get well formated unit
     * @param string $unit e.g. 'cm2'
     * @return string
     */
    public function get_unit(string $unit): string
    {
        $units = [
            'cm'  => "<var>cm</var>",
            'cm2' => "<var>cm<sup>2</sup></var>",
            'cm3' => "<var>cm<sup>3</sup></var>"
        ];

        return !isset($units[$unit]) ? " Wrong Unit: {$unit}" : $units[$unit];
    }
}
