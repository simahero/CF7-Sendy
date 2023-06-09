<?php

/**
 * Plugin Name: CF7 - Sendy
 * Plugin URI:
 * Description: Contact Form 7 - Sendy integration
 * Version: 1.0.6
 * Text Domain:
 * Author: Ront車 Zolt芍n
 * Author URI: simahero.github.io
 */

/* 
  01001001 00100000 01001100 01001111
  01010110 01000101 00100000 01011001
  01001111 01010101 00100000 01001100
  01001111 01010100 01010100 01001001
  00100000 00111100 00110011 00000000
*/

/**
    [hidden sendy 
        default:'
            {"name":"name","selector":"your-name","target":"form"},
            {"name":"email","selector":"your-email","target":"form"},
            {"selector":"checkbox-newslettertype","target":"form"},
            {"name":"list","value":"Oe2BElGFg763EP892HgMKQi763XA","target":"static"},
            {"name":"country","value":"HU","target":"static"},
            {"name":"gdpr","value":"true","target":"static"},
            {"name":"silent","value":"true","target":"static"}'
    ]
 */

/*
	dw_sendy_enabled: 1
  dw_sendy_url: https://newsletter.onlinemarketing.hu/subscribe
  dw_sendy_api_key: P8nBHoD4dHuxM92S8o58
  dw_sendy_logging_enabled: 1
*/

define('DW_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once('src/log.php');
require_once('src/cf7-hook.php');
