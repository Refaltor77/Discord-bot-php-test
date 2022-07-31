<?php

namespace refaltor\bot;

use Discord\Discord;
use refaltor\bot\commands\Ping;
use refaltor\bot\controllers\BotController;
use refaltor\bot\controllers\ConfigController;
use refaltor\bot\traits\ControllersTrait;
use refaltor\bot\traits\RegisterTrait;
use refaltor\bot\utils\JsonConfig;

class Main
{
    use ControllersTrait;
    use RegisterTrait;

    private BotController $botController;
    private ConfigController $configController;

    public function __construct()
    {
        $config = new JsonConfig("resources/config.json");
        $this->configController = new ConfigController($config);

        $this->botController = new BotController(new Discord([
            'token' => $this->getConfigController()->getToken()
        ]));
    }

    public function onLoad(): void {
        $this->registerCommand(Ping::class);
    }

    public function onEnable(): void {

    }
}