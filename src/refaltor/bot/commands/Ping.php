<?php

namespace refaltor\bot\commands;

use Discord\Builders\MessageBuilder;
use Discord\Discord;
use Discord\Parts\Embed\Embed;
use Discord\Parts\Interactions\Interaction;
use refaltor\bot\controllers\CommandsController;

class Ping extends CommandsController
{

    public function __construct(string $commandName = 'ping', string $description = 'c pour ping haha')
    {
        parent::__construct($commandName, $description);
    }

    public function execute(Interaction $interaction, Discord $bot): void
    {
        $interaction->respondWithMessage(
            MessageBuilder::new()
            ->setEmbeds([
                (new Embed($bot))
                    ->setAuthor('refaltor')
                    ->setTitle('Pong !')
            ])
        );
    }
}