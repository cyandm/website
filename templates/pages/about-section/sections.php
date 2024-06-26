<div class=" pre-clock">
     <div class="clock">

			</div>
</div>

<?php
$about = get_field('about_us_section');?>


<?php

// $about= $about["section_1"];
foreach ($about as $aboutus) {
     ?>
<section class="sections  swiper-slide  ">

    <div class="section-content ">
        <h1 class="h1"><?= $aboutus['title']; ?></h1>
        <p><?= $aboutus['text']; ?> </p>
             <?php get_template_part('/templates/components/scroll') ?>
 

    </div>
</section>
<?php } ?>