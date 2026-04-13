<section class="section section--faq">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo esc_html($args['title']) ?></h2>
            </div>
            <?php if (! empty($args['subtitle'])) : ?>
                <div class="section__desc"><?php echo $args['subtitle'] ?></div>
            <?php endif; ?>
            <div class="section__content">
                <div class="faq">
                    <div class="faq__wrapper">
                        <div class="faq__list">
                            <?php foreach ($args['list'] as $item) : ?>
                                <div class="faq__item">
                                    <div class="faq__question"><?php echo esc_html($item['question']) ?>
                                        <div class="caret"><?php get_svg('/icons/caret.svg') ?></div>
                                    </div>
                                    <div class="faq__answer"><?php echo $item['answer'] ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>