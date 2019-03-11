<?php
/*
Plugin Name: Relative localhost URL
Description: Transform all absolute localhost URLs to relative. <strong>Note: This plugin should not be used in production!</strong>
Author: Andrei Surdu
Author URI: https://zerowp.com/
Version: 0.1.0
License: GPLv2 or later
*/

class RelativeLocalhostUrl
{
    public function __construct()
    {
        add_action('registered_taxonomy', [__CLASS__, 'start']);
        add_action('shutdown', [__CLASS__, 'end']);
    }

    public static function start()
    {
        ob_start([__CLASS__, 'callback']);
    }

    public static function end()
    {
        @ob_end_flush();
    }

    public static function callback($buffer)
    {
        return preg_replace('/(http(s?):)?(\\?)\/(\\?)\/localhost((?!:)|:(\d{4}|\d{2})(?!\d{1}))/i', '', $buffer);
    }
}

new RelativeLocalhostUrl();