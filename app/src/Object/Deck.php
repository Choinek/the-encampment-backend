<?php

namespace VundorTheEncampment\Object;

use Exception;
use ReflectionClass;

class Deck
{
    /**
     * @var Card[]
     */
    protected $cards = [];

    public function __construct(int $cardNumber = 15, string $cardNamespace = Card::class)
    {
        $this
            ->buildDeck($cardNumber, $cardNamespace)
            ->shuffle();
    }

    public function drawCard()
    {
        if ($this->getCardCount() > 0) {
            return array_shift($this->cards);
        }
        throw new Exception('No cards remaining');
    }

    public function getCardCount(): int
    {
        return count($this->cards);
    }

    public function shuffle()
    {
        shuffle($this->cards);

        return $this;
    }

    protected function buildDeck(int $cardNumber, string $cardNamespace)
    {
        if (!(new ReflectionClass($cardNamespace))->implementsInterface(CardInterface::class)) {
            throw new Exception('Wrong card class given');
        }
        for ($i = 0; $i < $cardNumber; $i++) {
            $this->cards[] = new $cardNamespace;
        }

        return $this;
    }
}