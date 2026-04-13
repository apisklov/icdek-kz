<?php
/* 
 * Template Name: Дашборд
 */
?>

<?php get_header() ?>
<main class="main">
    <section class="section section--dashboard">
        <div class="container">
            <div class="section__wrapper">
                <?php do_action( 'section/dashboard' ) ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>