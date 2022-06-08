<?php

namespace entity\sword;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\EntityDataHelper;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;

use entity\sword\entity\Sword;

class Main extends PluginBase{ 

  public function onLoad() : void{
      $this->getLogger()->info("Loading Throwable Sword");
  }
    
  public function onEnable() : void{
      $this->getLogger()->info("Enabled Throwable Sword");
	    EntityFactory::getInstance()->register(Sword::class, function(World $world, CompoundTag $nbt) : Sword{
		          return new SwordEntity(EntityDataHelper::parseLocation($nbt, $world), null, $nbt);
	    }, ['Sword']);        
  }
  
  public function onDisable() : void{
      $this->getLogger()->info("Disabled Throwable Sword");   
  }

}
