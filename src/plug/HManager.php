<?php

namespace plug;

use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class HManager{

    private String $name;

    private int $amount;

    private Player $player;


    public function __construct(String $name,int $amount,Player $player)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->player = $player;
    }

    public function give():void{
        $cp = Item::get(257,0,$this->amount);
        $css = $cp->setCustomName($this->name);
        $this->player->sendMessage(TextFormat::GREEN . "Vous avez recu un Hammer !");
        $this->player->getInventory()->addItem($css);
    }

    public function getName(): String{
        return $this->name;
    }
    public function getAmount(): int{
        return $this->amount;
    }

}
