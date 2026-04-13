<section class="section section--features">
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
                <div class="features">
                    <div class="features__wrapper">
                        <div class="features__list <?php echo sanitize_html_class( $args['class'] ) ?>">
                            <?php foreach ($args['list'] as $item) : ?>
                                <div class="features__item">
                                    <?php if (! empty($item['icon'])) : ?>
                                        <div class="features__icon">
                                            <?php echo wp_get_attachment_image($item['icon'], 'full') ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="features__name"><?php echo esc_html($item['title']) ?></div>
                                    <div class="features__desc"><?php echo esc_html($item['desc']) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (! empty($args['text'])) : ?>
                            <div class="features__text"><?php echo $args['text'] ?></div>
                            <div class="features__manager">
                                <div class="manager manager--hero">
                                    <div class="manager__photo"><img src="<?php echo get_template_directory_uri() . '/assets/images/manager_1.png' ?>" alt="Фото менеджера СДЭК" title="Менеджер СДЭК"></div>
                                    <div class="manager__name">Юлия</div>
                                    <div class="manager__desc">Менеджер i-cdek.ru</div>
                                </div>
                            </div>
                            <div class="features__buttons">
                                <?php if (! empty($args['buttons'])) : ?>
                                    <?php foreach ($args['buttons'] as $button) : ?>
                                        <?php do_action( 'element/button', $button['button'] ) ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>