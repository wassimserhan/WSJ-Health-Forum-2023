      <?php if(get_row_layout()=='text-image_layout'): 
        $headline = get_sub_field( 'headline');
        $details = get_sub_field( 'details');
        $cta = get_sub_field( 'cta');
        $image = get_sub_field( 'image' )['sizes']['large'];
        $alt =  get_sub_field( 'image' )['alt'];
        $title = get_sub_field( 'image' )['title'];
        $select_background_color = get_sub_field ('select_background_color');
        ?>


      <section class="text-image <?php echo $select_background_color; ?>">
        <div class="text-image__card">
          <figure class="text-image__figure">
            <img loading="lazy" src="<?php echo  $image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
          </figure>
          <article class="text-image__detail">
            <h1 class="text-image__headline"><?php echo $headline ?></h1>
            <hr class="text-image__line">
            <p class="text-image__copy"><?php echo nl2br ($details) ?></p>

            <!-- CTA -->
            <?php if ($cta) {
            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <button class="btn btn--primary btn--hero">
              <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link" href="<?php echo $cta['url'] ?>"
                target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
            </button>
            <?php } ;?>
            <!-- CTA -->
          </article>
        </div>
      </section>
      <?php endif; ?>