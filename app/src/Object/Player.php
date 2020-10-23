<?php

namespace VundorTheEncampment\Object;

use VundorTheEncampment\Common\IdTrait;
use VundorTheEncampment\Common\SerializeTrait;
use VundorTheEncampment\Object\Player\Deck as PlayerDeck;

/**
 * Class Player
 * @package VundorTheEncampment\Object
 */
class Player implements GameObjectInterface
{
    use SerializeTrait, IdTrait;

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $currentSessionToken = '';

    /**
     * @var PlayerDeck
     */
    protected $playerDeck;

    /**
     * Player constructor.
     * @param $login
     */
    public function __construct($login)
    {
        $this->login = $login;
        $this->playerDeck = new PlayerDeck();
        $this->regenerateSessionToken();
    }

    /**
     * Refresh session token and set it on player
     */
    public function regenerateSessionToken()
    {
        $sessionToken = substr(md5($this->login ?: uniqid()), 0, 6) . uniqid(null) . round(pow(microtime(true) * 10000, 1.01));
        usleep(rand(1, 1000));
        $sessionToken .= uniqid(null);

        $this->id = $this->currentSessionToken = $sessionToken;
    }

    /**
     * @return array
     */
    public function getPublicInfo()
    {
        return [
            'name' => $this->getLogin(),
            'deck' => $this->playerDeck->getPublicData(),
        ];
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getCurrentSessionToken()
    {
        return $this->currentSessionToken;
    }

}
