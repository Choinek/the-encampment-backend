<?php

namespace VundorTheEncampment\Object;

class Room
{
    protected $id;

    /** @var Player[]  */
    protected $players = [];

    /** @var Card[] */
    protected $playableCards = [];

    /** @var Card[]  */
    protected $environmentCards = [];

    public function __construct(?string $id, Player $player)
    {
        if (is_null($id)) {
            $id = uniqid('room_');
        }
        $this
            ->setId($id)
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
