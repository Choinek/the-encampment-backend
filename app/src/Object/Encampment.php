<?php

namespace VundorTheEncampment\Object;

use VundorTheEncampment\Common\IdTrait;
use VundorTheEncampment\Common\SerializeTrait;

class Encampment implements GameObjectInterface
{
    use SerializeTrait, IdTrait;

    const MAX_GAME_STAGE = 1;

    protected $id;

    /** @var Player[]  */
    protected $players = [];

    /** @var Player\ActiveCards */
    protected $playersActiveCards;

    /** @var Environment\ActiveCards */
    protected $environmentActiveCards;

    /** @var Environment\DayDeck  */
    protected $environmentDayDeck;

    /** @var Environment\NightDeck  */
    protected $environmentNightDeck;

    /**
     * @var int
     */
    public static $daysIterator = 1;

    /**
     * @var int
     */
    public static $gameStage = 0;

    /**
     * Encampment constructor.
     * @param Player $player
     */
    public function __construct(Player $player)
    {
        $this
            ->setId(uniqid('room_'))
            ->setPlayerList([$player]);
        $this->playersActiveCards = new Player\ActiveCards();
        $this->environmentDayDeck = new Environment\DayDeck();
        $this->environmentNightDeck = new Environment\NightDeck();
        $this->environmentActiveCards = new Environment\ActiveCards();
    }

    /**
     * @param string $uuid
     * @return $this
     */
    public function setId(string $uuid)
    {
        $this->id = $uuid;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param array $playerList
     * @return $this
     */
    public function setPlayerList(array $playerList)
    {
        $this->players = $playerList;

        return $this;
    }

    /**
     * @return Player[]
     */
    public function getPlayerList(): array
    {
        return $this->players;
    }

    public function nextDay()
    {
        self::$daysIterator++;
    }

    public function nextStage()
    {
        if (self::$gameStage < self::MAX_GAME_STAGE) {
            self::$gameStage++;
        }

        self::$gameStage = 0;
    }

    public function getPublicInfo(): array
    {
        $playersPublicData = [];
        foreach ($this->players as $player) {
            $playersPublicData[] = $player->getPublicInfo();
        }
        return [
            'day' => static::$daysIterator,
            'stage' => static::$gameStage,
            'environmentDayCards' => $this->environmentDayDeck->getPublicData(),
            'environmentNightCards' => $this->environmentNightDeck->getPublicData(),
            'environmentActiveCards' => $this->environmentActiveCards->getPublicData(),
            'playersActiveCards' => $this->playersActiveCards->getPublicData(),
            'players' => $playersPublicData,
        ];
    }

}
