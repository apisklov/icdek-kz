<section class="section section--calc">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
            </div>
            <?php if (! empty($args['subtitle'])) : ?>
                <div class="section__desc"><?php echo $args['subtitle'] ?></div>
            <?php endif; ?>
            <div class="section__content">
                <?php if (! empty($args['table'])) : ?>
                    <div class="table">
                        <table>
                            <tr>
                                <th>Откуда</th>
                                <th>Куда</th>
                                <th>Стоимость</th>
                                <th>Сроки доставки</th>
                            </tr>
                            <?php foreach ($args['table'] as $row) : ?>
                                <tr>
                                    <td><?php echo $row['from'] ?></td>
                                    <td><?php echo $row['to'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['time'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
                <div class="calc" id="calc">
                    <div class="calc__wrapper">
                        <form class="calc__form" ref="form" @submit.prevent>
                            <div class="calc__loader" v-if="loader">
                                <div class="spinner"></div>
                                <div class="calc__loader-text"><?php esc_html_e('Считаем доставку', 'icdek') ?>...</div>
                            </div>
                            <div class="calc__fields">
                                <div class="calc__field calc__field--point">
                                    <div class="field">
                                        <div class="field__label"><?php esc_html_e('Откуда', 'icdek') ?></div>
                                        <input type="text" class="field__input" placeholder="Город отправления" data-required="suggest" name="from" id="calc-from">
                                    </div>
                                </div>
                                <div class="calc__field calc__field--point">
                                    <div class="field">
                                        <div class="field__label"><?php esc_html_e('Куда', 'icdek') ?></div>
                                        <input type="text" class="field__input" placeholder="Город назначения" data-required="suggest" name="to" id="calc-to">
                                    </div>
                                </div>
                                <div class="calc__field calc__field--cargo">
                                    <div class="calc__cargo" v-for="(item, key) in cargo" :key="key">
                                        <div class="calc__remove" v-if="key > 0" @click="removeCargo(key)"><?php get_svg('/icons/minus.svg') ?></div>
                                        <div class="field field--sizes">
                                            <div class="field__label" v-if="key == 0"><?php esc_html_e('Размеры отправления, см', 'icdek') ?></div>
                                            <div class="field__sizes">
                                                <input type="number" placeholder="60" data-required="size" v-model="item.length">
                                                ×
                                                <input type="number" placeholder="40" data-required="size" v-model="item.width">
                                                ×
                                                <input type="number" placeholder="40" data-required="size" v-model="item.height">
                                            </div>
                                        </div>
                                        <div class="field field--weight">
                                            <div class="field__label" v-if="key == 0">Вес, кг</div>
                                            <input type="number" class="field__input" placeholder="2.5" data-required="weight" v-model="item.weight" step="0.1">
                                        </div>
                                    </div>
                                    <div class="calc__add" @click="addCargo"><?php get_svg('/icons/plus.svg') ?><?php esc_html_e('Добавить еще', 'icdek') ?></div>
                                </div>
                            </div>
                            <div class="calc__button">
                                <button class="button button--fill button--green" @click="submit"><span class="mobile"><?php esc_html_e('Расчитать доставку', 'icdek') ?></span><span class="desktop"><?php esc_html_e('Рассчитать стоимость доставки', 'icdek') ?></span></button>
                            </div>
                            <input type="hidden" name="utm_source" value="<?php echo isset($_GET['utm_source']) ? $_GET['utm_source'] : '' ?>">
                            <input type="hidden" name="utm_medium" value="<?php echo isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '' ?>">
                            <input type="hidden" name="utm_campaign" value="<?php echo isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '' ?>">
                            <input type="hidden" name="utm_content" value="<?php echo isset($_GET['utm_content']) ? $_GET['utm_content'] : '' ?>">
                            <input type="hidden" name="utm_term" value="<?php echo isset($_GET['utm_term']) ? $_GET['utm_term'] : '' ?>">
                        </form>
                        <div class="calc__result" v-if="result">
                            <div class="calc__table">
                                <div class="calc__row head">
                                    <div class="calc__col">
                                        <span class="route">{{ from }} – {{ to }} </span>
                                        <span class="cargo">{{ volume }} м³, {{ weight }} кг</span>
                                    </div>
                                    <div class="calc__col"><?php esc_html_e('Без договора', 'icdek') ?></div>
                                    <div class="calc__col">
                                        <span class="sale"><?php esc_html_e('С договором', 'icdek') ?></span>
                                    </div>
                                </div>
                                <div class="calc__row" v-for="tarif in result">
                                    <div class="calc__col">{{ tarif.tariff_name }}</div>
                                    <div class="calc__col">{{ priceWithoutSale(tarif.delivery_sum) }} руб</div>
                                    <div class="calc__col">{{ formatPrice(tarif.delivery_sum) }} руб</div>
                                </div>
                            </div>
                        </div>
                        <div class="calc__action" v-if="result">
                            <?php do_action('element/button', [
                                'text' => __('Обсудить условия', 'icdek'),
                                'action' => 'modal',
                                'modal' => '#popup-request'
                            ]) ?>
                        </div>
                        <div class="calc__error" v-if="error">{{ error }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>