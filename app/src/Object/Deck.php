<?php

namespace VundorTheEncampment\Object;

use Exception;
use ReflectionClass;
use VundorTheEncampment\Common\IdTrait;
use VundorTheEncampment\Common\SerializeTrait;

abstract class Deck implements GameObjectInterface
{
    use SerializeTrait, IdTrait;

    /**
     * @var Card[]
     */
    protected $cards = [];

    protected $cardClassName;

    public function __construct(int $cardNumber = 15, string $cardClassName = Card::class)
    {
        $this->cardClassName = $cardClassName;

        $this
            ->buildDeck($cardNumber)
            ->shuffle();

        $this->id = uniqid('deck');
    }

    public function drawCard()
    {
        if ($this->getCardCount() > 0) {
            return array_shift($this->cards);
        }
        throw new Exception('No cards remaining');
    }

    public function addCard($card)
    {
        if ((new ReflectionClass($this->cardClassName))->isInstance($card)) {
            $this->cards[] = $card;
            $this->shuffle();
        }
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

    protected function buildDeck(int $cardNumber)
    {
        if (!(new ReflectionClass($this->cardClassName))->implementsInterface(CardInterface::class)) {
            throw new Exception('Wrong card class given');
        }
        for ($i = 0; $i < $cardNumber; $i++) {
            $this->cards[] = new $this->cardClassName;
        }

        return $this;
    }

}
