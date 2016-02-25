<?php

namespace Evaneos;

class Book
{
    public $id;
    public $title;
    public $slug;
    public $pages;

    public function __construct($id, $title, $pages = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->slug = $id . '_' . $title;
        $this->pages = $pages;
    }
}