<?php

function dw_add_settings_page()
{
    add_options_page('CT7 - Sendy', 'CT7 - Sendy Settings', 'manage_options', 'dw-cf7-sendy-plugin', 'dw_render_plugin_settings_page');
}
add_action('admin_menu', 'dw_add_settings_page', 110);

function dw_render_plugin_settings_page()
{
?>
    <h2>CT7 - Sendy</h2>
    <form action="options.php" method="post">
        <?php
        settings_fields('dw_cf7_sendy_plugin_options');
        do_settings_sections('dw_cf7_sendy_plugin'); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e('Save'); ?>" />
    </form>
<?php
}

function dw_register_settings()
{
    register_setting('dw_cf7_sendy_plugin_options', 'dw_cf7_sendy_plugin_options', 'dw_cf7_sendy_plugin_options_validate');

    add_settings_field('dw_plugin_setting_url', 'URL', 'dw_plugin_setting_url', 'dw_cf7_sendy_plugin', 'api_settings');
    add_settings_field('dw_plugin_setting_api_key', 'API Key', 'dw_plugin_setting_api_key', 'dw_cf7_sendy_plugin', 'api_settings');
}
add_action('admin_init', 'dw_register_settings');

function dw_cf7_sendy_plugin_options_validate($input)
{
    $newinput['api_key'] = trim($input['api_key']);
    return $newinput;
}

function dw_plugin_setting_url()
{
    $options = get_option('dw_cf7_sendy_plugin_options');
    echo "<input id='dw_plugin_setting_url' name='dw_cf7_sendy_plugin_options[url]' type='text' value='" . esc_attr($options['url']) . "' />";
}

function dw_plugin_setting_api_key()
{
    $options = get_option('dw_cf7_sendy_plugin_options');
    echo "<input id='dw_plugin_setting_api_key' name='dw_cf7_sendy_plugin_options[api_key]' type='text' value='" . esc_attr($options['api_key']) . "' />";
}