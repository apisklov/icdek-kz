<div class="account-sidebar">
    <nav class="account-sidebar__nav">
        <?php if (! empty($args['list'])) : ?>
            <ul class="account-sidebar__list">
                <?php foreach ($args['list'] as $item) : ?>
                    <li class="account-sidebar__item">
                        <a href="<?php echo esc_url( home_url( $item['link'] ) ) ?>" class="account-sidebar__link <?php echo esc_attr( $item['icon'] ) ?> <?php echo ( is_account_current_page( $item['link'] ) ? 'is-active' : '' ) ?>">
                        <?php include get_theme_file_path( '/assets/icons/account/' . $item['icon'] . '.svg' ) ?>
                        <?php echo esc_html( $item['label'] ) ?>
                    </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </nav>
</div>