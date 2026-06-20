<?php

declare(strict_types=1);

namespace CustomMobsWeapons\entity;

use pocketmine\entity\Monster;
use pocketmine\player\Player;
use pocketmine\world\Position;

class Pyrox extends Monster{

    public static function getNetworkTypeId() : string{
        return "custom:pyrox";
    }

    protected function initEntity() : void{
        parent::initEntity();
        $this->setMaxHealth(80);
        $this->setHealth(80);
    }

    public function getName() : string{
        return "Pyrox";
    }

    public function onUpdate(int $currentTick) : bool{
        $parent = parent::onUpdate($currentTick);

        $target = $this->getTargetEntity();

        if($target instanceof Player){
            $distance = $this->getPosition()->distance($target->getPosition());

            if($distance < 2){
                $target->setOnFire(5);
                $target->setHealth(max(0, $target->getHealth() - 2));
            }
        }

        return $parent;
    }
}
