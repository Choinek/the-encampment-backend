<?php

namespace VundorTheEncampment\Object;

/**
 * Class Player
 * @package VundorTheEncampment\Object
 */
class Player
{
    const ROOM_PARAM = 'r';
    const MESSAGE_PARAM = 'm';
    const LOGIN_PARAM = 'l';

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $currentSessionToken = '';

    /**
     * Player constructor.
     * @param $id
     */
    public function __construct($login)
    {
        $this->login = $login;
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

        $this->currentSessionToken = $sessionToken;
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     */
    public function setPosition($x, $y): bool
    {
        $this->x = $x;
        $this->y = $y;

        return true;
    }

    /**
     * @return array
     */
    public function getPublicInfo()
    {
        return [
            // current hand etc here
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
