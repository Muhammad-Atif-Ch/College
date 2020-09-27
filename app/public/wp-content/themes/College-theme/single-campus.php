<?php
get_header();

while (have_posts()) {
    the_post();

    pageBanner();
    ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campuses')?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> <span class="metabox__main"><?php the_title();?></span></p>
        </div>
        <div class="generic-content"><?php the_content();?></div>

        <?php
        //Professor Name code
        $relatedprofessor = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_id() . '"'
                )
            )
        ));
        if ($relatedprofessor->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">' . get_the_title() . ' Professor</h2>';
            echo '<ul class="professor-cards">';
            while ($relatedprofessor -> have_posts()) {
                $relatedprofessor -> the_post(); ?>
                <li class="professor-card__list-item">
                    <a class="professor-card" href="<?php the_permalink();?>">
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorlandscape');?>" alt="">
                        <span class="professor-card__name"><?php the_title();?></span>
                    </a>
                </li>
                <?php
            }
            echo '</ul>';
        }
        wp_reset_postdata();

        //Event date code
        $today = date('Ymd');
        $homepageevent = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_id() . '"'
                )
            )
        ));
        if ($homepageevent->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Upcomming ' . get_the_title() . ' Event</h2>';

            while ($homepageevent -> have_posts()) {
                $homepageevent -> the_post();
                get_template_part('template-event/content-event');
            }
        }
        ?>
    </div>
    <?php
}

get_footer();
?>

