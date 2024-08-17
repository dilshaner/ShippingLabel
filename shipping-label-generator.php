<?php
/*
Plugin Name: Shipping Label Generator
Description: A plugin to generate shipping labels for WooCommerce orders.
Version: 1.0
Author: Dilshan Eranda
*/

defined('ABSPATH') or die('No script access allowed');

// Include necessary files
include(plugin_dir_path(__FILE__) . 'includes/label-functions.php');
include(plugin_dir_path(__FILE__) . 'includes/settings-page.php');

// Register WooCommerce order action for label generation
add_filter('woocommerce_admin_order_actions', 'add_generate_label_button', 100, 2);

function add_generate_label_button($actions, $order) {
    $actions['generate_shipping_label'] = array(
        'url'       => wp_nonce_url(admin_url('admin-ajax.php?action=generate_shipping_label&order_id=' . $order->get_id()), 'generate_shipping_label'),
        'name'      => __('Generate Shipping Label', 'shipping-label-generator'),
        'action'    => 'view generate_shipping_label',
    );
    return $actions;
}

// Handle the button click via AJAX
add_action('wp_ajax_generate_shipping_label', 'generate_shipping_label');

function generate_shipping_label() {
    if (!isset($_GET['order_id']) || !wp_verify_nonce($_GET['_wpnonce'], 'generate_shipping_label')) {
        wp_die(__('Invalid request', 'shipping-label-generator'));
    }

    $order_id = intval($_GET['order_id']);
    $order = wc_get_order($order_id);

    // Generate PDF label
    $pdf_content = generate_label_pdf($order);

    // Get customer name
    $customer_name = $order->get_billing_first_name() . '_' . $order->get_billing_last_name();
    $customer_name = sanitize_file_name($customer_name); // Sanitize filename to avoid special characters

    // Output PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $customer_name . '_' . $order_id . '.pdf"');
    echo $pdf_content;
    exit;
}


// Add settings page
add_action('admin_menu', 'add_shipping_label_settings_page');

function add_shipping_label_settings_page() {
    add_menu_page(
        __('Shipping Label Settings', 'shipping-label-generator'),
        __('Shipping Label Settings', 'shipping-label-generator'),
        'manage_options',
        'shipping-label-settings',
        'render_shipping_label_settings_page'
    );
}

// Render settings page
function render_shipping_label_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Shipping Label Settings', 'shipping-label-generator'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('shipping_label_settings');
            do_settings_sections('shipping-label-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>
