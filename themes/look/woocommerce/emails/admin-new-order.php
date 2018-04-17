<?php
/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf( __( 'You have received an order from %s. The order is as follows:', 'look' ), $order->get_formatted_billing_full_name() ); ?></p>

<?php do_action( 'woocommerce_email_before_order_table', $order, true, false ); ?>

<h2><a href="<?php echo admin_url( 'post.php?post=' . $order->id . '&action=edit' ); ?>"><?php printf( __( 'Order #%s', 'look'), $order->get_order_number() ); ?></a> (<?php printf( '<time datetime="%s">%s</time>', date_i18n( 'c', strtotime( $order->order_date ) ), date_i18n( wc_date_format(), strtotime( $order->order_date ) ) ); ?>)</h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #111;" border="1" bordercolor="#111">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Product', 'look' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Quantity', 'look' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #111;"><?php _e( 'Price', 'look' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo (string)$order->email_order_items_table( false, true ); ?>
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

<?php do_action( 'woocommerce_email_after_order_table', $order, true, false ); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, true, false ); ?>

<?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>
