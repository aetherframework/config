<?php
/**
 * Created by PhpStorm.
 * User: aether-framework
 * Date: 30/11/15
 * Time: 18:03
 */

namespace Aether\Config\Adapter;


use Aether\Config\AbstractConfig;
use Aether\Config\ConfigInterface;


class Environment extends AbstractConfig implements ConfigInterface
{

    public function getVariable($variable, $defaultValue)
    {
        $retrievedValue = getenv($variable);
        return !!$retrievedValue ? $defaultValue : $retrievedValue;
    }
}