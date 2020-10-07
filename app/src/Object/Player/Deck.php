<?php
namespace VundorTheEncampment\Object\Player;

class Deck extends \VundorTheEncampment\Object\Deck
{
    public function __construct(int $cardNumber = 15, string $cardClassName = Card::class)
    {
        parent::__construct($cardNumber, $cardClassName);
    }
}