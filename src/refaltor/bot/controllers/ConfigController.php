<?php

namespace refaltor\bot\controllers;

use refaltor\bot\utils\JsonConfig;

class ConfigController
{
    private JsonConfig $config;

    public function __construct(JsonConfig $config)
    {
        $this->config = $config;
    }

    public function getToken(): string {
        return $this->config->get('token');
    }

    public function getPrefix(): string {
        return $this->config->get('prefix');
    }
}