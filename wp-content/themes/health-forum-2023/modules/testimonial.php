<?php 
  $headline = get_sub_field('headline');
  $select_background_color = get_sub_field ('select_background_color');
?>

<section class="testimonial <?php echo $select_background_color; ?>">

  <section class="carousel-wrapper">

    <?php if ($headline): ?>
    <h2 class="carousel-wrapper__heading">
      <?php echo $headline; ?>
    </h2>
    <?php endif; ?>

    <div class="testimonial__container">

      <?php 
                $event_carousels = get_sub_field('event_carousel');
                $single_testimonial = false;
                if  (count($event_carousels) < 2) {
                    $single_testimonial = true;
                }
            ?>
      <!-- Flickity HTML init -->
      <?php if ($event_carousels): ?>
        <div class="carousel carousel-testimonial custom-col-12-lg custom-col-12-md custom-col-12-sm <?php if ($single_testimonial==true) echo 'single-testimonial' ;?>">

                <?php 
                foreach($event_carousels as $event_carousel):

                    $testimonial = $event_carousel['testimonial'];
                    $speaker = $event_carousel['speaker'];
                    $speaker_sub_title = $event_carousel['speaker_sub_title'];

                ?>

                <div class="carousel-cell carousel-cell-single">

                    <div class="testimonial__container--wrapper">
                    <?php if ($testimonial):?>
                        <blockquote class="testimonial__container--paragraph">
                            <?php echo $testimonial; ?>
                        </blockquote>
                    <?php endif; ?>

                    <?php if ($speaker):?>
                        <p class="testimonial__container--title">
                            <?php echo $speaker; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($speaker_sub_title):?>
                        <p class="testimonial__container--sub-title">
                            <?php echo $speaker_sub_title; ?>
                        </p>
                    <?php endif; ?>
                    </div>

                </div>

                <?php endforeach;?>

        </div>

      <?php endif; ?>


    </div>


  </section>
</section>