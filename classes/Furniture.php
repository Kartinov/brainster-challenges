<?php

require_once __DIR__ . '/../interfaces/Printable.php';
class Furniture implements Printable
{
    protected $width;
    protected $length;
    protected $height;
    protected $is_for_seating;
    protected $is_for_sleeping;

    public function __construct(float $width, float $length, float $height)
    {
        $this->set_width($width)->set_length($length)->set_height($height);
    }

    /**
     * setters and getters methods
     */
    public function set_width($width)
    {
        $this->width = $width . $this->get_unit('cm');
        return $this;
    }

    public function get_width()
    {
        return $this->width;
    }

    public function set_height($height)
    {
        $this->height = $height . $this->get_unit('cm');
        return $this;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_length($length)
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

    public function area()
    {
        return floatval($this->get_width()) * floatval($this->get_length()) .
            $this->get_unit('cm2');
    }

    public function volume()
    {
        return floatval($this->area()) * floatval($this->get_height()) .
            $this->get_unit('cm3');
    }

    public function print_product_purpose()
    {
        if ($this->is_for_sleeping() && $this->is_for_seating()) {
            return "for sleeping and seating";
        }

        return !$this->is_for_sleeping() ? "seating only" : "sleeping only";
    }

    /**
     * Printable methods shared accross all furniture child classes
     */
    public function print()
    {
        return "{$this->sneakpeek()}, {$this->print_product_purpose()}, {$this->area()}";
    }

    public function sneakpeek()
    {
        return get_class($this);
    }

    public function full_info()
    {
        return "{$this->print()}, {$this->get_width()}, 
                {$this->get_length()}, {$this->get_height()}";
    }

    /**
     * Get well formated unit
     * @param string $unit e.g. 'cm2'
     * @return string
     */
    public function get_unit($unit): string
    {
        $units = [
            'cm' => "<var>cm</var>",
            'cm2' => "<var>cm<sup>2</sup></var>",
            'cm3' => "<var>cm<sup>3</sup></var>"
        ];

        return $units[$unit];
    }
}
