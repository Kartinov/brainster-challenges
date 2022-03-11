<?php

class Furniture
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
     * getters and setters methods
     */
    public function set_width($width)
    {
        $this->width = $width;
        return $this;
    }

    public function get_width()
    {
        return $this->width;
    }

    public function set_height($height)
    {
        $this->height = $height;
        return $this;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_length($length)
    {
        $this->length = $length;
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
        return $this->get_width() * $this->get_length();
    }

    public function volume()
    {
        return $this->area() * $this->get_height();
    }

    public function print_product_purpose()
    {
        if ($this->is_for_sleeping() && $this->is_for_sleeping()) {
            return "for sleeping and seating";
        }

        return !$this->is_for_sleeping() ? "seating only" : "sleeping only";
    }
}
