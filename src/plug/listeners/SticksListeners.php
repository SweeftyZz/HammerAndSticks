<?php

namespace plug\listeners;

use plug\StickTypes;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat;

class SticksListeners implements Listener{


    public function onUse(PlayerInteractEvent $e): void{
        $player = $e->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        $action = $e->getAction();
        if($item->getCustomName() === StickTypes::getDiamondStick() && $action == (PlayerInteractEvent::LEFT_CLICK_AIR || PlayerInteractEvent::LEFT_CLICK_BLOCK)){
            $player->sendMessage(TextFormat::GREEN . "Vous avez utilisé le baton de " . TextFormat::RED . "SPEED");
            $player->addEffect(new EffectInstance(Effect::getEffectByName("SPEED"),120000,2,true));
        }
        if($item->getCustomName() === StickTypes::getIronStick() && $action == (PlayerInteractEvent::LEFT_CLICK_AIR || PlayerInteractEvent::LEFT_CLICK_BLOCK)){
            $player->sendMessage(TextFormat::GREEN . "Vous avez utilisé le baton de " . TextFormat::RED . "FORCE");
            $player->addEffect(new EffectInstance(Effect::getEffectByName("STRENGTH"),120000,2,true));
        }

    }
}
