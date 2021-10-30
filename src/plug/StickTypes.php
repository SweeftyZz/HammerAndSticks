<?php

namespace plug;

use pocketmine\utils\TextFormat;

abstract class StickTypes{
    const DIAMOND_STICK = "Baton en Diamant";
    const IRON_STICK = "Baton en Fer";


    public static function cases():array{
        $data[0] = self::DIAMOND_STICK;
        $data[1] = self::IRON_STICK;

        return $data;
    }

    public static function getDiamondStick(): string{
        return TextFormat::GREEN . self::DIAMOND_STICK;

    }
    public static function getIronStick(): string{
        return TextFormat::GREEN .self::IRON_STICK;
    }

}