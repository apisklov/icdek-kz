<?php get_header() ?>
<main class="main">
    <div class="container">
        <article class="article">
            <div class="article__wrapper">
                <div class="article__heading">
                    <h1 class="heading heading--level-2"><?php echo get_the_title() ?></h1>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="article__thumbnail">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'full') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="article__content">
                    <div class="article__text">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </article>
    </div>
</main>
<?php get_footer() ?>