<?php

declare(strict_types=1);

namespace CustomMobsWeapons\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use CustomMobsWeapons\Main;

class CustomCommand extends Command{

    private Main $plugin;

    public function __construct(Main $plugin){
        parent::__construct("custom", "Commande Custom");

        $this->plugin = $plugin;
        $this->setPermission("custom.use");
    }

    public function execute(CommandSender $sender, string $label, array $args) : bool{

        if(!$sender instanceof Player){
            $sender->sendMessage("Commande uniquement en jeu.");
            return true;
        }

        if(!isset($args[0])){
            $sender->sendMessage("/custom give");
            $sender->sendMessage("/custom spawn");
            return true;
        }

        switch($args[0]){

            case "give":
                $sender->sendMessage("Armes custom bientôt ajoutées.");
                break;

            case "spawn":
                $sender->sendMessage("Mobs custom bientôt ajoutés.");
                break;

            default:
                $sender->sendMessage("Sous-commande inconnue.");
        }

        return true;
    }
}
