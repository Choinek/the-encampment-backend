<?php

namespace VundorTheEncampment\Common;

trait IdTrait
{
    protected $id;

    public function getId(): string
    {
        return $this->id;
    }
}