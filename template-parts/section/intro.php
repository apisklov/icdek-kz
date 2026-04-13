<section class="intro <?php echo sanitize_html_class('intro--' . $args['style']) ?>">
    <div class="container">
        <div class="intro__wrapper">
            <div class="intro__content">
                <?php if (! empty($args['label'])) : ?>
                    <div class="intro__label">
                        <div class="label label--green"><?php echo $args['label'] ?></div>
                    </div>
                <?php endif; ?>
                <div class="intro__title">
                    <h1 class="heading heading--level-<?php echo sanitize_html_class($args['heading']) ?>"><?php echo $args['title'] ?></h1>
                </div>
                <?php if (! empty($args['subtitle'])) : ?>
                    <div class="intro__desc"><?php echo $args['subtitle'] ?></div>
                <?php endif; ?>

                <?php if (! empty($args['features'])) : ?>
                    <div class="intro__features">
                        <?php foreach ($args['features'] as $item) : ?>
                            <div class="intro__feature"><?php echo $item['text'] ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (! empty($args['button']['text'])) : ?>
                    <div class="intro__action">
                        <div class="intro__buttons">
                            <?php if (! empty($args['button']['text'])) : ?>
                                <div class="intro__button">
                                    <?php do_action('element/button', $args['button']) ?>
                                </div>
                            <?php endif; ?>
                            <?php if (! empty($args['other_button']['text'])) : ?>
                                <div class="intro__button">
                                    <?php do_action('element/button', $args['other_button']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (! is_forward() && empty( $args['other_button'] )) : ?>
                            <div class="intro__manager">
                                <div class="manager">
                                    <div class="manager__photo">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/manager_1.png' ?>" alt="Фото менеджера СДЭК" title="Менеджер СДЭК">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/manager_2.png' ?>" alt="Фото менеджера СДЭК" title="Менеджер СДЭК">
                                    </div>
                                    <div class="manager__desc">С вами свяжется менеджер и ответит на все вопросы</div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (! empty($args['image'])) : ?>
                <div class="intro__picture">
                    <?php echo wp_get_attachment_image($args['image'], 'full') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>