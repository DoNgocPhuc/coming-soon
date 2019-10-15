<?php
namespace Comingsoon\Controllers;

/**
 * Class Controlllers
 * @package MVC\Controllers
 */
class Controller
{
    /**
     * @param       $viewFile
     * @param mixed $aData
     * @throws \Exception
     */
    public function loadView($viewFile,$aData)
    {
        try {
            require_once COMINGSOON_VIEWS_DIR . $viewFile . ".php";
        } catch (\Exception $oException) {
            throw $oException;
        }
    }
}
