<?php

get_header();

pageBanner(array(
     'title' => 'Events',
    'subtitle' => 'See what is going on in our world.'
));
?>

<div class="container container--narrow page-section">
    <?php
    while(have_posts()){
        the_post();

        get_template_part('template-event/content-event');
    }
    echo paginate_links();
    ?>
    <hr class="section-break">
    <div>
        <p>Loocking for a recap of past event? <a href="<?php echo site_url('/past-events');?>"> Check out our past events archive</a> .</p>
    </div>
</div>

<?php get_footer();?>

