<?php
namespace VundorTheEncampment\Object;

abstract class ActiveCards
{
    /**
     * @var Card[]
     */
    protected $cards = [];

    protected $cardClassName;

    public function __construct(string $cardClassName = Card::class)
    {
        $this->cardClassName = $cardClassName;
    }

    public function pushCards(array $cards)
    {
        foreach ($cards as $card) {
            $this->pushCard($card);
        }

        return $this;
    }

    public function pushCard(Card $card): self
    {
        $this->cards[$card->getId()] = $card;

        return $this;
    }

    public function getCard(string $cardId): ?Card
    {
        return $this->cards[$cardId] ?? null;
    }

    public function getPublicData()
    {
        $cardsData = [];
        foreach ($this->cards as $card) {
            $cardsData[$card->getId()] = $card->getCardInfo();
        }

        return $cardsData;
    }
}