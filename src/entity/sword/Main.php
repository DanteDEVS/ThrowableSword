<?php

namespace entity\sword;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;

use entity\sword\entity\Sword;

class Main extends PluginBase{ 

  public function onLoad() : void{
    $this->getLogger()->info("Loading Throwable Sword");
  }
    
  public function onEnable() : void{
    $this->getLogger()->info("Enabled Throwable Sword");
    EntityFactory::register(Sword::class, true);
  }
  
  public function onDisable() : void{
    $this->getLogger()->info("Disabled Throwable Sword");   
  }

}
