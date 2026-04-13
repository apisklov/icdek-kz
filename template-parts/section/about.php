<section class="section section--about">
    <div class="container">
        <div class="section__wrapper">
            <div class="about">
                <div class="about__wrapper">
                    <ul class="about__list">
                        <?php foreach( $args['list'] as $item ) : ?>
                        <li class="about__item">
                            <span class="about__figure"><?php echo esc_html( $item['figure'] ) ?></span>
                            <span class="about__text"><?php echo esc_html( $item['text'] ) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>