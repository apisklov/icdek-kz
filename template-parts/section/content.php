<section class="section section--content">
    <div class="container">
        <div class="section__wrapper">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                <div class="content">
                    <?php the_content() ?>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>