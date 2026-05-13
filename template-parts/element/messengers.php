<div class="messengers">
    <?php if (get_setting('telegram')) : ?>
        <a href="<?php echo esc_url(get_redirect_messenger_link( 'telegram' )) ?>" target="_blank" class="messengers__item messenger-telegram" onclick="ym(100407972, 'reachGoal', 'telegram'); ym(100407972, 'reachGoal', 'messenger'); return true;"><img src="<?php echo get_template_directory_uri() . '/assets/icons/telegram.svg' ?>" alt="Иконка Telegram" title="Написать в Telegram"></a>
    <?php endif; ?>
    <?php if (get_setting('whatsapp')) : ?>
        <a href="<?php echo esc_url(get_redirect_messenger_link( 'whatsapp' )) ?>" target="_blank" class="messengers__item messenger-whatsapp" onclick="ym(100407972, 'reachGoal', 'whatsapp'); ym(100407972, 'reachGoal', 'messenger'); return true;"><img src="<?php echo get_template_directory_uri() . '/assets/icons/whatsapp.svg' ?>" alt="Иконка WhatsApp" title="Написать в WhatsApp"></a>
    <?php endif; ?>
    <?php if (get_setting('max')) : ?>
        <a href="<?php echo esc_url(get_setting('max')) ?>" target="_blank" class="messengers__item messenger-max"><img src="<?php echo get_template_directory_uri() . '/assets/icons/max.svg' ?>" alt="Иконка MAX" title="Написать в MAX"></a>
    <?php endif; ?>
</div>