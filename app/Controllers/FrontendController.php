<?php
/**
 * Created by PhpStorm.
 * User: Do Ngoc Phuc
 * Date: 20/08/2019
 * Time: 5:21 CH
 */
namespace Comingsoon\Controllers;

use Comingsoon\Helper\GenerateHTML;
/**
 * Class FrontendController
 * @package Comingsoon\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @var mixed|void
     */
    public $aOptions;
    /**
     * @var mixed|void
     */
    public $sResult;
    /**
     * FrontendController constructor.
     */
    public function __construct()
    {
        $this->aOptions = get_option("comingsoon_settings");
        $this->sResult  = get_option("comingsoon_settings_result");
        add_action("wp_head", [$this, "addImage"]);
        add_action("wp_enqueue_scripts", [$this, "enqueueScripts"]);
        add_action("template_redirect", [$this, "redirectToComingsoon"]);
    }
    /**
     * addImage
     */
    public function addImage()
    {
        $aFrontendImage = getConfig("image")->getParam("frontend");
        foreach ($aFrontendImage as $aFrontend) {
            $aArgs = [
                "rel" => $aFrontend["rel"],
                "type" => $aFrontend["type"],
                "href" => $aFrontend["href"]
            ];
            GenerateHTML::image($aArgs);
        }
    }
    /**
     * add CSS, JS
     */
    public function enqueueScripts()
    {
        $aFrontendStyle = getConfig("style")->getParam("frontend");
        foreach ($aFrontendStyle as $aFrontend) {
            if ($aFrontend["type"] == "CSS") {
                //Add CSS
                wp_enqueue_style(
                    $aFrontend["handle"], $aFrontend["src"], $aFrontend["deps"], $aFrontend["ver"]
                );
            } elseif ($aFrontend["type"] == "JS") {
                wp_enqueue_script(
                    $aFrontend["handle"], $aFrontend["src"], $aFrontend["deps"], $aFrontend["ver"],
                    $aFrontend["in_footer"]
                );
            }
        }
        $iDays    = $this->aOptions["day"];
        $iHours   = $this->aOptions["hour"];
        $iMinutes = $this->aOptions["min"];
        $iSeconds = $this->aOptions["sec"];
        $sScript  = "let iDays =" . $iDays . ";";
        $sScript  .= "let iHours =" . $iHours . ";";
        $sScript  .= "let iMinutes =" . $iMinutes . ";";
        $sScript  .= "let iSeconds =" . $iSeconds . ";";
        wp_add_inline_script("comingsoon_countdown", $sScript, "before");
    }
    /**
     * @throws \Exception
     */
    public function redirectToComingsoon()
    {
        if (!is_user_logged_in() && get_option("enablecomingsoon")["status"] == "ON") {
            $this->loadView("frontend", array($this->aOptions, $this->sResult));
        }
    }
}