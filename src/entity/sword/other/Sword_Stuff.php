<?php

namespace entity\sword\other;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\block\Block;
use pocketmine\player\Player;
use entity\sword\entity\Sword;
use entity\sword\tasks\despawnsword;
use pocketmine\entity\Location;
use pocketmine\entity\NBTEntity; // custom path

class Sword_Stuff extends Sword{  
    
    public $cooldown;

    public function onInteract(PlayerInteractEvent $event){
        $player = $event->getPlayer();
        $item = $event->getItem();
        
        if($event->getAction() === $event::RIGHT_CLICK_BLOCK){        
           if($event->getItem()->getId() == ItemIds::IRON_SWORD){
              if(!isset($this->cooldown[$player->getName()])){            
                 $this->createSword($player, $location);
              }
           }
        }
    }

    public function createSword(Player $player, Location $location){
        $nbt = NBTEntity::createBaseNBT(
            $player->getTargetBlock(2),
            $player->getDirectionVector(),
            $location->yaw - 75,
            $location->pitch
        );
        
        $sword = new Sword($player->getWorld(), $nbt);
        $sword->setMotion($sword->getMotion()->multiply(1.4));
        $sword->setPose();
        $sword->setInvisible();
        $sword->spawnToAll();
        $this->plugin->getScheduler()->scheduleRepeatingTask(new CollideTask($this, $sword), 0);
        $this->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($sword), 100);
        $this->cooldown[$player->getName()] = microtime(true) + 7;
    }
}
