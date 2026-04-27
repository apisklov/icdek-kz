<section class="section section--guide">
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
                <div class="guide <?php echo esc_attr( $args['classes'] ) ?>">
                    <div class="guide__wrapper">
                        <div class="guide__content">
                            <div class="guide__list">
                                <?php foreach ($args['list'] as $item) : ?>
                                    <div class="guide__item">
                                        <div class="counter"></div>
                                        <div class="guide__title"><?php echo $item['title'] ?></div>
                                        <div class="guide__text"><?php echo $item['text'] ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (! empty($args['button']['text'])) : ?>
                                <div class="guide__button">
                                    <?php do_action('element/button', $args['button']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="guide__image">
                            <?php echo wp_get_attachment_image($args['image'], 'full') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>