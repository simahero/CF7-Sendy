<?php

function dws_log($msg)
{
    $pluginlog = plugin_dir_path(__FILE__) . '/debug.log';

    $now = new DateTime('now');
    $date = "[" . $now->format('Y-m-d H:i:s') . "]";

    error_log(print_r($date . $msg . "\n", true), 3, $pluginlog);
}
