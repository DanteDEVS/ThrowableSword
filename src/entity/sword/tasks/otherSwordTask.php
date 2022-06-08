<?php

namespace entity\sword\tasks;

use pocketmine\scheduler\Task;
use entity\sword\other\other;
use entity\sword\entity\Sword;

class otherSwordTask extends Task{
    
    public $plugin;
    public $sword;

    public function __construct(other $plugin, Sword $sword){
        $this->plugin = $plugin;
        $this->sword = $sword;
    }

    public function onRun(){
        if(!$this->sword->isClosed()){
            foreach($this->plugin->players as $player){
                if($this->sword->asVector3()->distance($player) < 5){
                    $this->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($this->sword), 0)
                }
        }
        if($this->sword->isCollided == true){
            $this->plugin->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($this->sword), 0);
        }
    }
}
