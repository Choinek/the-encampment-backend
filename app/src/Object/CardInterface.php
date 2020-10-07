<?php
namespace VundorTheEncampment\Object;

interface CardInterface
{
    public function play(): bool;

    public function getTitle(): string;

    public function getDescription(): string;

}
