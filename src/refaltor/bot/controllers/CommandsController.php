<?php

namespace refaltor\bot\controllers;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Parts\Interactions\Interaction;

abstract class CommandsController
{
    private string $commandName;
    private string $description;

    public function __construct(string $commandName, string $description)
    {
        $this->commandName = $commandName;
        $this->description = $description;
    }

    abstract public function execute(Interaction $interaction, Discord $bot): void;

    public function getName(): string {
        return $this->commandName;
    }

    public function getDescription(): string {
        return $this->description;
    }
}