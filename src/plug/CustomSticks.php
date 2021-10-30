<?php

namespace plug;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class CustomSticks{

    private String $name;

    private Item $item;

    private int $amount;

    private Player $player;

    private String $types;


    public function __construct(Item $item,int $amount,Player $player){

        $this->player = $player;

        $this->amount = $amount;

        $this->item = $item;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }
    public function sticktypes(String $types): self{
        $this->types = $types;

        return $this;
    }

    public function enchant(Enchantment $enchant,int $level): self{

        if($level<= 0){
            $this->player->sendMessage(TextFormat::GREEN . "Le niveau d'enchantement doit être un réel positif,son niveau a donc été mis a 1");
        }

        $this->item->addEnchantment(new EnchantmentInstance($enchant,$level));

        return $this;
    }

    public function build(): self{

        foreach(StickTypes::cases() as  $i){
            if($this->isTypes($i)){

                $this->sticktypes($i);
                $this->player->sendMessage("2");

                    $this->item->setCustomName(TextFormat::GREEN . $i);

            }else{
                $this->player->sendMessage("Prout");
            }
        }
      //  $this->player->sendMessage("Caca");


        return $this;
    }

    public function isTypes(String $types): bool{
        return $this->types === $types;

    }

    public function give(): void{
        $this->player->getInventory()->addItem($this->item);

        $this->player->sendMessage(TextFormat::GREEN . "Vous avez reçu un stick  de combat !");
    }




}