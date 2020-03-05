<?php
/**
 * Created by PhpStorm.
 * User: aether-framework
 * Date: 30/11/15
 * Time: 18:03
 */

namespace AEtherFramework\Config\Adapter;


use AEtherFramework\Config\AbstractConfig;
use AEtherFramework\Config\ConfigInterface;


class Environment extends AbstractConfig implements ConfigInterface
{

    public function getVariable($variable, $defaultValue)
    {
        $retrievedValue = getenv($variable);

        return false === $retrievedValue ? $defaultValue : $retrievedValue;
    }
}