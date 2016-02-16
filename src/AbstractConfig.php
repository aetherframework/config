<?php
/**
 * Created by PhpStorm.
 * User: aether-framework
 * Date: 09/12/15
 * Time: 17:13
 */

namespace AetherFramework\Config;


use AetherFramework\Config\Exception\RequiredVariableNotSet;
use AetherFramework\Log\HasLogger;
use AetherFramework\Log\LoggerAwareInterface;

abstract class AbstractConfig implements ConfigInterface, LoggerAwareInterface
{
    use HasLogger;
    protected $_notSetValue;

    public function __construct()
    {
        $this->_notSetValue = md5(time());
    }

    public function getRequired($variable)
    {
        $value = $this->getVariable($variable, $this->_notSetValue);
        if ($value !== $this->_notSetValue) {
            return $value;
        } else {
            throw new RequiredVariableNotSet(sprintf('Variable %s not available', $variable));
        }
    }

    public function __get($name)
    {
        try {
            return $this->getRequired($name);
        } catch (RequiredVariableNotSet $exception) {
            $this->getLogger()->logNotice(sprintf('Attempting to directly retrieve unset config variable: %s', $name), ['class' => __CLASS__]);
            return null;
        }
    }

}