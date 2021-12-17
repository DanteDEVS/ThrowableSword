<?php

namespace entity/sword/entity;

use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\MobEquipmentPacket;
use pocketmine\network\mcpe\protocol\types\inventory\ItemStackWrapper;
use pocketmine\item\Item;

class Sword extends Entity{
    public const NETWORK_ID = self::ARMOR_STAND;

    public $width = 2.0;
    public $height = 2.0;
    
    protected function sendSpawnPacket(Player $player) : void{
        parent::sendSpawnPacket($player);
        $pk = new MobEquipmentPacket();
        $pk->entityRuntimeId = $this->getId();
        $pk->item = ItemStackWrapper::legacy(new Item(Item::IRON_SWORD));
        $pk->inventorySlot = 0;
        $pk->hotbarSlot = 0;
        $player->dataPacket($pk);
    }

    public function setPose() : void{
        $this->propertyManager->setInt(self::DATA_ARMOR_STAND_POSE_INDEX, 8);
    }
}
