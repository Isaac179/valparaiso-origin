<?php get_header(); ?>
    <?php
        $next_posts_link = get_next_posts_link();
        $next_posts_link = explode('href="', $next_posts_link );
        if(isset($next_posts_link[1])):
            $next_posts_link = explode('"', $next_posts_link[1] );
            $next_posts_link = $next_posts_link[0];
        ?>
            <a href="<?php echo $next_posts_link; ?>" replace-state="true" class="next-posts-JS next-posts">Cargar más posts</a>

        <?php
        endif;
        ?>
        
<?php get_footer(); ?>