<?php
/*
Plugin Name: Coming Soon
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Đỗ Ngọc Phúc
Version: 1.0
Author URI: http://wiloke.com
*/
use Comingsoon\Controllers\PluginSettingsController;
use Comingsoon\Controllers\FrontendController;
use Comingsoon\Support\Config;
require_once plugin_dir_path(__FILE__)."configs/general.php";
require_once plugin_dir_path(__FILE__) . "vendor/autoload.php";
//Active
register_activation_hook(__FILE__, "comingsoon_active");
function comingsoon_active()
{
    $aEnablecmsOptions = [
        "status" => "ON"
    ];
    //If row not exist
    if(!get_option("enablecomingsoon")){
        //Create row
        add_option("enablecomingsoon", $aEnablecmsOptions, "yes");
    }
    else{
        $sEnableCms      = get_option("enablecomingsoon");
        $sSettingsCms    = get_option("comingsoon_settings");
        $sSettingsCmsResult = get_option("comingsoon_settings_result");
        delete_option("enablecomingsoon");
        delete_option("comingsoon_settings");
        delete_option("comingsoon_settings_result");
        update_option("enablecomingsoon", $sEnableCms, "yes");
        update_option("comingsoon_settings", $sSettingsCms, "yes");
        update_option("comingsoon_settings_result", $sSettingsCmsResult, "yes");
    }
}
//Deactive
register_deactivation_hook(__FILE__, "comingsoon_deactive");
function comingsoon_deactive()
{
    $sEnablecms      = get_option("enablecomingsoon");
    $sSettingscms    = get_option("comingsoon_settings");
    $sSettingsresult = get_option("comingsoon_settings_result");
    delete_option("enablecomingsoon");
    delete_option("comingsoon_settings");
    delete_option("comingsoon_settings_result");
    update_option("enablecomingsoon", $sEnablecms, "no");
    update_option("comingsoon_settings", $sSettingscms, "no");
    update_option("comingsoon_settings_result", $sSettingsresult, "no");
}
/**
 * @return \Comingsoon\Support\Config
 * @param $fileName
 */
function getConfig($fileName)
{
    return new Config($fileName);
}
if (is_admin()) {
    new PluginSettingsController();
} else {
    new FrontendController();
}
