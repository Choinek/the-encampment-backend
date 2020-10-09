<?php
namespace VundorTheEncampment\Object;

use Serializable;

interface GameObjectInterface extends Serializable
{
    public function getId(): string;

}