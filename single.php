<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-8">
            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <article <?php post_class() ?>>
                        <h1 class="display-4"><?php the_title() ?></h1>
                        <p><?php the_time('j M Y') ?> - <?php the_category(', ') ?></p>
                        <?php the_post_thumbnail('nx_single', array('class' => 'img-fluid mb-4', 'alt' => get_the_title())) ?>
                        <p><?php the_content() ?></p>
                        <?php the_tags() ?>
                        <div class="comments">
                            <?php comments_template() ?>
                        </div>

                    </article>


                <?php endwhile; else: ?>
                <p><?php esc_html_e('Sorry, no post matched your criteria ', 'nx'); ?></p>
            <?php endif; ?>
        </div>
        <?php get_sidebar() ?>
    </div>

</div>

<?php get_footer(); ?>