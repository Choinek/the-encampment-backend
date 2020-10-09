<?php
namespace VundorTheEncampment\Object\Environment;

class DayDeck extends Deck
{
    public function __construct(int $cardNumber = 30, string $cardClassName = DayCard::class)
    {
        parent::__construct($cardNumber, $cardClassName);
    }
}