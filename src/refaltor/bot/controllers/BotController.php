<?php

namespace refaltor\bot\controllers;

use Discord\Discord;
use Discord\Parts\OAuth\Application;
use Discord\Repository\GuildRepository;

class BotController
{
    private Discord $discord;

    public function __construct(Discord $discord){
        $this->discord = $discord;
    }

    public function getBot(): Discord {
        return $this->discord;
    }

    public function getGuilds(): GuildRepository {
        return $this->getBot()->guilds;
    }

    public function getApplication(): Application {
        return $this->getBot()->application;
    }
}