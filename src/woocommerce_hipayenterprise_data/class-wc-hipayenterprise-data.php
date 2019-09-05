<?php
/**
 * HiPay Enterprise SDK WooCommerce Data
 *
 * 2018 HiPay
 *
 * NOTICE OF LICENSE
 *
 * @author    HiPay <support.tpp@hipay.com>
 * @copyright 2018 HiPay
 * @license   https://github.com/hipay/hipay-enterprise-sdk-woocommerce-data/blob/master/LICENSE.md
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 *
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2018 - HiPay
 * @license     https://github.com/hipay/hipay-enterprise-sdk-woocommerce-data/blob/master/LICENSE.md
 * @link    https://github.com/hipay/hipay-enterprise-sdk-woocommerce-data
 */
class WC_HipayEnterprise_Data
{

    const OPTION_PLUGIN_VERSION = "hipay_enterprise_data_version";

    private static $instance;

    public function __construct()
    {
        if (
            in_array('woocommerce_hipayenterprise/wc-hipayenterprise.php', apply_filters('active_plugins', get_option('active_plugins')))
            || in_array('woocommerce_hipayenterprise/wc-hipayenterprise.php', array_keys(get_site_option('active_sitewide_plugins')))
        ) {
            add_action('plugins_loaded', array($this, 'initPlugin'), 0);
        }
    }

    public function initPlugin()
    {
        add_filter('hipay_wc_before_request', array($this, 'beforeMapRequest'), 10, 2);
    }

    /**
     * @param \HiPay\Fullservice\Gateway\Request\Order\OrderRequest $orderRequest
     * @param $order
     */
    public function beforeMapRequest($orderRequest, $order){
        return $orderRequest;
    }

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
