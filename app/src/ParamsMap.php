<?php

namespace VundorTheEncampment;

class ParamsMap
{
    /**
     * Actions
     */
    const LOGIN_PARAM = 'l';
    const MESSAGE_PARAM = 'm';
    const ROOM_PARAM = 'r';

    /**
     * Responses
     */
    const PLAYERS_COLLECTION_PARAM = 'p';
    const RESPONSE_ITERATOR_PARAM = 'i';
    const DAY_ITERATOR_PARAM = 'd';
    const GAME_STATE_PARAM = 's';


    public static $handlers = [
        self::LOGIN_PARAM   => \VundorTheEncampment\Action\Login::class,
        self::MESSAGE_PARAM => \VundorTheEncampment\Action\Message::class,
        self::ROOM_PARAM => \VundorTheEncampment\Action\Room::class,
    ];
}


