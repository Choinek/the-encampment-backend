<?php

namespace VundorTheEncampment\Action;

/**
 * Interface ActionInterface
 * @package VundorTheEncampment\Action
 */
interface ActionInterface
{
    /**
     * @param array $params
     * @param $gameServer
     * @return bool
     */
    public function process(array $params, $gameServer): bool;
}
