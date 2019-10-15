<?php
if(!defined("WP_UNINSTALL_PLUGIN")){
    exit();
}
comingsoon_uninstall();
function comingsoon_uninstall(){
    delete_option("enablecomingsoon");
    delete_option("comingsoon_settings");
    delete_option("comingsoon_settings_result");
}

