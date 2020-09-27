<?php

get_header();
pageBanner(array(
   'title' => 'Past Event',
   'subtitle' => 'See our past Events'
));
?>

<div class="container container--narrow page-section">
    <?php
    $today = date('Ymd');
    $pastevent = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));

    while($pastevent->have_posts()){
        $pastevent->the_post();
        get_template_part('template-event/content-event');
    }
    echo paginate_links(array(
        'total' => $pastevent->max_num_pages
    ));
    ?>
</div>

<?php get_footer();?>

