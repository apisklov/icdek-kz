<section class="section section--promo">
    <div class="container">
        <div class="section__content">
            <div class="promo">
                <div class="promo__wrapper">
                    <div class="promo__content">
                        <?php if (! empty($args['title'])) : ?>
                            <div class="promo__title"><?php echo $args['title'] ?></div>
                        <?php endif; ?>
                        <div class="promo__desc"><?php echo $args['subtitle'] ?></div>
                        <div class="promo__action">
                            <div class="promo__button">
                                <?php do_action('element/button', $args['button']) ?>
                            </div>
                            <?php if (! is_forward()) : ?>
                                <div class="promo__manager">
                                    <div class="manager">
                                        <div class="manager__photo">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/images/manager_1.png' ?>" alt="Фото менеджера СДЭК" title="Менеджер СДЭК">
                                        </div>

                                        <div class="manager__desc"><?php echo __( 'Юлия свяжется с вами для обсуждения условий', 'icdek' ) ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="promo__picture">
                        <?php echo wp_get_attachment_image($args['picture'], 'full') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>