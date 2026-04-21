<section class="section section--scheme">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo esc_html($args['title']) ?></h2>
            </div>
            <?php if ($args['subtitle']) : ?>
                <div class="section__desc">
                    <?php echo $args['subtitle'] ?>
                </div>
            <?php endif; ?>
            <div class="section__content">
                <div class="marketplace-scheme">
                    <div class="marketplace-scheme__wrapper">
                        <div class="marketplace-scheme__list columns-<?php echo count( $args['list'] ) ?>">
                            <?php foreach ($args['list'] as $item) : ?>
                                <div class="marketplace-scheme__item">
                                    <?php if (! empty($item['types'])) : ?>
                                        <div class="marketplace-scheme__types">
                                            <?php foreach ($item['types'] as $type) : ?>
                                                <span><?php echo esc_html($type) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (! empty($item['icon'])) : ?>
                                        <div class="marketplace-scheme__icon"><?php echo wp_get_attachment_image($item['icon'], 'full') ?></div>
                                        <?php endif; ?>
                                    <div class="marketplace-scheme__name"><?php echo esc_html($item['title']) ?></div>
                                    <div class="marketplace-scheme__text"><?php echo esc_html($item['text']) ?></div>
                                    <?php if (! empty($item['services'])) : ?>
                                        <div class="marketplace-scheme__services">
                                            <?php foreach ($item['services'] as $service) : ?>
                                                <div class="marketplace-scheme__service"><?php echo __($service, 'icdek') ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (! empty($item['desc'])) : ?>
                                        <div class="marketplace-scheme__desc"><?php echo __($item['desc'], 'icdek') ?></div>
                                    <?php endif; ?>
                                    <?php if (! empty($item['shops'])) : ?>
                                        <div class="marketplace-scheme__shops">
                                            <?php foreach ($item['shops'] as $shop) : ?>
                                                <div class="marketplace-scheme__shop <?php echo sanitize_html_class(get_shop_html_class($shop)) ?>"><?php echo esc_html($shop) ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="marketplace-scheme__button">
                                        <?php do_action('element/button', $args['button']) ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>