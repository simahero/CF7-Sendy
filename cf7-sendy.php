<?php

/**
 * Plugin Name: CF7 - Sendy
 * Plugin URI:
 * Description: Contact Form 7 - Sendy integration
 * Version: 1.0.3
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

require_once('src/settings.php');
require_once('src/log.php');
require_once('src/cf7-hook.php');
