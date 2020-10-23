<?php

namespace VundorTheEncampment\Object;

use VundorTheEncampment\Common\IdTrait;
use VundorTheEncampment\Common\SerializeTrait;

abstract class Card implements CardInterface, GameObjectInterface
{
    use SerializeTrait, IdTrait;

    protected $title;

    protected $description;

    abstract public function play(): bool;

    public function __construct()
    {
        $this->id = uniqid('card_');
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return 'Lorem ipsum dolor...';
        return $this->description;
    }

    public function getCardInfo(): array
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
        ];
    }
}
