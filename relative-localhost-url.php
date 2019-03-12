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
        add_action('init', [__CLASS__, 'start']);
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
		// Replace normal URLs
		$home_url = esc_url(home_url('/'));
		$home_url_relative = wp_make_link_relative($home_url);

		// Replace URLs in inline scripts
		$home_url_escaped = str_replace('/', '\/', $home_url);
		$home_url_escaped_relative = str_replace('/', '\/', $home_url_relative);

		$buffer = str_replace($home_url, $home_url_relative, $buffer);
		$buffer = str_replace($home_url_escaped, $home_url_escaped_relative, $buffer);

		return preg_replace('/(http(s?):)?(\\?)\/(\\?)\/localhost((?!:)|:(\d{4}|\d{2})(?!\d{1}))/i', '', $buffer);
    }
}

new RelativeLocalhostUrl();