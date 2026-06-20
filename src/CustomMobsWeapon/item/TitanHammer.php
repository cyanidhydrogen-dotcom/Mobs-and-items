<?php

declare(strict_types=1);

namespace CustomMobsWeapons\item;

use pocketmine\item\Sword;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ToolTier;
use pocketmine\entity\Living;

class TitanHammer extends Sword{

    public function __construct(){
        parent::__construct(
            new ItemIdentifier(9001),
            "Titan Hammer",
            ToolTier::DIAMOND()
        );

        $this->setCustomName("§cMarteau Titan");
        $this->setLore([
            "§7Arme lourde",
            "§7Très lente mais extrêmement puissante"
        ]);
    }

    public function onAttackEntity(Living $victim) : bool{
        $victim->setHealth(max(0, $victim->getHealth() - 10)); // gros dégâts
        $victim->knockBack(1.2, 0, 0);

        return parent::onAttackEntity($victim);
    }

    public function getAttackCooldownTicks() : int{
        return 30; // très lent
    }
}
