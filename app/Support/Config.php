<?php declare(strict_types=1);
namespace Comingsoon\Support;

/**
 * Class Config
 * @package Comingsoon\Support
 */
class Config
{
    /**
     * @var
     */
    private static $fileName;
    /**
     * @var
     */
    private static $aConfiguration;
    /**
     * @var
     */
    private static $aValue;
    /**
     * Config constructor.
     * @param      $fileName
     * @param bool $hasChain
     */
    public function __construct($fileName, $hasChain = false)
    {
        self::$fileName = $fileName;
        if (isset(self::$aConfiguration[$fileName])) {
            self::$aConfiguration[$fileName];
        } else {
            if (file_exists(COMINGSOON_CONFIG . $fileName . ".php")) {
                //Save file name and file content information in array form
                self::$aConfiguration[$fileName] = include COMINGSOON_CONFIG
                                                           . $fileName . ".php";
            } else {
                self::$aConfiguration[$fileName] = array();
            }
        }
        self::$aValue = self::$aConfiguration[$fileName];
    }
    /**
     * @return null|$this
     * @param bool $hasChain
     * @param      $target
     */
    public function getParam($target, $hasChain = false)
    {
        self::$aValue = isset(self::$aValue[$target]) ? self::$aValue[$target] : null;
        if ($hasChain) {
            return $this;
        }
        return self::$aValue;
    }
}

