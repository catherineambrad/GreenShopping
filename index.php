<?php
if ( is_page() ) {
    get_template_part( 'template-parts/content', 'page' );
} elseif ( !is_archive() &&  get_post_type() == "post" ) {
    get_template_part( 'template-parts/content', 'post' );
} elseif ( is_singular() ) {
    get_template_part( 'template-parts/content', 'single' );
} elseif ( is_author() ) {
    get_template_part( 'template-parts/content', 'author' );
} elseif ( is_archive() ) {
    get_template_part( 'template-parts/content', 'archive' );
} elseif ( is_404() ) {
    get_template_part( 'template-parts/content', '404' );
}
