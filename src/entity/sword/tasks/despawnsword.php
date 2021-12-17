<?php

namespace mm\tasks;

use pocketmine\scheduler\Task;
use entity\sword\entity\Sword;

class DespawnSwordEntity extends Task{

    public function __construct(Sword $entity){
        $this->sword = $entity;
    }

    public function onRun(int $ct){
        if(!$this->sword->isClosed()){
            $this->sword->close();
        }
    }
}
