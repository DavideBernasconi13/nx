<?php get_header(); ?>
<div class="container py-5">
    <?php if (is_search()) { ?>
        <h1 class="bg-success"><?php esc_html_e("Result for: ", "nx") ?>     <?php echo $s; ?></h1>
    <?php } else if (is_category() || is_tag()) { ?>
            <h1 class="bg-danger"><?php echo single_cat_title() ?></h1>
    <?php } else { ?>
            <h1 class="bg-danger"><?php bloginfo('description') ?></h1>
    <?php } ?>

    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <article <?php post_class() ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                        <p><?php the_time('j M Y') ?> - <?php the_category(', ') ?></p>
                        <a
                            href="<?php the_permalink(); ?>"><?php the_post_thumbnail('nx_single', array('class' => 'img-fluid mb-4', 'alt' => get_the_title())) ?></a>
                        <p><?php the_excerpt() ?></p>
                    </article>

                    <hr class="my-5">


                <?php endwhile; else: ?>
                <p><?php esc_html_e('Sorry, no post matched your criteria ', 'nx'); ?></p>
            <?php endif; ?>
        </div>
        <?php get_sidebar() ?>
    </div>

</div>

<?php get_footer(); ?>