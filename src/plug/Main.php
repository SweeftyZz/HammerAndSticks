<?php

namespace plug;


use plug\commands\HammerCommands;
use plug\commands\HealCommand;
use plug\listeners\HammerListeners;
use plug\listeners\JoinListeners;
use plug\listeners\SticksListeners;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements CommandExecutor
{
    private static Main $main;
    private HManager $hmanager;

    public function onEnable()
    {
        self::$main = $this;
        //$this->initcommands();
        $this->getLogger()->info("Activation du plugin...");
        $this->getLogger()->warning("Plugin Activé !");
        $this->getServer()->getPluginManager()->registerEvents(new JoinListeners(), $this);
        $this->getServer()->getPluginManager()->registerEvents(new HammerListeners(), $this);
        $this->getServer()->getCommandMap()->register("hammerr", new HammerCommands("hammer", "Vous octoire un hammer", "hammer", ['marteau']));
        $this->getServer()->getPluginManager()->registerEvents(new SticksListeners(),$this);
    }

    public function onDisable()
    {
        $this->getLogger()->info("Désactivation du plugin...");
        $this->getLogger()->warning("Plugin Désactivé !");

    }

    public function initcommands(): void
    {
        $this->getServer()->getCommandMap()->registerAll('commands', [new HammerCommands("hammer", "Vous octoire un hammer", "hammer", ['marteau']),
            new HealCommand("heal", "Vous heal", "heal")]);
    }

    public static function getInstance(): self
    {
        return self::$main;
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        switch ($command->getName()) {
            case "baton":
                if ($sender instanceof Player) {
                    $player = $sender;
                    $customsticks = new CustomSticks(Item::get(280,0,1),1,$player);

                    $customsticks->sticktypes(StickTypes::IRON_STICK)->enchant(Enchantment::getEnchantmentByName("Efficiency"),1);

                    $customsticks->build();

                    $customsticks->give();

                }else{
                    $sender->sendMessage("Vous n'êtes pas un joueur");
                }

        }

    return false;
    }
}
