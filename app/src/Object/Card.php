<?php

namespace VundorTheEncampment\Object;

abstract class Card implements CardInterface
{
    protected $title;

    protected $description;

    abstract public function play(): bool;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
