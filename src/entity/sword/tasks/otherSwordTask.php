
<?php

namespace entity\sword\tasks;

use pocketmine\scheduler\Task;
use entity\sword\entity\Sword;
use pocketmine\Player;

class otherSwordTask extends Task{

    public function __construct(Game $plugin, Sword $sword){
        $this->plugin = $plugin;
        $this->sword = $sword;
    }

    public function onRun(int $ct){
        if(!$this->sword->isClosed()){
            foreach($this->plugin->players as $player){
                if($this->sword->asVector3()->distance($player) < 5){
                    }
                }
            }
        }
        if($this->sword->isCollided == true){
            $this->plugin->plugin->getScheduler()->scheduleDelayedTask(new despawnsword($this->sword), 0);
        }
    }
}
