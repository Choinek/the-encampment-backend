<?php
namespace VundorTheEncampment\Object\Environment;

class Deck extends \VundorTheEncampment\Object\Deck
{
    public function __construct(int $cardNumber = 30, string $cardClassName = Card::class)
    {
        parent::__construct($cardNumber, $cardClassName);
    }
}