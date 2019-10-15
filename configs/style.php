<?php
return [
    "frontend" => array(
        array(
            "handle" => "comingsoon_bootstrap",
            "src" => COMINGSOON_ASSETS_URL . "vendor/bootstrap/css/bootstrap.min.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_font1",
            "src" => COMINGSOON_ASSETS_URL . "fonts/font-awesome-4.7.0/css/font-awesome.min.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_font2",
            "src" => COMINGSOON_ASSETS_URL . "fonts/iconic/css/material-design-iconic-font.min.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_animate",
            "src" => COMINGSOON_ASSETS_URL . "vendor/animate/animate.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_select2",
            "src" => COMINGSOON_ASSETS_URL . "vendor/select2/select2.min.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_util",
            "src" => COMINGSOON_ASSETS_URL . "css/util.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_main",
            "src" => COMINGSOON_ASSETS_URL . "css/main.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_popper",
            "src" => COMINGSOON_ASSETS_URL . "vendor/bootstrap/js/popper.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_bootstrap",
            "src" => COMINGSOON_ASSETS_URL . "vendor/bootstrap/js/bootstrap.min.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_select2",
            "src" => COMINGSOON_ASSETS_URL . "vendor/select2/select2.min.js",
            "deps" => ["JQUERY"],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_moment1",
            "src" => COMINGSOON_ASSETS_URL . "vendor/countdowntime/moment.min.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_moment2",
            "src" => COMINGSOON_ASSETS_URL . "vendor/countdowntime/moment-timezone.min.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_moment3",
            "src" => COMINGSOON_ASSETS_URL . "vendor/countdowntime/moment-timezone-with-data.min.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_countdowntime",
            "src" => COMINGSOON_ASSETS_URL . "vendor/countdowntime/countdowntime.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_tilt",
            "src" => COMINGSOON_ASSETS_URL . "vendor/tilt/tilt.jquery.min.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_main",
            "src" => COMINGSOON_ASSETS_URL . "js/main.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        ),
        array(
            "handle" => "comingsoon_countdown",
            "src" => COMINGSOON_SOURCES_URL . "js/countdown.js",
            "deps" => [],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        )
    ),
    "backend" => array(
        array(
            "handle" => "semantic",
            "src" => COMINGSOON_ASSETS_URL . "semantic/semantic.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "comingsoon_style",
            "src" => COMINGSOON_SOURCES_URL . "css/style.css",
            "deps" => [],
            "ver" => COMINGSOON_VERSION,
            "media" => "all",
            "type" => "CSS"
        ),
        array(
            "handle" => "semantic",
            "src" => COMINGSOON_ASSETS_URL . "semantic/semantic.js",
            "deps" => ["jquery"],
            "ver" => "",
            "in_footer" => true,
            "type" => "JS"
        )
    )
];
