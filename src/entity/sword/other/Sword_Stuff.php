<?php

namespace entity\sword\other;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\block\Block;
use pocketmine\Player;
use entity\sword\entity\Sword;

class Sword_Stuff extends Sword{  

    public function onInteract(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();
            }
            if($event->getItem()->getId() == Item::IRON_SWORD){
                if(!isset($this->cooldown[$player->getName()])){
                    if($this->phase == 1){
                        $this->createSwordEntity($player);
                    }
                }
            }
        }
    
    public function createSword(Player $player){
        $nbt = Entity::createBaseNBT(
            $player->getTargetBlock(2),
            $player->getDirectionVector(),
            $player->yaw - 75,
            $player->pitch
        );
        
        $sword = new Sword($player->getLevel(), $nbt);
        $sword->setMotion($sword->getMotion()->multiply(1.4));
        $sword->setPose();
        $sword->setInvisible();
        $sword->spawnToAll();
        $this->plugin->getScheduler()->scheduleRepeatingTask(new CollideTask($this, $sword), 0);
        $this->plugin->getScheduler()->scheduleDelayedTask(new DespawnSwordEntity($sword), 100);
        $this->cooldown[$player->getName()] = microtime(true) + 7;
    }
}
