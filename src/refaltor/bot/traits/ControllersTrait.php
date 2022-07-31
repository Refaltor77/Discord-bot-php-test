<?php

namespace refaltor\bot\traits;

use refaltor\bot\controllers\BotController;
use refaltor\bot\controllers\ConfigController;

trait ControllersTrait
{
    public function getConfigController(): ConfigController {
        return $this->configController;
    }

    public function getBotController(): BotController {
        return $this->botController;
    }
}