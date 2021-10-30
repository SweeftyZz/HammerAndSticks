<?php

namespace plug\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class HealCommand extends Command
{
    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }


    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if ($sender instanceof Player) {
            if ($sender->getHealth() >= 20) {
                $sender->sendMessage(TextFormat::RED . "Vos vies sont déjà au maximum !");
            }else {
                $sender->setHealth($sender->getMaxHealth());
            }


        }else {
            $sender->sendMessage("Vous n'êtes pas un joueur");
        }
    }
}
