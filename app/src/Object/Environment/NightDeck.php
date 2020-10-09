<?php
namespace VundorTheEncampment\Object\Environment;

class NightDeck extends Deck
{
    public function __construct(int $cardNumber = 30, string $cardClassName = NightCard::class)
    {
        parent::__construct($cardNumber, $cardClassName);
    }
}