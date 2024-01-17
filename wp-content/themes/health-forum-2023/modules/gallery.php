<?php if(get_row_layout()=='gallery_layout'):          
 $headline = get_sub_field( 'headline');
 $select_background_color = get_sub_field ('select_background_color');
?>


<section class="gallery <?php echo $select_background_color; ?>">
  <section class="gallery__wrapper">

    <?php if($headline):?>
    <h3 class="gallery__headline"><?php echo $headline ?></h3>
    <?php endif ?>
    <section class="gallery__images">

      <?php 

$images = get_sub_field('gallery');

if( $images ): ?>

      <?php foreach( $images as $image ): ?>

      <img class="gallery__image lazyload" src="<?php echo esc_url($image['url']); ?>"
        alt="<?php echo esc_attr($image['alt']); ?>" />



      <?php endforeach; ?>

      <?php endif; ?>
    </section>

  </section>


</section>



<?php endif ;?>