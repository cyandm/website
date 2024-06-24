<?php /* Template Name: Contact */
get_header();
use RankMath\Frontend\Breadcrumbs;

$front_page_ID = get_option('page_on_front');

$contant_img = get_field('contact_us_img');
$social_media_group = array_filter(get_field('social_media_group', $front_page_ID));
$phone_num_1 = get_field('phone_num_1', $front_page_ID);
$phone_num_2 = get_field('phone_num_2', $front_page_ID);
$phone_num_3 = get_field('phone_num_3', $front_page_ID);
$address_text = get_field('address_text', $front_page_ID);
$address_html = get_field('address_map', $front_page_ID);
?>


<?php get_template_part('/templates/components/breadcrumb') ?>

<main class="contact container">
   <div class="contant-img">
  <div class="bubble">
        <div class=" bubble-orange">
            <span class="orange"></span>
        </div>
        <div class="  bubble-red">
            <span class="red"></span>
        </div>
        <div class=" bubble-blue">
            <span class="blue"></span>
        </div>
        <div class=" bubble-green">
            <span class="green"></span>
        </div>
        <div class=" bubble-pink">
            <span class="pink"></span>
        </div>
        <div class=" bubble-grey">
            <span class="grey"></span>
        </div>
    </div>
    			<?= wp_get_attachment_image(get_post_thumbnail_id(), 'full') ?>

 
   </div>
   <div class="contact-info">
      <div class="info">
        <div class="row"><p class="h2">شبکه های اجتماعی</p>
         <div class="social-media">
            <?php foreach ($social_media_group as $social_media): ?>
               <a href="<?= $social_media['link'] ?>">
                  
                  <?= wp_get_attachment_image($social_media['image']) ?>
               </a>
            <?php endforeach ?>
         </div>
      </div> 
      <div  class="row">
                <p class="h2">شماره تماس های ما</p>
         <div class="footer-phones">
            <a href="tel:<?= $phone_num_1 ?>">
               <?= $phone_num_1 ?>
            </a>
            <a href="tel:<?= $phone_num_1 ?>">
               <?= $phone_num_2 ?>
            </a>
            <a href="tel:<?= $phone_num_1 ?>">
               <?= $phone_num_3 ?>
            </a>
         </div>
      </div>
  <div class="row">
          <span class=" h2">
            نشانی ما </span>

         <p class="address-text">
            <?= $address_text ?>
         </p>

         <div class="address-map">
            <?= $address_html ?>
         </div>
  </div>

  


      </div>
   </div>
</main>

<?php get_footer(); ?>