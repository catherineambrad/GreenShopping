<section class="hero">
    <div class="container">
        <div class="swiper hero-slide hero-slide-js">
            <div class="swiper-wrapper">
                <?php while (have_rows('list')) : the_row();
                    $subtitle = get_sub_field('subtitle');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image');
                    ?>
                    <div class="swiper-slide hero-slide-item  gap-20 pl-10 pt-2">
                        <div class="hero-slide-item--wrapp text-left">
                            <?php if (!empty($title)) : ?>
                                <p class="hero-slide-item--subtitle text-dark-grey font-bold text-sm uppercase"><?php echo $subtitle; ?></p>
                            <?php endif; ?>
                            <?php if (!empty($title)) : ?>
                                <h2 class="hero-slide-item--title font-black text-dark-grey uppercase mt-2"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($description)) : ?>
                                <p class="hero-slide-item--description text-dark-grey text-sm mt-4"><?php echo $description; ?></p>
                            <?php endif; ?>
                            <?php if (!empty($link['url']) && !empty($link['title'])) : ?>
                                <a class="hero-slide-item--button btn block mt-8 font-bold text-white text-base py-2.5	px-7  bg-[#46A358] rounded-md"
                                   href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($image)) : ?>
                            <img class="hero-slide-item--img" src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

