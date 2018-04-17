<?php if(look_get_option('footer_layout')== '1'): ?>
<footer id="footer" <?php look_schema_metadata( array( 'context' => 'footer' ) ); ?>>
	<div class="container-fluid">
		<div class="footer-menu">
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
                <?php
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar') ) :
                endif; ?>
            <?php endif; ?>
		</div>
	</div>
</footer>
<?php endif ?>
</div>
</div>

<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	<section id="cartModal" class="modal fade" aria-hidden="false" aria-labelledby="cartModalLabel" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<button class="close" aria-label="Close" data-dismiss="modal" type="button">
					<span aria-hidden="true">&#xD7;</span>
				</button>
				<div class="content-item">
					<h3 class="screen-reader-text"><?php _e( 'Mini cart', 'look' ); ?></h3>
					<?php the_widget('WC_Widget_Cart');?>
				</div>		
			</div>
		</div>
	</section>
	<section id="searchModal" class="modal fade" aria-hidden="false" aria-labelledby="searchModalLabel" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<button class="close" aria-label="Close" data-dismiss="modal" type="button">
					<span aria-hidden="true">&#xD7;</span>
				</button>
				<div class="content-item">
					<h3 class="screen-reader-text" for="search"><?php _e( 'Search', 'look')?></h3>
					<p><?php _e( 'Type your keyword and hit enter button for result', 'look' ); ?></p>
					<?php if ( class_exists( 'WooCommerce' ) ) :
					get_product_search_form();
					else :
						get_search_form();
					endif ; ?>		
				</div>		
			</div>
		</div>
	</section>
	<section id="myModal" class="modal" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<button class="close" aria-label="Close" data-dismiss="modal" type="button">
					<span aria-hidden="true">&#xD7;</span>
				</button>
				<div class="content-item row product-quickview-content">

				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
