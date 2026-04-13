<div class="wrap">
    <h1>Загрузка данных в Метрику</h1>
    <form id="load-metrika-chats" class="b-form">
        <div class="b-form__info">
            Последняя загрузка: <?php echo date_i18n('j F Y \в H:i:s', $args['last_update']) ?>
        </div>
        <div class="b-form__field">
            <input type="file" name="file">
        </div>
        <div class="b-form__button">
            <button class="button">Загрузить</button>
        </div>
        <div class="b-form__spinner">
            <div class="spinner is-active"></div>
        </div>
        <div class="b-form__notice"></div>
    </form>
</div>