<?php

namespace plug\util;

use pocketmine\Player;

class Cooldown{
    private Player $player;

    private array $array;

    public function __construct(Player $player){
        $this->player = $player;
        $this->array = [];

    }


    public function setCooldown(int $time): void{
        if($this->array)




    }
}