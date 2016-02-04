<?php
/**
 * Created by PhpStorm.
 * User: delphicokami
 * Date: 20/01/16
 * Time: 17:51
 */

namespace AetherFramework\Config;


use AetherFramework\Config\Adapter\ConfigData;
use AetherFramework\Config\Exception\CouldNotFindConfigfile;
use AetherFramework\Config\Exception\InvalidConfig;

class Factory
{
    public static function jsonConfig($pathToJsonFile) {
        if(!file_exists($pathToJsonFile)) {
            throw new CouldNotFindConfigfile(sprintf('Could not find JSON config file %s', $pathToJsonFile));
        }
        $jsonString = file_get_contents($pathToJsonFile);

        if(!json_decode($jsonString)) {
            throw new InvalidConfig(sprintf('Config file %s does not contain valid JSON', $pathToJsonFile));
        }
        $jsonData = json_decode($jsonString, true);
        $configArray = new ConfigData($jsonData);
        return $configArray;
    }
}