<?php
/*
 * HOME-PAGE OR TAGS PAGE:
 * Display grid of featured images.
 * Image links to the full post.
 * Different grid-class is added depending on value of bsp_grid_style variable.
 */
if (is_home() || is_archive()) : ?>
    <a class="thumbs-grid" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <article id="post-<?php the_ID(); ?>" <?php
                                              switch (get_option('bsp_grid_style')) {
                                                  case 'spaced-grid':
                                                      post_class('grid-spaced');
                                                      break;
                                                  case 'horizontal-flow':
                                                      post_class('grid-horizontal-flow');
                                                      break;
                                                  case 'horizontal-flow-resize':
                                                  default:
                                                      post_class("grid-horizontal-flow-resize");
                                                      break;
                                              }
                                              ?>>
            <?php
            // insert featured image - or display error message!
            if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
            <?php else: ?>
                <b style="color: red">NO FEATURED IMAGE!</b>
            <?php endif; ?>
        </article><!-- gallery-preview -->
    </a><!-- link to post -->



<?php
/*
 * SEARCH RESULTS PAGE:
 * Show featured image with text excerpt alongside.
 */
elseif (is_search()) : ?>

    <table>
        <tr>
            <td>
                
                <div id="post-<?php the_ID(); ?>" <?php post_class("search-results, clearfix") ?>>
                    <a class="search-results" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <span id="post-<?php the_ID(); ?>" <?php post_class("search-results-image") ?>>
                            <?php
                            // INSERT FEATURED IMAGE (IF THERE IS ONE)
                            if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else: ?>
                                <b style="color: red">NO FEATURED IMAGE!</b>
                            <?php endif; ?>

                            <p><?php the_title('<h2>', '</h2>') ?></p>
                            
        </article><!-- gallery-preview -->
    </a><!-- link to post -->

    <?php the_excerpt() ?>

                </div>

            </td>
        </tr>
    </table>

    

<?php
/*
 * SINGLE-POST OR PAGE:
 * Display whole content in standard full-width layout.
 * Show pagination for Posts but not Pages.
 */
else : ?>

    <?php // Page content - same for Post and Page. ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("single-page-content"); ?>>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>
        <div class="entry-content">
            <?php
            the_content();
            if (get_option('bsp_show_tags')) { the_tags(); }
            ?>
        </div> <!-- entry-content -->
    </article>

<?php endif; ?>
