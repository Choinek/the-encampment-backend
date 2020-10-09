<?php
namespace VundorTheEncampment\Object\Player;

class Card extends \VundorTheEncampment\Object\Card
{
    public function getTitle(): string
    {
        return self::class;
    }

    public function play(): bool
    {
        return true;
    }
}