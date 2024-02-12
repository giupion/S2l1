<div class="sidebar-area mt-5">
    <?php if ( ! dynamic_sidebar( 'shushi-cafeteria-sidebar' ) ) : ?>
      <h4 class="title"><?php esc_html_e('Search Here', 'shushi-cafeteria'); ?></h4>
        <form method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
            <input placeholder="<?php esc_attr_e('Type here...', 'shushi-cafeteria'); ?>" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
            <input type="submit" class="search-submit" value="<?php esc_attr_e('Search', 'shushi-cafeteria');?>" />
        </form>
        <aside id="categories-2" class="sidebar-widget widget_categories" role="complementary">
            <h4 class="title"><?php esc_html_e('Categories', 'shushi-cafeteria'); ?></h4>
            <ul>
                <?php
                    wp_list_categories(array(
                        'title_li' => '',
                    ));
                ?>
            </ul>
        </aside>
        <aside id="pages-2" class="sidebar-widget widget_pages" role="complementary">
            <h4 class="title"><?php esc_html_e('Pages', 'shushi-cafeteria'); ?></h4>
            <ul>
                <?php
                    wp_list_pages(array(
                        'title_li' => '',
                    ));
                ?>
            </ul>
        </aside>
        <aside id="archives-3" class="sidebar-widget widget_archive" role="complementary">
            <h4 class="title"><?php esc_html_e('Archives', 'shushi-cafeteria'); ?></h4>
            <ul>
                <?php
                    wp_get_archives(array(
                        'type' => 'postbypost',
                        'format' => 'html',
                        'before' => '<li>',
                        'after' => '</li>',
                    ));
                ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>