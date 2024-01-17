<?php 
  $select_background_color = get_sub_field ('select_background_color');
  $past_headline = get_sub_field('headline');
?>

<section class="past-events <?php echo $select_background_color; ?>">

  <section class="carousel-wrapper">

    <?php if ($past_headline): ?>
    <h2 class="carousel-wrapper__heading">
      <?php echo $past_headline; ?>
    </h2>
    <?php endif; ?>

    <div class="past-events__container display-flex flex-col-mobile">

      <?php 
      $event_carousels = get_sub_field('event_carousel');
      ?>
      <!-- Flickity HTML init -->
      <?php if ($event_carousels): ?>
      <div class="carousel carousel-past-events margin-center custom-col-12-lg custom-col-10-md custom-col-9-sm">

        <?php 
                    foreach($event_carousels as $event_carousel):
                        $image = $event_carousel['image']['url'];
                        $image_alt = $event_carousel['image']['alt'];
                        $image_caption = $event_carousel['custom_caption'];
                    ?>

        <div class="carousel-cell carousel-cell-single">
          <img class="carousel-cell-image" alt="<?php echo $image_alt; ?>"
            data-flickity-lazyload="<?php echo $image; ?>" />
            <?php if ($image_caption): ?>
            <div class="caption mobile-hide">
            <?php echo $image_caption; ?>
            </div>
            <?php endif; ?>
        </div>


        <?php endforeach;?>

      </div>
      <?php endif; ?>


    </div>


  </section>
</section>