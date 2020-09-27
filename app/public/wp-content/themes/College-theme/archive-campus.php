<?php

get_header();

pageBanner(array(
    'title' => 'Campuses',
    'subtitle' => 'See our all Campuses for gain your knowledge'
));
?>

<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php
        while(have_posts()){
            the_post();?>
            <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
            <?php
        }
        echo paginate_links();
        ?>
    </ul>
</div>

<?php get_footer();?>



