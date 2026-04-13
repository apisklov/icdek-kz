<?php

/**
 * Template Name: Промо
 */
?>

<?php get_header() ?>
<main class="main">
    <section class="promo-intro">
        <div class="container">
            <div class="promo-intro__wrapper">
                <div class="promo-intro__content">
                    <div class="promo-intro__left">
                        <div class="promo-intro__label">
                            1 000 000 рублей — главному продавцу года
                            <span class="emoji">🏆</span>
                        </div>
                        <div class="promo-intro__title">
                            <h1 class="heading heading--level-1">2026 — год продаж</h1>
                        </div>
                        <div class="promo-intro__desc">Приведи клиента — заработай уже сегодня</div>
                    </div>
                    <div class="promo-intro__right">
                        <div class="promo-intro__text">
                            <p data-aos="fade-right" data-aos-delay="300" data-aos-easing="ease-out">Каждый сотрудник — продавец.</p>
                            <p data-aos="fade-right" data-aos-delay="600" data-aos-easing="ease-out">Каждый может привести клиента.</p>
                            <p data-aos="fade-right" data-aos-delay="900" data-aos-easing="ease-out">Каждый может заработать.</p>
                        </div>
                        <div class="promo-intro__button">
                            <a target="_blank" href="<?php echo home_url( '/account/register/' ) ?>" class="button button--green button--fill">Хочу участвовать</a>
                            <a target="_blank" href="<?php echo home_url( '/promo/dashboard/' ) ?>" class="button button--green button--border">Дашборд</a>
                        </div>
                    </div>
                </div>
                <div class="promo-intro__picture" data-aos="fade" data-aos-delay="50" data-aos-duration="800" data-aos-easing="ease-out">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-intro.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="promo-info">
        <div class="container">
            <div class="promo-info__wrapper">
                <div class="promo-info__content">
                    <div class="promo-info__left">
                        <div class="promo-info__label">2026 год — год продаж</div>
                        <div class="promo-info__title">
                            <h2 class="heading heading--level-2">Высокий сезон — наш старт, наш разгон...</h2>
                        </div>
                        <div class="promo-info__text">
                            <p>Покажем на что мы способны: Соберем максимум заказов, максимум довольных клиентов, максимум личного драйва. А в следующем году сделаем историю.</p>
                            <p>Неважно, где ты работаешь — в офисе, на складе, в ПВЗ или в доставке. Ты знаешь наш сервис, ты знаешь наши продукты, ты видишь клиентов каждый день, и ты можешь привести новых.</p>
                        </div>
                        <div class="promo-info__button">
                            <a target="_blank" href="<?php echo home_url( '/account/register/' ) ?>" class="button button--green button--fill">Хочу участвовать</a>
                        </div>
                    </div>
                    <div class="promo-info__right">
                        <div class="promo-info__picture">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-info.jpg" alt="">
                            <div class="promo-info__picture-box"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-steps">
        <div class="container">
            <div class="promo-steps__wrapper">
                <div class="promo-steps__heading">
                    <div class="promo-steps__title">
                        <h2 class="heading heading--level-2">Всё просто и прозрачно</h2>
                    </div>
                    <div class="promo-steps__desc">Теперь каждый сотрудник получит персональную реферальную ссылку.<br> Делись ею — и зарабатывай!</div>
                </div>
                <div class="promo-steps__content">
                    <div class="promo-steps__list">
                        <div class="promo-steps__item">
                            <div class="promo-steps__item-icon" data-aos="zoom-in" data-aos-duration="800">💼</div>
                            <div class="promo-steps__item-name">Приведи клиента</div>
                            <div class="promo-steps__item-text">Клиент заключает договор</div>
                        </div>

                        <div class="promo-steps__item">
                            <div class="promo-steps__item-icon" data-aos="zoom-in"
                                data-aos-delay="300"
                                data-aos-duration="800">💰</div>
                            <div class="promo-steps__item-name">Получи бонус — 1000 ₽</div>
                            <div class="promo-steps__item-text">За каждого привлечённого клиента</div>
                        </div>

                        <div class="promo-steps__item">
                            <div class="promo-steps__item-icon"
                                data-aos="zoom-in"
                                data-aos-delay="600"
                                data-aos-duration="800">📈</div>
                            <div class="promo-steps__item-name">Следи за результатом</div>
                            <div class="promo-steps__item-text">Через личный кабинет / отчёт</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-sellers">
        <div class="container">
            <div class="promo-sellers__wrapper">
                <div class="promo-sellers__content">
                    <div class="promo-sellers__left">
                        <div class="promo-sellers__picture">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-sellers.jpg" alt="">
                            <div class="promo-sellers__picture-box"></div>
                            <div class="promo-sellers__picture-emoji">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-sellers-emoji-1.png" class="emoji-1" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="400">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-sellers-emoji-2.png" class="emoji-2" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="400">
                            </div>
                        </div>
                    </div>
                    <div class="promo-sellers__right">
                        <div class="promo-sllers__title">
                            <h2 class="heading heading--level-2">Продавать могут все</h2>
                        </div>
                        <div class="promo-sellers__text">
                            <p>Не только отдел продаж. Теперь бонусы доступны каждому:</p>
                            <ul>
                                <li>операторам ПВЗ</li>
                                <li>администраторам</li>
                                <li>руководителям отделов</li>
                                <li>курьерам</li>
                                <li>офисным сотрудникам</li>
                            </ul>
                            <p>Мы хотим, чтобы вклад каждого был учтён. Чтобы успех компании стал результатом команды.</p>
                        </div>
                        <div class="promo-sellers__button">
                            <a target="_blank" href="<?php echo home_url( '/account/register/' ) ?>" class="button button--green button--fill">Хочу участвовать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-gift">
        <div class="container">
            <div class="promo-gift__wrapper">
                <div class="promo-gift__picture" data-aos="fade-in" data-aos-delay="100" data-aos-duration="600">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/promo/promo-gift.jpg" alt="">
                </div>
                <div class="promo-gift__content">
                    <div class="promo-gift__heading">
                        <div class="emoji">🎉</div>
                        <div class="promo-gift__title">
                            <h2 class="heading heading--level-2">Стань лучшим — и получи</h2>
                        </div>
                    </div>
                    <div class="promo-gift__victory">1 000 000 рублей</div>
                    <div class="promo-gift__desc">
                        <div class="heading heading--level-2">Да, миллион. Реально.</div>
                    </div>
                    <div class="promo-gift__text">
                        <p>В конце 2026 года мы подведём итоги. Сотрудник, показавший лучший результат, получит главный приз — <br>
                            <strong>1 000 000 рублей.</strong>
                        </p>
                        <p>Это признание лидерства, энергии и веры в общее дело.</p>
                    </div>
                    <div class="promo-gift__button">
                        <a target="_blank" href="<?php echo home_url( '/account/register/' ) ?>" class="button button--green button--fill">Хочу участвовать</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-clients">
        <div class="container">
            <div class="promo-clients__wrapper">
                <div class="promo-clients__heading">
                    <div class="promo-clients__title">
                        <h2 class="heading heading--level-2">Где искать клиентов — идеи, которые работают</h2>
                    </div>
                    <div class="promo-clients__desc">Найти клиентов можно проще, чем кажется.<br> Вот несколько способов, которые уже доказали эффективность:</div>
                </div>

                <div class="promo-clients__list">
                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Рекомендации от знакомых</div>
                        <div class="promo-clients__item-desc">Расскажите друзьям и знакомым, у кого есть бизнес, что вы можете помочь им с доставкой — многие не знают, как просто подключиться.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-1.svg" alt="">
                        </div>
                    </div>

                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Сотрудничество с локальными магазинами и шоурумами</div>
                        <div class="promo-clients__item-desc">Мелкие продавцы ищут надёжную логистику — просто предложите им решение.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="400" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-2.svg" alt="">
                        </div>
                    </div>

                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Telegram и WhatsApp-группы</div>
                        <div class="promo-clients__item-desc">Локальные чаты предпринимателей, ритейлеров, маркетплейс-продавцов — отличное место, чтобы рассказать о доставке.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="600" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-3.svg" alt="">
                        </div>
                    </div>

                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Рекомендации от постоянных клиентов</div>
                        <div class="promo-clients__item-desc">Попросите клиента, которому нравится наш сервис, посоветовать нас коллеге.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="800" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-4.svg" alt="">
                        </div>
                    </div>

                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Социальные сети</div>
                        <div class="promo-clients__item-desc">Простой пост “Я работаю в СДЭК, могу помочь с доставкой для бизнеса — напишите” часто даёт неожиданные результаты.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-5.svg" alt="">
                        </div>
                    </div>

                    <div class="promo-clients__item">
                        <div class="promo-clients__item-name">Контакты из повседневной жизни</div>
                        <div class="promo-clients__item-desc">Парикмахер, мастер СТО, кафе, где вы обедаете — многие из них делают доставку и ищут надёжных<br> партнёров.</div>
                        <div class="promo-clients__item-icon" data-aos="fade-left" data-aos-delay="1200" data-aos-duration="500">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/clients/clients-6.svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="promo-clients__info">
                    Мы собрали ещё несколько идей и реальных кейсов,<br> как сотрудники находили клиентов без бюджета.
                </div>
                <div class="promo-clients__button">
                    <a href="" class="button button--fill button--green">Скоро поделимся</a>
                </div>
            </div>
        </div>
    </section>
    <section class="promo-callback">
        <div class="container">
            <div class="promo-callback__wrapper">
                <div class="promo-callback__heading">
                    <div class="emoji" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="400">✅</div>
                    <div class="promo-callback__title">
                        <h2 class="heading heading--level-2">Готов присоединиться?</h2>
                    </div>
                    <div class="promo-callback__desc">Заполни короткую форму — и получи персональную ссылку участника. Начни привлекать клиентов и зарабатывать уже сегодня.</div>
                </div>
                <div class="promo-callback__button">
                    <a target="_blank" href="<?php echo home_url( '/account/register/' ) ?>" class="button button--green button--fill">Хочу участвовать</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer('promo') ?>