<?php

namespace VundorTheEncampment\Object\Environment;

abstract class Card extends \VundorTheEncampment\Object\Card
{
    public function play(): bool
    {
        return true;
    }
}