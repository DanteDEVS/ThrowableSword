<?php

namespace entity\sword\tasks;

use pocketmine\scheduler\Task;
use entity\sword\entity\Sword;

class despawnsword extends Task{
    
    public $sword;

    public function __construct(Sword $entity){
        $this->sword = $entity;
    }

    public function onRun(){
        if(!$this->sword->isClosed()){
            $this->sword->close();
        }
    }
}
