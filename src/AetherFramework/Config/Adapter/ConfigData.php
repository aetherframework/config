<?php
/**
 * Created by PhpStorm.
 * User: delphicokami
 * Date: 20/01/16
 * Time: 17:27
 */

namespace AetherFramework\Config\Adapter;


use AetherFramework\Config\AbstractConfig;
use AetherFramework\Config\ConfigInterface;

class ConfigData extends AbstractConfig implements ConfigInterface
{
    protected $configData;

    public function __construct(array $configData)
    {
        foreach ($configData as $key => $value) {
            if (is_array($value)) {
                $this->configData[$key] = new self($value);
            } else {
                $this->configData[$key] = $value;
            }
        }
        parent::__construct();
    }

    public function getVariable($variable, $defaultValue)
    {
        return isset($this->configData[$variable]) ? $this->configData[$variable] : $defaultValue;
    }

}