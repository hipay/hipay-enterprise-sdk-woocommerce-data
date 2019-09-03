<?php
/*
Plugin Name: WooCommerce HiPay Enterprise Data
Plugin URI: https://hipay.com/en/
Description: WooCommerce DSP2 Data Plugin for Hipay Enterprise.
Version: 1.0.0
Text Domain: hipayenterprise
Author: HiPay
Author URI: https://www.hipay.com
*/

if (!class_exists('WC_HipayEnterprise_Data')) {
    define('WC_HIPAYENTERPRISE_DATA_VERSION', '1.0.0');
    define('WC_HIPAYENTERPRISE_DATA_PATH', plugin_dir_path(__FILE__));
    define('WC_HIPAYENTERPRISE_DATA_URL_ASSETS', plugin_dir_url(__FILE__) . 'assets/');
    define('WC_HIPAYENTERPRISE_DATA_PLUGIN_NAME', plugin_basename(__FILE__));
    define('WC_HIPAYENTERPRISE_DATA_BASE_FILE', __FILE__);

    require_once(WC_HIPAYENTERPRISE_DATA_PATH . 'class-wc-hipayenterprise-data.php');

    WC_HipayEnterprise_Data::get_instance();
}
