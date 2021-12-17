<?php

namespace entity\sword;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;

use entity\sword\entity\Sword;

class Main extends PluginBase{ 

  public function onLoad(){
    $this->getLogger()->info("Loading Throwable Sword");
  }
    
  public function onEnable(){
    $this->getLogger()->info("Enabled Throwable Sword");
    Entity::registerEntity(Sword::class, true);
  }
  
  public function onDisable(){
    $this->getLogger()->info("Disabled Throwable Sword");   
  }

}
