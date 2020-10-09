<?php

namespace VundorTheEncampment\Object;

use VundorTheEncampment\Common\IdTrait;
use VundorTheEncampment\Common\SerializeTrait;

class Room implements GameObjectInterface
{
    use SerializeTrait, IdTrait;

    protected $id;

    /** @var Player[]  */
    protected $players = [];

    /** @var Card[] */
    protected $playableCards = [];

    /** @var Card[]  */
    protected $environmentCards = [];

    public function __construct(Player $player)
    {
        $this
            ->setId(uniqid('room_'))
            ->setPlayerList([$player]);
    }

    public function setId(string $uuid)
    {
        $this->id = $uuid;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setPlayerList(array $playerList)
    {
        $this->players = $playerList;

        return $this;
    }

    public function getPlayerList(): array
    {
        return $this->players;
    }
}
