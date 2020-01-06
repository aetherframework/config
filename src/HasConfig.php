<?php
/**
 * Created by PhpStorm.
 * User: delphicokami
 * Date: 17/02/16
 * Time: 07:21
 */

namespace AEtherFramework\Config;


use AEtherFramework\Config\Exception\InvalidConfig;

trait HasConfig
{
    /**
     * @var ConfigInterface
     */
    private $_config;

    /**
     * @return ConfigInterface
     * @throws InvalidConfig
     */
    public function getConfig() {
        if(!isset($this->_config)) {
            throw new InvalidConfig('No config supplied');
        }
        return $this->_config;
    }

    public function setConfig(ConfigInterface $config) {
        $this->_config = $config;
        return $this;
    }

}