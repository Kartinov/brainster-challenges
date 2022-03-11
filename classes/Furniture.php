<?php

class Furniture
{
    protected $width;
    protected $height;
    protected $length;
    protected $is_for_seating;
    protected $is_for_sleeping;

    public function __construct(float $width, float $height, float $length)
    {
        $this->set_width($width)->set_height($height)->set_length($length);
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

    public function is_for_seating() {
        return $this->is_for_seating;
    }

    public function set_is_for_sleeping(bool $is_it) {
        $this->is_for_sleeping = $is_it;
        return $this;
    }

    public function is_for_sleeping() {
        return $this->is_for_sleeping;
    }

    function area()
    {
        return $this->get_width() * $this->get_length();
    }

    function volume()
    {
        return $this->area() * $this->get_height();
    }
}