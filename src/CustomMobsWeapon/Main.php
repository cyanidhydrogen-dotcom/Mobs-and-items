<?php

declare(strict_types=1);

namespace CustomMobsWeapons;

use pocketmine\plugin\PluginBase;
use CustomMobsWeapons\command\CustomCommand;

class Main extends PluginBase{

    protected function onEnable() : void{
        $this->getLogger()->info("CustomMobsWeapons activé !");

        $this->getServer()->getCommandMap()->register(
            "custom",
            new CustomCommand($this)
        );
    }

    protected function onDisable() : void{
        $this->getLogger()->info("CustomMobsWeapons désactivé !");
    }
}
