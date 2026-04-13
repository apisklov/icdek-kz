<div class="account-widget">
    <div class="account-widget__title">
        <div class="heading heading--level-4">Статистика</div>
    </div>
    <div class="account-widget__content">
        <div class="account-stat">
            <div class="account-stat__wrapper">
                <div class="account-stat__list">
                    <div class="account-stat__widget">
                        <div class="account-stat__widget-title">Всего партнеров</div>
                        <div class="account-stat__widget-value"><?php echo esc_html(count($args['partners'])) ?></div>
                    </div>
                    <div class="account-stat__widget">
                        <div class="account-stat__widget-title">Всего клиентов</div>
                        <div class="account-stat__widget-value"><?php echo esc_html($args['leads']) ?></div>
                    </div>
                    <div class="account-stat__widget">
                        <div class="account-stat__widget-title">Клиентов за <?php echo mb_strtolower(date_i18n('F', strtotime('-1 month'))); ?></div>
                        <div class="account-stat__widget-value"><?php echo esc_html($args['prev_month_leads']) ?></div>
                    </div>
                    <div class="account-stat__widget">
                        <div class="account-stat__widget-title">Клиентов за <?php echo mb_strtolower(date_i18n('F')); ?></div>
                        <div class="account-stat__widget-value"><?php echo esc_html($args['current_month_leads']) ?></div>
                    </div>
                </div>
                <?php if (! empty($args['partners'])) : ?>
                    <div class="account-stat__subtitle">Партнеры</div>
                    <div class="account-stat__table">
                        <table>
                            <tr>
                                <th>Партнер</th>
                                <th>Дата регистрации</th>
                                <th>Приведенных клиентов</th>
                            </tr>
                            <?php foreach ($args['partners'] as $partner) : ?>
                                <tr>
                                    <td><?php echo esc_html( $partner['name'] ) ?></td>
                                    <td><?php echo esc_html( $partner['date'] ) ?></td>
                                    <td><?php echo esc_html( $partner['leads'] ) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>