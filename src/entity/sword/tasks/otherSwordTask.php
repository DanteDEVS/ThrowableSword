<?php

namespace entity\sword\tasks;

use pocketmine\scheduler\Task;
use entity\sword\entity\Sword;

class otherSwordTask extends Task{
    
    public $sword;
    public $plugin;

    public function __construct(Sword $plugin, Sword $sword){
        $this->plugin = $plugin;
        $this->sword = $sword;
    }

    public function onRun(): void{
        //if(!$this->sword->isClosed()){
            //foreach($this->plugin->players as $player){
                //if($this->sword->getPosition()->asVector3()->distance($player) < 2){
                    //if($this->plugin->getMurderer() !== $player){
                    //    $this->plugin->killPlayer($player, "§eThe Murderer threw their knife at you");
                    //    $this->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($this->sword), 0);
                    //}
        //        }
        //    }
        //}
       // if($this->sword->isCollided == true){
       //     $this->plugin->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($this->sword), 0);
        //}
    }
}
