<?php
/**
 * Created by PhpStorm.
 * User: delphicokami
 * Date: 20/01/16
 * Time: 17:27
 */

namespace AEtherFramework\Config\Adapter;


use AEtherFramework\Config\AbstractConfig;
use AEtherFramework\Config\ConfigInterface;

class ConfigData extends AbstractConfig implements ConfigInterface
{
    protected $configData;

    public function __construct($configData)
    {
        foreach ($configData as $key => $value) {
            if (is_array($value)) {
                if($this->isAssociativeArray($value)) {
                    $this->configData[$key] = new self($value);
                } else {
                    $arrayData = [];
                    foreach($value as $entry) {
                        if(is_array($entry)) {
                            $arrayData[] = new self($entry);
                        } else {
                            $arrayData[] = $entry;
                        }
                    }
                    $this->configData[$key] = $arrayData;
                }
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
    protected function isAssociativeArray($array)
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

}