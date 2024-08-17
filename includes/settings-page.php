<?php
// Register settings for the settings page
add_action('admin_init', 'register_shipping_label_settings');

function register_shipping_label_settings() {
    register_setting('shipping_label_settings', 'shipping_label_template');
    add_settings_section('shipping_label_settings_section', __('Shipping Label Template', 'shipping-label-generator'), null, 'shipping-label-settings');
    add_settings_field('shipping_label_template_field', __('Label Template HTML', 'shipping-label-generator'), 'shipping_label_template_field_callback', 'shipping-label-settings', 'shipping_label_settings_section');
}

function shipping_label_template_field_callback() {
    $template = get_option('shipping_label_template', '');
    echo '<textarea name="shipping_label_template" rows="10" cols="50" class="large-text">' . esc_textarea($template) . '</textarea>';
}
?>
