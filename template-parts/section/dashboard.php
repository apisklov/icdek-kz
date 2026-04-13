<div class="dashboard">
    <div class="dashboard__wrapper">
        <div class="dashboard__title">
            <h1 class="heading heading--level-2">Статистика партнеров</h1>
        </div>
        <div class="dashboard__table">
            <?php if (! empty($args['list'])) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <span class="js-sort" data-col="0">Партнер
                                </span>
                            </th>
                            <th>
                                <span class="js-sort" data-col="1">Всего клиентов</span>
                            </th>
                            <th><span class="js-sort" data-col="2">Клиентов за <span><?php echo mb_strtolower(date_i18n('F')); ?></span></span></th>
                            <th><span class="js-sort" data-col="3">Клиентов за <span><?php echo mb_strtolower(date_i18n('F', strtotime('-1 month'))); ?></span></span></th>
                            <th><span class="js-sort" data-col="4">Прибыль за <span><?php echo mb_strtolower(date_i18n('F', strtotime('-1 month'))); ?></span></span></th>
                            <th><span class="js-sort" data-col="5">Общая прибыль</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($args['list'] as $i => $partner) : ?>
                            <tr>
                                <td data-value="<?php echo $i ?>"><?php echo $partner['user']->data->user_login ?></td>
                                <td data-value="<?php echo esc_attr( $partner['stats']['summ_clients'] ) ?>"><?php echo $partner['stats']['summ_clients'] ?></td>
                                <td data-value="<?php echo esc_attr( $partner['stats']['current_clients'] ) ?>"><?php echo $partner['stats']['current_clients'] ?></td>
                                <td data-value="<?php echo esc_attr( $partner['stats']['prev_clients'] ) ?>"><?php echo $partner['stats']['prev_clients'] ?></td>
                                <td data-value="<?php echo esc_attr($partner['stats']['prev_month_profit']) ?>"><?php echo format_price($partner['stats']['prev_month_profit']) ?></td>
                                <td data-value="<?php echo esc_attr($partner['stats']['summ_profit']) ?>"><?php echo format_price($partner['stats']['summ_profit']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="dashboard__empty">Данных нет.</div>
            <?php endif; ?>
        </div>
    </div>
</div>