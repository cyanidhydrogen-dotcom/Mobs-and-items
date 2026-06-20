<?php

declare(strict_types=1);

namespace CustomMobsWeapons\item;

use pocketmine\item\Sword;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ToolTier;
use pocketmine\entity\Living;

class TwinBlades extends Sword{

    public function __construct(){
        parent::__construct(
            new ItemIdentifier(9002),
            "Twin Blades",
            ToolTier::IRON()
        );

        $this->setCustomName("§bLames Jumelles");
        $this->setLore([
            "§7Armes rapides",
            "§7Faibles dégâts mais vitesse élevée"
        ]);
    }

    public function onAttackEntity(Living $victim) : bool{
        $victim->setHealth(max(0, $victim->getHealth() - 3));
        return parent::onAttackEntity($victim);
    }

    public function getAttackCooldownTicks() : int{
        return 5; // très rapide
    }
}
