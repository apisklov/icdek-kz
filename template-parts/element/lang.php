<div class="lang">
    <a href="<?php echo esc_url( $args['link'] ) ?>" class="lang__label"><img src="<?php echo get_template_directory_uri() ?>/assets/icons/lang/<?php echo $args['active'] ?>.svg"></a>
    <?php if (! empty($args['list'])) : ?>
        <ul class="lang__list">
            <?php foreach ($args['list'] as $item) : ?>
                <li class="lang__item">
                    <a href="<?php echo $item['link'] ?>" class="lang__link">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/lang/<?php echo $item['locale'] ?>.svg" alt="">
                        <?php echo get_lang_name_by_code($item['locale']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>