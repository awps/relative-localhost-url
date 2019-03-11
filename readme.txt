=== Relative Localhost URL ===
Donate link: http://paypal.me/zerowp
Contributors: _smartik_
Tags: dev, developers, debug, analyze, inspect, test
Requires at least: 4.4
Tested up to: 5.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Replace absolute localhost URLs with relative.


== Description ==
Replace absolute localhost URLs with relative. Examples:

// Normal links
http://localhost:3000/example/path        // => /example/path
http://localhost:8000/example/path        // => /example/path
http://localhost:80/example/path          // => /example/path

// SSL links
https://localhost:3000/example/path       // => /example/path
https://localhost:8000/example/path       // => /example/path
https://localhost:80/example/path         // => /example/path

// From JSON strings:
https:\/\/localhost:3000\/example\/path   // => \/example\/path
https:\/\/localhost:8000\/example\/path   // => \/example\/path
https:\/\/localhost:80\/example\/path     // => \/example\/path

// Without port
http://localhost/example/path             // => /example/path
https://localhost/example/path            // => /example/path
http:\/\/localhost/example/path           // => /example/path
https:\/\/localhost/example/path          // => /example/path

// Without protocol
//localhost:3000/example/path             // => /example/path
//localhost:88/example/path               // => /example/path
//localhost/example/path                  // => /example/path
//localhost/example/path                  // => /example/path
\/\/localhost\/example\/path              // => \/example\/path
\/\/localhost\/example\/path              // => \/example\/path


== Installation ==

* Like any other WordPress plugin.
* Drop `relative-localhost-url` to wp-content/plugins/ either by using the web interface or manually using FTP, SSH... etc.
* More info here: http://codex.wordpress.org/Managing_Plugins#Installing_Plugins

== Changelog ==

= 0.1.0 =
* Initial version