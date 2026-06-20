<?php

declare(strict_types=1);

namespace CustomMobsWeapons\entity;

use pocketmine\entity\Monster;
use pocketmine\player\Player;

class Noxar extends Monster{

    public static function getNetworkTypeId() : string{
        return "custom:noxar";
    }

    protected function initEntity() : void{
        parent::initEntity();
        $this->setMaxHealth(120);
        $this->setHealth(120);
    }

    public function getName() : string{
        return "Noxar";
    }

    public function onUpdate(int $currentTick) : bool{
        $parent = parent::onUpdate($currentTick);

        $target = $this->getTargetEntity();

        if($target instanceof Player){
            $distance = $this->getPosition()->distance($target->getPosition());

            if($distance < 2){
                $target->knockBack(2.0, 0, 0);
                $target->setHealth(max(0, $target->getHealth() - 6));
            }
        }

        return $parent;
    }
}
