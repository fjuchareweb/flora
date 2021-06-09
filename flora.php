<?php
/* ====================================
 * Plugin Name: flora
 * Description: Кастомный код для сайта flora.okweb.pro  
 * Plugin URI: https://github.com/fjuchareweb/flora.git
 * Author: Fjuchare
 * Author URI: https://fjuchare.ru/
 * Version: 1.0
 * ==================================== */



/**
 * Remove Billing and Shipping Address In Woocommerce Checkout
*/

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {

 unset($fields['billing']['billing_last_name']);
 	unset($fields['shipping']['shipping_last_name']);
 	unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_phone']);
 unset($fields['billing']['billing_company']);
 unset($fields['billing']['billing_address_1']);
 unset($fields['billing']['billing_address_2']);
 unset($fields['billing']['billing_postcode']);
 unset($fields['order']['order_comments']);
 unset($fields['billing']['billing_email']);
 return $fields;
}
//верстка billing
add_filter( 'woocommerce_checkout_fields', 'wplb_phone_second' );
 
function wplb_phone_second( $array ) {
    
    // Меняем приоритет
    $array['billing']['billing_phone']['priority'] = 14;
    $array['billing']['billing_phone']['class'][0] = 'form-row-last';
    // Возвращаем обработанный массив
    return $array;
}
//страна по умолчанию
add_filter( 'default_checkout_billing_country', 'default_checkout_country' );
add_filter( 'default_checkout_billing_state', 'default_checkout_city' );
function default_checkout_country( $country ) {
	return 'RU'; // двухбуквенный ISO код страны
}
function default_checkout_billing_state( $state ) {
	return 'MOW';
}
function default_checkout_city( $city ) {
	return 'Москва';
}

//необязательные поля billing
add_filter( 'woocommerce_default_address_fields' , 'wpbl_fileds_validation' );
 
function wpbl_fileds_validation( $array ) {
    // Фамилия
    unset( $array['last_name']['required']);
    // Почтовый индекс
    unset( $array['postcode']['required']);
    // Населённый пункт
    unset( $array['city']['required']);
    // 1-ая строка адреса 
    unset( $array['address_1']['required']);
    // 2-ая строка адреса 
    unset( $array['address_2']['required']);
    // Возвращаем обработанный массив
    return $array;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

//Переименование города и области на русский
add_filter( 'woocommerce_checkout_fields' , 'cust_override_checkout_fields' );
function cust_override_checkout_fields( $fields ) {
//     $fields['order']['billing_state']['label'] = 'Область';
     return $fields;
}
