<?php get_header(); ?>

<div class="main-content">

    <!-- Slider
    ------------------ -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <?php
            $nx_counter = 0;
            // The Query
            $nx_query1 = new WP_Query('category_name=in-evidenza&posts_per_page=3');

            // The Loop
            while ($nx_query1->have_posts()) {
                $nx_query1->the_post(); ?>
                <?php $nx_counter++ ?>
                <?php $nx_image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'nx_big');

                ?>
                <div class="carousel-item <?php if ($nx_counter == 1) {
                    echo 'active';
                } ?>"
                    style="background: linear-gradient(rgba(0,0,0, 0.3), rgba(0,0,0, 0.7)), url(<?php echo $nx_image_attributes[0]; ?>); background-size: cover; background-position: center center">
                    <div class="carousel-caption">
                        <h3 class="display-3"><?php the_title() ?></h3>
                        <p><?php the_time('j M Y') ?> - <?php the_category(', ') ?></p>
                        <div class="lead d-none d-lg-block"><?php the_excerpt() ?></div>
                    </div>
                </div>

            <?php }

            wp_reset_postdata(); ?>

        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <!-- Two columns section
    ------------------ -->
    <?php

    // The Query
    $nx_query1 = new WP_Query(array('page_id' => 31));

    // The Loop
    while ($nx_query1->have_posts()) {
        $nx_query1->the_post(); ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-6">
                    <blockquote class="blockquote">
                        <p class="mr-5 h2"><?php the_title() ?></p>
                        <footer class="blockquote-footer"><?php esc_html_e('Author: ', 'nx') ?><cite
                                title="Source Title"><?php the_author() ?></cite>
                        </footer>
                    </blockquote>
                </div>
                <div class="col-sm-6">
                    <p><?php the_excerpt() ?></p>
                </div>
            </div>
        </div>




    <?php }

    wp_reset_postdata(); ?>


    <!-- Card
    ---------------------------------- -->

    <div class="container">
        <div class="card-deck mt-5">
            
            <?php
            // The Query
            $nx_query1 = new WP_Query('category_name=focus&posts_per_page=3');
            // The loop
            while ($nx_query1->have_posts()) {
                $nx_query1->the_post(); ?>

                <div class="card">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('nx_single', array('class' => 'img-fluid mb-2 card-img-top', 'alt' => get_the_title())) ?></a>
                    <div class="card-body">
                        <h4 class="card-title"><?php the_title() ?></h4>
                        <div class="card-text"> <?php the_excerpt() ?></div>
                        <p class="card-text"><small class="text-muted"><?php the_time('j M Y') ?> -
                                <?php the_category(', ') ?></small></p>
                    </div>
                </div>
            <?php }
            wp_reset_postdata(); ?>
        </div>
    </div>


</div>
</div>

<?php get_footer(); ?>