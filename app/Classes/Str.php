<?php


namespace App\Classes;


use Hashids\Hashids;

class Str
{
    const SALT = "Pan Fintrack";
    public static function strFromPrimaryKey(int $id)
    {
        $hashId = new Hashids(self::SALT, 6);
        return $hashId->encode($id);
    }

    public static function primaryKeyFromHash(string $hash)
    {
        $hashId = new Hashids(self::SALT, 6);
        return $hashId->decode($hash);
    }
}
