<section class="section section--countries">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo esc_html($args['title']) ?></h2>
            </div>
            <?php if (! empty($args['subtitle'])) : ?>
                <div class="section__desc"><?php echo $args['subtitle'] ?></div>
            <?php endif; ?>
            <div class="section__content">
                <div class="countries">
                    <div class="countries__wrapper">
                        <?php if ($args['view'] == 'list') : ?>
                            <div class="countries__list">
                                <?php foreach ($args['list'] as $item) : ?>
                                    <div class="countries__item">
                                        <div class="countries__flag">
                                            <?php echo wp_get_attachment_image($item['flag'], 'full') ?>
                                        </div>
                                        <div class="countries__name"><?php echo $item['title'] ?></div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="countries__more">Показать все</div>
                            </div>
                        <?php elseif ($args['view'] == 'b2b') : ?>
                            <?php foreach ($args['sections'] as $section) : ?>
                                <div class="countries__section">
                                    <div class="countries__section-title"><?php echo $section['title'] ?></div>
                                    <div class="countries__section-list">
                                        <?php foreach ($section['list'] as $country) : ?>
                                            <div class="countries__item">
                                                <div class="countries__flag">
                                                    <?php echo wp_get_attachment_image($country['flag'], 'full') ?>
                                                </div>
                                                <div class="countries__name"><?php echo $country['title'] ?></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="countries__carousel">
                                <?php foreach ($args['list'] as $chunk) : ?>
                                    <div class="countries__carousel-line">
                                        <?php for ($i = 0; $i < 2; $i++) : ?>
                                            <div class="countries__carousel-items">
                                                <?php foreach ($chunk as $country) : ?>
                                                    <div class="countries__item">
                                                        <div class="countries__flag">
                                                            <?php echo wp_get_attachment_image($country['flag'], 'full') ?>
                                                        </div>
                                                        <div class="countries__name"><?php echo $country['title'] ?></div>
                                                        <div class="countries__desc"><?php echo $country['desc'] ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endfor; ?>
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