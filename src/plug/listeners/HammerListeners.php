<?php

namespace plug\listeners;

use pocketmine\block\Block;
use pocketmine\block\BlockIds;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;

class HammerListeners implements Listener{


    public function OnBreak(BlockBreakEvent $e): void{
        $player = $e->getPlayer();
        $radius = 1;
        $block= $e->getBlock();
        $bannedblock= [BlockIds::GRASS,BlockIds::SNOW_LAYER,BlockIds::RED_FLOWER,BlockIds::YELLOW_FLOWER];
        if($e->getPlayer()->getInventory()->getItemInHand()->getCustomName() == TextFormat::GREEN . "Hammer") {
            if($block->canClimb() || $block->canPassThrough()){
                $e->setCancelled(false);
                return;
            }
            for ($xx = -($radius); $xx <= $radius; $xx++) {
                for ($yy = -($radius); $yy <= $radius; $yy++) {

                    for ($zz = -($radius); $zz <= $radius; $zz++) {
                        $e->getPlayer()->getLevel()->setBlockIdAt($block->x+ $xx, $block->y + $yy, $block->z + $zz, 0);
                    }
                }


            }
        }
        }



}