<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('curPageURL')) {

    function curPageURL() {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";

        if (isset($_SERVER["SERVER_PORT"]) and $_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }

        return $pageURL;
    }

}

if (!function_exists('sharethis')) {

    function sharethis($platform = 'facebook,twitter', $url = '') {

        $render = '';
        $platform = explode(',', $platform);

        foreach ($platform as $m) {
            if ($m == 'facebook') {
                $render .= '<a href="http://facebook.com/share.php?u=' . $url . '" target="_blank" title="Bagikan"><img src="'.  base_url().'image/content/facebook.png"></a>&nbsp;';
            }

            if ($m == 'twitter') {
                $render .= '<a href="http://twitter.com/home?status=' . $url . '" target="_blank" title="Bagikan"><img src="'.  base_url().'image/content/twitter-icon.png"></a>&nbsp;';
            }
        }

        return $render;
    }

}


