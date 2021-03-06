<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php _e( "Your order has been received and is now being processed. Your order details are shown below for your reference:", 'look' ); ?></p>

<?php do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text ); ?>

<h2><?php printf( __( 'Order #%s', 'look' ), $order->get_order_number() ); ?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #111;" border="1" bordercolor="#111">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Product', 'look' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Quantity', 'look' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Price', 'look' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo (string)$order->email_order_items_table( $order->is_download_permitted(), true, $order->has_status( 'processing' ) ); ?>
	</tbody>
	<tfoot>
		<?php
		if ( $totals = $order->get_order_item_totals() ) {
			$i = 0;
			foreach ( $totals as $total ) {
				$i++;
				?><tr>
				<th scope="row" colspan="2" style="text-align:left; border: 1px solid #111; <?php if ( $i == 1 ) echo 'border-top-width: 1px;'; ?>"><?php echo (string)$total['label']; ?></th>
				<td style="text-align:left; border: 1px solid #111; <?php if ( $i == 1 ) echo 'border-top-width: 1px;'; ?>"><?php echo (string)$total['value']; ?></td>
			</tr><?php
		}
	}
	?>
</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
