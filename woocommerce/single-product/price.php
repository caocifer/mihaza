<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.9
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $product;
    $display_price         = $product->get_display_price();
    $display_regular_price = $product->get_display_price( $product->get_regular_price() );
    $display_sale_price    = $product->get_display_price( $product->get_sale_price() );
    $discount = $display_regular_price - $display_sale_price;
    $discount_percent = ($discount/$display_regular_price)*100;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

  <p class="price mihaza-price">
    <span class="list_price"><?php echo __( 'Giá thị trường: ', 'electro' ) . wc_price( $display_regular_price ); ?></span>
    <span class="sale_price"><?php echo __( 'Tại Mihaza: ', 'electro' ) . '<span class="main_price">' .wc_price( $display_sale_price ) . '</span>'; ?></span>
    <span class="discount_price"><?php echo __( 'Tiết kiệm: ', 'electro' ) . wc_price( $discount ). '('.round($discount_percent).'%)'; ?></span>

  </p>

  <meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
  <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
  <link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
