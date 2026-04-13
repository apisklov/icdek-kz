<div class="tracking" id="tracking">
    <div class="tracking__wrapper">
        <div class="tracking__loader" v-if="loader">
            <div class="spinner"></div>
            <div class="tracking__loader-text"><?php esc_html_e('Получаем информацию', 'icdek') ?>...</div>
        </div>
        <form class="tracking__form" ref="form" @submit.prevent>
            <div class="field">
                <div class="field__label">Номер заказа</div>
                <input type="text" class="field__input" placeholder="<?php _e('Введите номер заказа', 'icdek') ?>" v-model="invoice" data-required="invoice">
            </div>
            <button class="button button--fill button--green" @click="tracking"><?php _e('Отследить', 'icdek') ?></button>
        </form>
        <div class="tracking__error" v-if="error">{{ error }}</div>
    </div>

    <div class="tracking__data" v-if="list.length > 0">
        <div class="tracking__number">Номер заказа: {{ invoice }}</div>
        <div class="tracking__current">Текущий статус: <strong>{{ current }}</strong></div>
        <div class="tracking__list">
            <div class="tracking__item" v-for="item in list">
                <div class="tracking__item-status">{{ item.name }}</div>
                <div class="tracking__item-date">{{ formatDate(item.date_time) }}</div>
            </div>
        </div>
    </div>
</div>