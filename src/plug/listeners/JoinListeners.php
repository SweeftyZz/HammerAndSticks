<?php
namespace plug\listeners;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Server;
use pocketmine\utils\Color;
use pocketmine\utils\TextFormat;

class JoinListeners implements Listener{


    public function onJoin(PlayerJoinEvent $e):void{
        $player = $e->getPlayer();
        $e->setJoinMessage($player->getNameTag() . TextFormat::GRAY . "[" . TextFormat::GREEN . "+".TextFormat::GRAY."]");

    }

    public function OnQuit(PlayerQuitEvent $e): void {
        $player = $e->getPlayer();
        if(!$player->hasPlayedBefore()){
            Server::getInstance()->broadcastMessage(TextFormat::GREEN . $player->getDisplayName() . "a rejoins pour la premiere fois ! (/bvn)");
            return;
        }
        $e->setQuitMessage($player->getNameTag(). TextFormat::GRAY . "[" . TextFormat::RED . "+".TextFormat::GRAY."]");
    }
}