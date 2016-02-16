<?php
/**
 * Created by PhpStorm.
 * User: aether-framework
 * Date: 30/11/15
 * Time: 18:03
 */

namespace AetherFramework\Config\Adapter;


use AetherFramework\Config\AbstractConfig;
use AetherFramework\Config\ConfigInterface;


class Environment extends AbstractConfig implements ConfigInterface
{

    public function getVariable($variable, $defaultValue)
    {
        $retrievedValue = getenv($variable);
        return !!$retrievedValue ? $defaultValue : $retrievedValue;
    }
}