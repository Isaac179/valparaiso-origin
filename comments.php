<?php

    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { ?>
        This post is password protected. Enter the password to view comments.
    <?php
        return;
    }
?>

<div class="fondboxcoment">
    <div class="row ">
       
            <?php if ( have_comments() ) : ?>


                <div class="navigation">
                    <div class="next-posts"><?php previous_comments_link() ?></div>
                    <div class="prev-posts"><?php next_comments_link() ?></div>
                </div>

                <ol class="comentarios">
                    <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
                </ol>

                <div class="navigation">
                    <div class="next-posts"><?php previous_comments_link() ?></div>
                    <div class="prev-posts"><?php next_comments_link() ?></div>
                </div>

             <?php else : // this is displayed if there are no comments so far ?>

                <?php if ( comments_open() ) : ?>
                    <!-- If comments are open, but there are no comments. -->

                 <?php else : // comments are closed ?>
                    <p>Comments are closed.</p>

                <?php endif; ?>

            <?php endif; ?>
        </div>
  

</div>

<?php if ( comments_open() ) : ?>

<div class="row " id="comentarios">
    
        <div class="cancel-comment-reply">
            <?php cancel_comment_reply_link(); ?>
        </div>

        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p>Debes de <a href="<?php echo wp_login_url( get_permalink() ); ?>">Iniciar Seción</a> para dejar un comentario</p>
        <?php else : ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

            <?php if ( is_user_logged_in() ) : ?>

                <p>Sesión iniciada como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Cierre Sesión »</a></p>

            <?php else : ?>
            
                
            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" placeholder="Nombre" <?php if ($req) echo "aria-required='true'"; ?> />
               
            
         
                    <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" placeholder="E-mail" <?php if ($req) echo "aria-required='true'"; ?> />
          
            <?php endif; ?>

           
                 <input type="text" name="comment" id="comment" value="" size="22" tabindex="3" placeholder="Escribe un comentario..."  />

               
           

           
                    <input name="submit" type="submit" id="submit" tabindex="5" value="&#8627;Comenta" class="Send"/>
                    <?php comment_id_fields(); ?>
           

            <?php do_action('comment_form', $post->ID); ?>

        </form>

        <?php endif; // If registration required and not logged in ?>
    
</div>

<?php endif; ?>