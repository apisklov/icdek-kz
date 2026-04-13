<?php if ($args['action'] == 'link') :  ?>
    <a href="<?php echo esc_html($args['link']) ?>" <?php echo ( is_forward() ) ? 'target="_blank"' : '' ?> class="button button--green button--<?php echo sanitize_html_class( $args['style'] ) ?> <?php echo sanitize_html_class( $args['classes'] ) ?>"><?php esc_html_e($args['text'], 'icdek') ?></a>
<?php elseif ($args['action'] == 'scroll') :  ?>
    <a href="#" data-scroll-to="<?php echo esc_attr($args['scroll']) ?>" class="button button--green button--<?php echo sanitize_html_class( $args['style'] ) ?> <?php echo sanitize_html_class( $args['classes'] ) ?>"><?php esc_html_e($args['text'], 'icdek') ?></a>
<?php elseif ($args['action'] == 'modal') :  ?>
    <a href="#" data-fancybox data-src="<?php echo esc_attr($args['modal']) ?>" class="button button--green button--<?php echo sanitize_html_class( $args['style'] ) ?> <?php echo sanitize_html_class( $args['classes'] ) ?>"><?php esc_html_e($args['text'], 'icdek') ?></a>
<?php endif; ?>