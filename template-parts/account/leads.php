<div class="account-widget">
    <div class="account-widget__title">
        <div class="heading heading--level-4">Клиенты</div>
    </div>
    <div class="account-widget__content">
        <div class="account-leads">
            <div class="account-leads__wrapper">
                <?php if (! empty($args['leads'])) : ?>
                    <div class="account-leads__table">
                        <table>
                            <tr>
                                <th>Компания</th>
                                <th>Телефон</th>
                                <th>E-mail</th>
                                <th>Дата регистрации</th>
                                <?php if (current_user_can('cdek_admin') || current_user_can('administrator')) : ?>
                                    <th>Партнер</th>
                                <?php endif; ?>
                            </tr>
                            <?php foreach ($args['leads'] as $lead) : ?>
                                <tr>
                                    <td><a href="<?php echo home_url('account/leads/' . $lead['id'] . '/') ?>"><?php echo esc_html($lead['name']) ?></a></td>
                                    <td><span class="phone"><?php echo esc_html($lead['phone']) ?></span></td>
                                    <td><?php echo esc_html($lead['email']) ?></td>
                                    <td><?php echo esc_html($lead['date']) ?></td>
                                    <?php if (current_user_can('cdek_admin') || current_user_can('administrator')) : ?>
                                        <td>
                                            <?php if (get_userdata($lead['partner'])) : ?>
                                                <?php echo get_userdata($lead['partner'])->first_name ?>
                                            <?php else : ?>
                                                Прямой поток
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="account-leads__empty">
                        <div class="notice notice--info">Вы еще не привели ни одного клиента.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>