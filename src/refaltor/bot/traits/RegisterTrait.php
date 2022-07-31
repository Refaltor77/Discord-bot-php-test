<?php

namespace refaltor\bot\traits;

use Discord\Discord;
use Discord\Parts\Interactions\Command\Command;
use Discord\Parts\Interactions\Interaction;
use Discord\WebSockets\Event;
use refaltor\bot\controllers\CommandsController;

trait RegisterTrait
{
    private array $commands = [];

    public function registerCommand(string $class): void {
        $this->commands[] = $class;
    }

    public function startingService(): void {
        $bot = $this->getBotController();

        $this->onLoad();

        $this->launchCommands();
        $bot->getBot()->run();
    }

    public function launchCommands(): void {
        foreach ($this->commands as $cmdClass) {
            $class = new $cmdClass();
            if ($class instanceof CommandsController) {
                $commandName = $class->getName();

                $this->getBotController()->getBot()->on(Event::READY, function (Discord $discord) use ($class): void {
                    $command = new Command($discord,
                        ['name' => $class->getName(), 'description' => $class->getDescription()]);
                    $discord->application->commands->save($command);
                });

                $bot = $this->getBotController()->getBot();

                $this->getBotController()->getBot()->listenCommand($commandName, function (Interaction $interaction) use ($class, $bot): void {
                    $class->execute($interaction, $bot);
                });
            }
        }
    }
}