<?php
/**
 * Created by PhpStorm.
 * User: delphicokami
 * Date: 17/02/16
 * Time: 07:20
 */

namespace AEtherFramework\Config;


interface ConfigAwareInterface
{
    /**
     * @return ConfigInterface
     */
    public function getConfig();

    /**
     * @param ConfigInterface $configInterface
     * @return $this
     */
    public function setConfig(ConfigInterface $configInterface);
}