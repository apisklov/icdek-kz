<div class="account-widget">
    <?php if (! $args['error']) : ?>
        <div class="account-widget__title">
            <div class="heading heading--level-4"><?php echo esc_html($args['name']) ?></div>
            <div class="account-widget__date">от <?php echo $args['date'] ?></div>
        </div>
    <?php endif; ?>
    <div class="account-widget__content">
        <div class="account-lead">
            <div class="account-lead__wrapper">
                <?php if (! $args['error']) : ?>
                    <div class="account-lead__info">
                    <?php if (! empty($args['data']['person'])) : ?>
                            <div class="account-lead__line">
                                <b>Тип организации: </b> <?php echo esc_html($args['data']['person']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['name'])) : ?>
                            <div class="account-lead__line">
                                <b>Наименование/ФИО: </b> <?php echo esc_html($args['data']['name']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['date_birth'])) : ?>
                            <div class="account-lead__line">
                                <b>Дата рождения: </b> <?php echo esc_html($args['data']['date_birth']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['passport_number'])) : ?>
                            <div class="account-lead__line">
                                <b>Серия и номер паспорта: </b> <?php echo esc_html($args['data']['passport_number']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['passport_date'])) : ?>
                            <div class="account-lead__line">
                                <b>Дата выдачи паспорта: </b> <?php echo esc_html($args['data']['passport_date']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['passport_point'])) : ?>
                            <div class="account-lead__line">
                                <b>Кем выдан паспорт: </b> <?php echo esc_html($args['data']['passport_point']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['passport_address'])) : ?>
                            <div class="account-lead__line">
                                <b>Адрес регистрации: </b> <?php echo esc_html($args['data']['passport_address']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['inn'])) : ?>
                            <div class="account-lead__line">
                                <b>ИНН: </b> <?php echo esc_html($args['data']['inn']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['address_legal'])) : ?>
                            <div class="account-lead__line">
                                <b>Юридический адрес: </b> <?php echo esc_html($args['data']['address_legal']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['address_fact'])) : ?>
                            <div class="account-lead__line">
                                <b>Фактический адрес: </b> <?php echo esc_html($args['data']['address_fact']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['number_license'])) : ?>
                            <div class="account-lead__line">
                                <b>Номер свидетельства: </b> <?php echo esc_html($args['data']['number_license']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['date_license'])) : ?>
                            <div class="account-lead__line">
                                <b>Дата выдачи свидетельства: </b> <?php echo esc_html($args['data']['date_license']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['bik'])) : ?>
                            <div class="account-lead__line">
                                <b>БИК банка: </b> <?php echo esc_html($args['data']['bik']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['payment'])) : ?>
                            <div class="account-lead__line">
                                <b>Расчетный счет: </b> <?php echo esc_html($args['data']['payment']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['fio_anketa'])) : ?>
                            <div class="account-lead__line">
                                <b>ФИО заполнителя анкеты: </b> <?php echo esc_html($args['data']['fio_anketa']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['fio_director'])) : ?>
                            <div class="account-lead__line">
                                <b>ФИО директора: </b> <?php echo esc_html($args['data']['fio_director']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['base_director'])) : ?>
                            <div class="account-lead__line">
                                <b>Основания действий директора: </b> <?php echo esc_html($args['data']['base_director']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['phone'])) : ?>
                            <div class="account-lead__line">
                                <b>Телефон: </b> <?php echo esc_html($args['data']['phone']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['email'])) : ?>
                            <div class="account-lead__line">
                                <b>E-mail: </b> <?php echo esc_html($args['data']['email']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['link'])) : ?>
                            <div class="account-lead__line">
                                <b>Ссылка интернет-магазина: </b> <?php echo esc_html($args['data']['link']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['comments'])) : ?>
                            <div class="account-lead__line">
                                <b>Комментарий: </b> <?php echo esc_html($args['data']['comments']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['point_city'])) : ?>
                            <div class="account-lead__line">
                                <b>Город возврата посылок: </b> <?php echo esc_html($args['data']['point_city']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($args['data']['point_address'])) : ?>
                            <div class="account-lead__line">
                                <b>Адрес возврата посылок: </b> <?php echo esc_html($args['data']['point_address']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="account-lead__error">
                        <div class="notice notice--warning"><?php echo esc_html( $args['error'] ) ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>