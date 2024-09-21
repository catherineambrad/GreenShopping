<?php
/*
Template Name: All Posts
*/

get_header(); ?>

<section class="all-posts">
    <div class="container">
        <h1 class="last-posts-title text-dark-grey font-bold text-center mb-4 mt-8">Our Blog Posts</h1>
        <p class="last-posts-text text-grey text-center mb-6">We are an online plant shop offering a wide range of cheap
            and trendy plants. </p>
        <ul class="all-posts-list grid gap-11 grid-cols-4">
            <?php
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC'
            );

            if (!function_exists('get_reading_time')) {
                function get_reading_time()
                {
                    $content = get_post_field('post_content', get_the_ID());
                    $word_count = str_word_count(strip_tags($content));
                    $reading_time = ceil($word_count / 200);
                    return $reading_time;
                }
            }
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="last-posts-list--item">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <div class="last-posts-list--item-wrap-inf py-2 px-4 ">
                            <div class="last-posts-list--item-wrap flex gap-0.5 font-medium flex-wrap">
                                <p><?php echo get_the_date(); ?></p> | <p><?php echo get_reading_time(); ?> minute read
                                    time</p>
                            </div>
                            <h3 class="last-posts-list--item-title text-xl font-semibold text-dark-grey my-1"><?php the_title(); ?></h3>
                            <div class="last-posts-list--item-descr text-grey "><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>"
                               class="last-posts-list--item-link font-medium mt-2 flex items-center gap-1.5">Read More
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.66797 7.81714C2.66797 7.56401 2.85607 7.35481 3.10012 7.3217L3.16797 7.31714L13.168 7.31714C13.4441 7.31714 13.668 7.541 13.668 7.81714C13.668 8.07027 13.4799 8.27947 13.2358 8.31257L13.168 8.31714H3.16797C2.89183 8.31714 2.66797 8.09328 2.66797 7.81714Z"
                                          fill="#3D3D3D"/>
                                    <path d="M8.78393 4.15514C8.58825 3.9603 8.58756 3.64372 8.7824 3.44804C8.95953 3.27014 9.23727 3.25341 9.43333 3.39822L9.48951 3.44652L13.5228 7.46252C13.7013 7.64017 13.7175 7.91891 13.5715 8.11496L13.5229 8.17111L9.48954 12.1878C9.29387 12.3826 8.97729 12.382 8.78243 12.1863C8.60529 12.0084 8.58973 11.7306 8.73537 11.5352L8.7839 11.4792L12.4613 7.81663L8.78393 4.15514Z"
                                          fill="#3D3D3D"/>
                                </svg>
                            </a>
                        </div>
                    </li>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>
