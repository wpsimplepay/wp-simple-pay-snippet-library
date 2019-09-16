<?php
/**
 * Plugin Name: WP Simple Pay - Add Subscription Metadata
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add metadata to a Stripe subscription record.
 * Version: 1.0
 */

/**
 * Adds custom metadata to a \Stripe\Subscription record in Stripe.
 *
 * @param array                         $subscription_args Arguments used to create the Subscription.
 * @param SimplePay\Core\Abstracts\Form $form Form instance.
 * @param array                         $form_data Form data generated by the client.
 * @param array                         $form_values Values of named fields in the payment form.
 * @param int                           $customer_id Stripe Customer ID.
 * @return array
 */
function simpay_add_custom_subscription_metadata( $subscription_args, $form, $form_data, $form_values, $customer_id ) {
	// Add metadata with a key of `shirt_color` and a value of "Red".
	$subscription_args['metadata']['shirt_color'] = 'Red';

	// Add metadata with a key of `shirt_size` and a value of "Medium".
	$subscription_args['metadata']['shirt_size'] = 'Medium';

	return $subscription_args;
}
add_filter( 'simpay_get_subscription_args_from_payment_form_request', 'simpay_add_custom_subscription_metadata', 10, 5 );