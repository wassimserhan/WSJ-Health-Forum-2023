<?php 
$headline = get_sub_field('headline');
$select_background_color = get_sub_field ('select_background_color');
?>

<section class="gallery-slides <?php echo $select_background_color; ?>">

  <section class="carousel-wrapper">

    <?php if ($headline): ?>
    <h2 class="carousel-wrapper__heading">
      <?php echo $headline; ?>
    </h2>
    <?php endif; ?>

    <div class="gallery-slides__container">

      <?php 
          $slides = get_sub_field('slides');
      ?>
      <!-- Flickity HTML init -->
      <?php if ($slides): ?>
        <div class="carousel carousel-gallery-slides custom-col-12-lg custom-col-10-md custom-col-9-sm">

                <?php 

                  for ($i = 0; $i < count($slides); $i+=2) {

                    if ($i+1 < count($slides)) {

                ?>

                <div class="carousel-cell carousel-cell-gallery">
                  <section class="gallery-slides__container__wrapper">
                      <figure class="gallery-slides__container__wrapper__fig">
                        <img class="gallery-slides__container__wrapper__fig--image carousel-cell-image lazyload" alt=""
                        data-flickity-lazyload="<?php echo $slides[$i]['image']['url']; ?>" />
                      </figure>
                      <figure class="gallery-slides__container__wrapper__fig">
                        <img class="gallery-slides__container__wrapper__fig--image carousel-cell-image lazyload" alt=""
                        data-flickity-lazyload="<?php echo $slides[$i+1]['image']['url']; ?>" />
                      </figure>
                  </section>
                </div>

                <?php
                    } else {
                ;?>

                <div class="carousel-cell carousel-cell-gallery">
                  <section class="gallery-slides__container__wrapper">
                    <figure class="gallery-slides__container__wrapper__fig">
                      <img class="gallery-slides__container__wrapper__fig--image carousel-cell-image lazyload" alt=""
                      data-flickity-lazyload="<?php echo $slides[$i]['image']['url']; ?>" />
                    </figure>
                  </section>
                </div>
                <?php
                    } 
                }
                ;?>

        </div>

      <?php endif; ?>


    </div>


  </section>
</section>