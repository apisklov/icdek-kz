<section class="section section--steps">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
            </div>
            <?php if ($args['subtitle']) : ?>
                <div class="section__desc">
                    <?php echo $args['subtitle'] ?>
                </div>
            <?php endif; ?>
            <div class="section__content">
                <div class="steps">
                    <div class="steps__wrapper">
                        <?php if (! is_forward()) : ?>
                            <div class="steps__slider" data-count="<?php echo esc_attr( count( $args['list'] ) ) ?>">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($args['list'] as $item) : ?>
                                            <div class="swiper-slide">
                                                <div class="steps__item">
                                                    <div class="counter"></div>
                                                    <div class="steps__text"><?php echo $item['text'] ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="steps__list">
                                <?php foreach ($args['list'] as $i => $item) : ?>
                                    <div class="steps__item">
                                        <div class="steps__icon">
                                            <?php include get_parent_theme_file_path('/assets/icons/forward-step-' . ($i + 1) . '.svg') ?>
                                        </div>
                                        <div class="steps__title"><?php echo $item['title'] ?></div>
                                        <div class="steps__text"><?php echo $item['text'] ?></div>
                                        <?php if ($i == 0) : ?>
                                            <div class="steps__button">
                                                <?php do_action( 'element/button', [
                                                    'action' => 'link',
                                                    'link' => 'https://cdek.ru',
                                                    'text' => 'Регистрация'
                                                ] ) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>