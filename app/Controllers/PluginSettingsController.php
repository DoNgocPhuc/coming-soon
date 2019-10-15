<?php
/**
 * Created by PhpStorm.
 * User: Do Ngoc Phuc
 * Date: 20/08/2019
 * Time: 4:50 CH
 */
namespace Comingsoon\Controllers;
use Comingsoon\Support\Validator;

/**
 * Class PluginSettingsController
 * @package Comingsoon\Controllers
 */
class PluginSettingsController extends Controller
{
    /**
     * @var string
     */
    private $sSlug = "comingsoon-settings";
    public function __construct()
    {
        add_action("admin_enqueue_scripts", [$this, "enqueueScripts"]);
        add_action("admin_menu", [$this, "settingMenu"]);
    }
    /**
     * @return bool
     */
    public function enqueueScripts()
    {
        //Limit CSS and JS style
        $oCurrentScreen = get_current_screen();
        if (!isset($oCurrentScreen->base)
            || (strpos($oCurrentScreen->base, $this->sSlug) === false
                && strpos(
                       $oCurrentScreen->base, $this->sSlug . "-enable"
                   ) === false)
        ) {
            return false;
        }
        $aBackendStyle = getConfig("style")->getParam("backend");
        foreach ($aBackendStyle as $aBackend) {
            if ($aBackend["type"] == "CSS") {
                //Add CSS
                wp_enqueue_style(
                    $aBackend["handle"], $aBackend["src"], $aBackend["deps"], $aBackend["ver"]
                );
            } elseif ($aBackend["type"] == "JS") {
                wp_enqueue_script(
                    $aBackend["handle"], $aBackend["src"], $aBackend["deps"], $aBackend["ver"],
                    $aBackend["in_footer"]
                );
            }
        }
    }
    /**
     * Add Commingsoon Setting to Admin menu Setting
     */
    public function settingMenu()
    {
        add_menu_page(
            "Comingsoon Settings",
            "Comingsoon Settings",
            "administrator",
            $this->sSlug,
            [$this, "comingsoonSettings"]
        );
        add_submenu_page(
            $this->sSlug,
            "Enable Comingsoon",
            "Enable Comingsoon",
            "administrator",
            $this->sSlug . "-enable",
            array($this, "enableComingsoon")
        );
    }
    /**
     * @throws \Exception
     */
    public function comingsoonSettings()
    {
        //http://localhost/wordpress/wp-admin/admin.php?page=comingsoon-settings
        $url = add_query_arg(
            [
                "page" => $this->sSlug
            ],
            admin_url("admin.php")
        );
        if ($_POST) {
            $aImageUpload = $_FILES["image-upload"];
            $aData        = array_merge(//merge array to validate
                $_POST,
                $aImageUpload
            );
            //Validate
            $bStatus = Validator::validate(
                array(
                    "title" => "required|maxLength:100",
                    "description" => "required",
                    "startdate" => "required",
                    "day" => "checkNumber",
                    "facebook" => "required",
                    "twitter" => "required",
                    "googleplus" => "required",
                    "footer" => "required",
                    "name" => "required",
                    "type" => "checkImageType",
                    "size" => "maxSize:5000000",
                    "site" => "required",
                    "ip" => "required",
                ),
                $aData
            );
            if ($bStatus !== true) {
                update_option("comingsoon_settings_result", $bStatus);
                //wp_redirect($url);
            }
            else{
                //Handle file
                $aOverrides = array("test_form" => false);
                $aMovefile  = wp_handle_upload($aImageUpload, $aOverrides);
                if (!$aMovefile || isset($aMovefile["error"])) {
                    update_option("comingsoon_settings_result", $aMovefile["error"]);
                } else {
                    //If existed image
                    if (get_option("comingsoon_settings")["file"]) {
                        // Delete
                        unlink(get_option("comingsoon_settings")["file"]);
                    }
                    $aData = array_merge(
                        $aData,
                        $aMovefile
                    );
                    update_option("comingsoon_settings", $aData);
                    update_option("comingsoon_settings_result", "Saved success");
                }
            }
        }
        $aOptions = get_option("comingsoon_settings");
        $sSettingResult=get_option("comingsoon_settings_result");
        $this->loadView("pluginsetting", array($url, $aOptions, $sSettingResult));
    }
    /**
     * submenu enableComingsoon
     */
    public function enableComingsoon()
    {
        $url = add_query_arg(
            [
                "page" => $this->sSlug."-enable"
            ],
            admin_url("admin.php")
        );
        if ($_POST) {
            update_option("enablecomingsoon", $_POST);
        }
        $aOptions = get_option("enablecomingsoon");
        $this->loadView("enablecomingsoon", array($url, $aOptions));

    }
}