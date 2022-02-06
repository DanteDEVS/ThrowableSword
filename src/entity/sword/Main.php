<?php

namespace entity\sword;

// PM4 won't be updated for now! 

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;

use entity\sword\entity\Sword;

class Main extends PluginBase{ 

  public function onLoad() : void{
    $this->getLogger()->info("Loading Throwable Sword");
  }
    
  public function onEnable() : void{
    $this->getLogger()->info("Enabled Throwable Sword");
    Entity::registerEntity(Sword::class, true);
  }
  
  public function onDisable() : void{
    $this->getLogger()->info("Disabled Throwable Sword");   
  }

}
