<?php
get_header();

while (have_posts()) {
    the_post();

    pageBanner(array(
       'subtitle' =>  'Learn how the school of your dreams got started.'
    ));
    ?>

    <div class="container container--narrow page-section">
        <?php
        # get_the_id ();                 this function show you current page id.
        # wp_get_post_parent_id ()       this function parent page id show you.
        $page_id = wp_get_post_parent_id(get_the_id());
        if ($page_id) {?>
            <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($page_id); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($page_id);?></a> <span class="metabox__main"><?php the_title ();
            ?></span></p>
            </div>
       <?php } ?>

        <?php
        $main_page = get_pages(array(
                'child_of' => get_the_ID()
        ));
        if ($page_id || $main_page) { ?>
        <div class="page-links">
            <h2 class="page-links__title"><a href="<?php echo get_permalink($page_id); ?>"><?php echo get_the_title($page_id); ?></a></h2>
            <ul class="min-list">
                <?php
                if ($page_id) {
                    $find_child_page = $page_id;
                } else {
                    $find_child_page = get_the_id();
                }
                wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $find_child_page,
                        'sort_column' => 'menu_order'
                ));
                ?>
            </ul>
        </div>
        <?php } ?>

        <div class="generic-content">
            <?php the_content();?>
        </div>

    </div>

<?php } ?>

<?php get_footer(); ?>
