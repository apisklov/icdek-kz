<section class="section section--marketplace">
    <div class="container">
        <div class="section__wrapper">
            <?php if (is_forward()) : ?>
                <div class="section__label">
                    <div class="label label--green">CDEK Forward</div>
                </div>
            <?php endif; ?>
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
            </div>
            <?php if ($args['subtitle']) : ?>
                <div class="section__desc">
                    <?php echo $args['subtitle'] ?>
                </div>
            <?php endif; ?>
            <div class="section__content">
                <div class="marketplace">
                    <div class="marketplace__wrapper">
                        <?php if (! empty($args['list'])) : ?>
                            <div class="marketplace__list">
                                <?php foreach ($args['list'] as $item) : ?>
                                    <div class="marketplace__item">
                                        <div class="marketplace__image">
                                            <?php echo wp_get_attachment_image($item['image'], 'full') ?>
                                        </div>
                                        <div class="marketplace__text"><?php echo $item['text'] ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (! empty($args['logos'])) : ?>
                            <div class="marketplace__logos">
                                <?php foreach ($args['logos'] as $logo) : ?>
                                    <div class="marketplace__logo">
                                        <img src="<?php echo $logo ?>" alt="Логотип магазина" title="Лого магазина">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (! empty($args['button']['text'])) : ?>
                            <div class="marketplace__action">
                                <div class="marketplace__action-text"><?php echo $args['text'] ?></div>
                                <div class="marketplace__button">
                                    <?php do_action('element/button', $args['button']) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>