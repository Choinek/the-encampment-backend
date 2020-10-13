<?php

namespace VundorTheEncampment;

use VundorTheEncampment\Action\AcceptCartsAction;
use VundorTheEncampment\Action\LoginAction;
use VundorTheEncampment\Action\MessageAction;
use VundorTheEncampment\Action\PutCartAction;
use VundorTheEncampment\Action\RoomAction;

class ParamsMap
{
    /**
     * @Group Login
     * @see LoginAction
     */
    const LOGIN_ACTION_PARAM = 'l';

    /**
     * @Group Login
     * @see RoomAction
     */
    const ROOM_ACTION_PARAM = 'r';

    /**
     * @Group Chat
     * @see MessageAction
     */
    const MESSAGE_ACTION_PARAM = 'm';

    /**
     * @Group Game
     * @see PutCartAction
     */
    const PUT_CART_ACTION_PARAM = 'pc';

    /**
     * @Group Game
     * @see AcceptCartsAction
     */
    const ACCEPT_CARTS_ACTION_PARAM = 'ac';

    /**
     * Responses
     */
    const PLAYERS_COLLECTION_PARAM = 'p';
    const RESPONSE_ITERATOR_PARAM = 'i';
    const DAY_ITERATOR_PARAM = 'd';
    const GAME_STAGE_PARAM = 's';

    /**
     * @var string[]
     */
    public static $handlers = [
        self::LOGIN_ACTION_PARAM        => \VundorTheEncampment\Action\LoginAction::class,
        self::MESSAGE_ACTION_PARAM      => \VundorTheEncampment\Action\MessageAction::class,
        self::ROOM_ACTION_PARAM         => \VundorTheEncampment\Action\RoomAction::class,
        self::PUT_CART_ACTION_PARAM     => \VundorTheEncampment\Action\PutCartAction::class,
        self::ACCEPT_CARTS_ACTION_PARAM => \VundorTheEncampment\Action\AcceptCartsAction::class,
    ];
}


