<?php get_header() ?>
<main class="main">
    <section class="section section--error">
        <div class="container">
            <div class="error">
                <div class="error__wrapper">
                    <div class="error__title">
                        <div class="heading heading--level-2">Страница не найдена</div>
                    </div>
                    <div class="error__text">
                        <p>Такой страницы больше нет или она доступна по другой ссылке.</p>
                        <p>Проверьте адрес страницы, он может быть некорректным.</p>
                    </div>
                    <div class="error__button">
                        <a href="<?php echo home_url() ?>" class="button button--green button--fill">Вернуться на главную</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>