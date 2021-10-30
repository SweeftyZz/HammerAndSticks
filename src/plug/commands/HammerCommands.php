<?php

namespace plug\commands;


use plug\HManager;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class HammerCommands extends Command
{
public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
{
    parent::__construct($name, $description, $usageMessage, $aliases);
}


    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            $player = $sender;
                    $player->sendMessage("prout");
                    $hmanager = new HManager(TextFormat::GREEN ."Hammer",1,$player);
                    $hmanager->give();



        }else{
            $sender->sendMessage("Vous n'êtes pas un joueur !");
        }
    }
}
