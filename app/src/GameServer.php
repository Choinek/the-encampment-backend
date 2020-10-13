<?php

namespace VundorTheEncampment;

use swoole_http_client;
use VundorTheEncampment\Object\Player;

/**
 * Class GameServer
 * @package VundorTheEncampment
 */
class GameServer
{
    /**
     * @var swoole_http_client
     */
    public $connection;

    /**
     * @var Player[]
     */
    public $players = [];

    /**
     * @var array
     */
    public $sessions = [];

    /**
     * GameServer constructor.
     * @param $host
     * @param $port
     */
    public function __construct($host, $port)
    {
        $connection = new swoole_http_client($host, $port);

        $connection->on('message', function ($connection, $frame) {

            $data = json_decode($frame->data, true);

            if (isset($data[ParamsMap::LOGIN_ACTION_PARAM])) {
                if (!isset($this->players[$data[ParamsMap::LOGIN_ACTION_PARAM]])) {
                    if ($sessionId = $this->loginNewPlayer($data[ParamsMap::LOGIN_ACTION_PARAM])) {
                        $connection->push(json_encode(['session_id' => $sessionId]));
                    }
                }

                if (isset($data[ParamsMap::ROOM_JOIN_ACTION_PARAM])) {
                    // @todo room should join player to exact server - create new or join exiting with password
                }
            }
        });

        $connection->upgrade('/', function ($connection) {
            echo $connection->body;
            $connection->push(json_encode(['gameserver' => 1]));
        });

        $this->connection = $connection;
    }

    /**
     * @param $login
     */
    public function loginNewPlayer($login)
    {
        if ($login) {
            Server::log("Creating new player object: {$login}");
            $player = new Player($login);
            $this->players[$login] = $player;
            $this->sessions[$player->getCurrentSessionToken()] = $player;

            return $player->getCurrentSessionToken();
        }
    }

    /**
     *
     */
    public function run()
    {
        swoole_timer_tick(3000, function ($timerId) {
            $data = [
                'players'  => [],
                'sessions' => []
            ];

            /**
             * @var int $playerId
             * @var Player $player
             */
            foreach ($this->players as $playerId => $player) {
                $data['players'][$playerId] = $player->getPublicInfo();
            }

            /**
             * @var Player $player
             */
            foreach ($this->sessions as $sessionId => $player) {
                $data['sessions'][$sessionId] = $player->getLogin();
            }

            Server::$gameworldTable->set('players', [
                'data' => json_encode($data['players'])
            ]);

            Server::$gameworldTable->set('sessions', [
                'data' => json_encode($data['sessions'])
            ]);
        });
    }

}
