<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Brendon Dugan <wishingforayer@gmail.com>
 * Date: 6/1/13
 * Time: 1:23 PM
 */

namespace FetchApp\API;
include "EnumEmulator.class.php";

class FileType extends EnumEmulator {
    const Download = 0;
    const Link = 1;

    public static function getName($const){
        return parent::getName($const, "FetchApp\\API\\FileType");
    }
}