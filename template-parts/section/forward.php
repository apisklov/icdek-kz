<section class="section section--forward">
    <div class="container">
        <div class="section__wrapper">
            <div class="forward">
                <div class="forward__wrapper">
                    <div class="forward__content">
                        <div class="forward__title">
                            <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
                        </div>
                        <div class="forward__desc"><?php echo $args['subtitle'] ?></div>
                        <div class="forward__button">
                            <?php do_action('element/button', $args['button']) ?>
                        </div>
                    </div>
                    <div class="forward__picture">
                        <div class="forward__logo">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/cdek-forward.svg' ?>" alt="Логотип CDEK Forward" title="СДЭК Forward">
                        </div>
                        <div class="forward__shops">
                            <?php foreach ($args['shops'] as $shop) : ?>
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/shops/' . $shop ?>" alt="Логотип магазина" title="Лого магазина">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>