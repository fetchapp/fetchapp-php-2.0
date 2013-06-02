<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 3:42 PM
 */

namespace FetchApp\API;


class EnumEmulator {

    public static function getName($const, $className)
    {
        $fakeEnumClass = new \ReflectionClass($className);
        $constants = $fakeEnumClass->getConstants();

        foreach ($constants as $name => $value) {
            if ($value == $const)
                return $name;
        }

        //Nothing was found
        return -1;
    }



}