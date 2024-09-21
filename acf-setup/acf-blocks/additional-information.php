<?php
?>

<section class="additional-information">
    <div class="container">
        <ul class="additional-information--list grid gap-10 grid-cols-2">
            <?php while (have_rows('list')) : the_row();
            
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $link = get_sub_field('link');
                $image = get_sub_field('image');
                ?>
                <li class="additional-information--item flex justify-between items-center">
                    <?php if (!empty($image)) : ?>
                        <img class="additional-information--list-img" src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                    <div class="additional-information--item-wrap text-right flex flex-col items-end pr-8">
                        <?php if (!empty($title)) : ?>
                            <h2 class="additional-information--title font-black text-lg text-dark-grey uppercase "><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($description)) : ?>
                            <p class="additional-information--description text-dark-grey text-sm mt-2"><?php echo $description; ?></p>
                        <?php endif; ?>
                        <?php if (!empty($link['url']) && !empty($link['title'])) : ?>
                            <a class="additional-information--button btn block mt-8 font-bold text-white text-base py-2.5 flex gap-2 items-center	px-7  bg-[#46A358] rounded-md"
                               href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?><svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M12.8125 5.79395L1.5625 5.79395" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.27344 1.27575C8.27344 1.27575 12.8109 3.7215 12.8109 5.793C12.8109 7.866 8.27344 10.3125 8.27344 10.3125" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
