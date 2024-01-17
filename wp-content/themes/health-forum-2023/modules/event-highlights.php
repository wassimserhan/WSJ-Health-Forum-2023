<?php 
    $select_background_color = get_sub_field ('select_background_color');
    $past_headline = get_sub_field('headline');
?>

<section class="event-highlights <?php echo $select_background_color; ?>">

  <section class="carousel-wrapper">

    <?php if ($past_headline): ?>
    <h2 class="carousel-wrapper__heading">
      <?php echo $past_headline; ?>
    </h2>
    <?php endif; ?>

    <div class="event-highlights__container">

      <?php 
                $event_carousels = get_sub_field('event_carousel');
                
            ?>
      <!-- Flickity HTML init -->
      <?php if ($event_carousels): ?>
        <div class="carousel carousel-event-highlights carousel-main custom-col-11-md custom-col-12-md-lg custom-col-12-lg custom-col-9-sm">

                <?php 
                foreach($event_carousels as $event_carousel):

                    $select_option = $event_carousel['select_option'];
                    $video_url = $event_carousel['video_url'];
                    $image = $event_carousel['image']['url'];
                    $image_alt = $event_carousel['image']['alt'];
                    $custom_caption = $event_carousel['custom_caption'];
                ?>

                <div class="carousel-cell carousel-cell-single">
                    <!-- <div class="black-bg-sides"></div> -->

                    <?php if ($select_option=='image'):?>
                        <img class="carousel-cell-image" alt="<?php echo $image_alt; ?>"
                        data-flickity-lazyload="<?php echo $image; ?>" />
                    <?php endif; ?>
                    <?php if ($select_option=='video'):?>
                        <div
                            class="carousel-cell__video"
                            >
                                <!-- <iframe
                                    title="vimeo-player"
                                    src="<?php 
                                    // echo $video_url; 
                                    ?>"
                                    frameborder="0"
                                    width="100%"
                                    height="auto"
                                    allow="autoplay; fullscreen"
                                    allowfullscreen=""
                                    mozallowfullscreen=""
                                    webkitallowfullscreen=""
                                ></iframe> -->

                                <video controls preload="metadata" poster="">
                                    <source src="<?php echo $video_url; ?>" type="video/mp4" />
                                </video>
                            </div>
                    <?php endif; ?>
                    <?php if ($custom_caption): ?>
                    <div class="caption mobile-hide">
                    <?php echo $custom_caption; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <?php endforeach;?>

        </div>

        <div class="carousel carousel-event-highlights carousel-nav custom-col-11-md custom-col-12-md-lg custom-col-12-lg custom-col-9-sm">

            <?php 
            foreach($event_carousels as $event_carousel):
                $select_option = $event_carousel['select_option'];
                $video_cover_image = $event_carousel['video_cover_image']['url'];
                $video_cover_image_alt = $event_carousel['video_cover_image']['alt'];
                $image = $event_carousel['image']['url'];
                $image_alt = $event_carousel['image']['alt'];
            ?>

            <div class="carousel-cell carousel-cell-single">

                <?php if ($select_option=='image'):?>
                    <img class="carousel-cell-image" alt="<?php echo $image_alt; ?>"
                    src="<?php echo $image; ?>" />
                <?php endif; ?>
                <?php if ($select_option=='video'):?>
                    <img class="carousel-cell-image" alt="<?php echo $video_cover_image_alt; ?>"
                    src="<?php echo $video_cover_image; ?>" />
                <?php endif; ?>
            </div>

            <?php endforeach;?>

        </div>
      <?php endif; ?>


    </div>


  </section>
</section>