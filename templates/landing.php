<?
get_template_part('assets/icons/hotdesk');

?>
<div id="land_page" class="">
    <main class="max-w-[1000px] p-8 rounded-3xl container">
        <div class="thumbnail bg-black-2 rounded-3xl p-8 pb-16">
            <div class="mb-8 flex justify-center">
                <!-- <article class="prose lg:prose-xl">{{ markdown }}</article> -->
                <?= the_post_thumbnail('full', ['class' => '']); ?>
            </div>
            <?php the_content(); ?>
        </div>
    </main>
    <?php get_template_part('templates/single/comment') ?>
</div>

<?php get_template_part('templates/single/sideBarComment') ?>