<?php if(get_row_layout()=='hero_layout'): 
        $select = get_sub_field( 'select_layout');
        $select_background_color = get_sub_field ('select_background_color');

        $headline = get_sub_field( 'headline');
        $details = get_sub_field( 'details');
        $cta = get_sub_field( 'cta');
        $sold_out = get_sub_field( 'sold_out');
        $image = get_sub_field( 'image_right' )['sizes']['large'];
        $alt =  get_sub_field( 'image_right' )['alt'];
        $title = get_sub_field( 'image_right' )['title'];
        $sold_out = get_sub_field( 'sold_out');

        $stats = get_sub_field( 'stats');

        $travel_details_headline = get_sub_field('travel_details_headline');
        ?>

<!-- Layout Choices -->
<?php switch($select){

        case 'Headline Right' :
        $right=true;
        break;

        case 'Headline Right Centered':
        $center=true;        
        break;  

        case 'Stats':
        $stats=true;        
        break;  

        case 'Travel Details':
        $travel_details=true;        
        break; 

        };?>



<section id="hero" class="hero <?php echo $select_background_color; ?>">


  <?php if($select == "Headline Right") : ?>
  <section>
    <div class="hero__card">
      <figure class="hero__figure">
        <img loading="lazy" src="<?php echo  $image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
      </figure>
      <article class="hero__detail hero__detail--left" style="<?php echo get_sub_field('margin_top')?>">
        <h1 class="hero__headline hero__headline__line"><?php echo $headline ?></h1>

        <p class="hero__copy"><?php echo nl2br ($details) ?></p>

        <!-- CTA -->
        <?php if ($cta) {
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
        <button class="btn btn--primary btn--hero <?php if($sold_out): echo "btn--hero--soldout"; endif;?>">
          <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link" href="<?php echo $cta['url'] ?>"
            target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
        </button>
        <?php } ;?>
        <!-- CTA -->
      </article>
    </div>
  </section>
  <?php endif ;?>


  <?php if($select == "Headline Right Centered") : ?>
  <section class="hero--center">
    <div class="hero__card hero__card--center">
      <figure class="hero__figure hero__figure--partial">
        <img loading="lazy" src="<?php echo $image; ?>" alt="<?php echo $alt_center; ?>"
          title="<?php echo $title_center; ?>">
      </figure>
      <article class="hero__detail hero__detail--center" style="<?php echo get_sub_field('margin_top')?>">
        <h1 class="hero__headline"><?php echo $headline ?></h1>
        <p class="hero__copy"><?php echo nl2br ($details) ?></p>
        <!-- CTA -->
        <?php if ($cta) {
             $link_target = $cta['target'] ? $cta['target'] : '_self';?>
        <button class="btn btn--primary btn--hero">
          <a <?php echo get_sub_field('hero_utag')?> class="btn--hero__link btn--hero__link-center"
            href="<?php echo $cta['url'] ?>" target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
        </button>
        <?php } ;?>

        <!-- CTA -->
      </article>
    </div>
  </section>
  <?php endif ;?>

  <?php if($select == "Travel Details") : ?>
  <section>
    <div class="hero__card hero__card--travel">
      <figure class="hero__figure hero__figure--partial">
        <img loading="lazy" src="<?php echo  $image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
      </figure>
      <article class="hero__detail" style="<?php echo get_sub_field('margin_top')?>">
        <h1 class="hero__headline"><?php echo $headline ?></h1>
        <p class="hero__copy"><?php echo nl2br ($details) ?></p>

        <section>
        <?php
          if ($travel_details_headline) {
        ?>
          <p class="accordion__title"><?php echo $travel_details_headline; ?></p>
          <?php
          }
        ?>
          <?php if ( have_rows('travel_options') ): 
                while( have_rows('travel_options') ): the_row();
                $option_title = get_sub_field( 'option_title' );
                $option_directions = get_sub_field( 'option_directions' );
                ?>

          <article class="accordion">

            <div class="accordion-wrapper">
              <p class="accordion__intro">
                <?php echo $option_title ;?>
              </p>
              <div class="plus"></div>
            </div>
            <p class="accordion__content">
              <?php echo $option_directions ;?>
            </p>

          </article>
          <?php endwhile ;?>

          <?php endif ;?>
        </section>

      </article>
    </div>
  </section>
  <?php endif ;?>



  <?php if($select == "Stats") : ?>
  <section>
    <div class="hero__stats">
      <?php if( have_rows( 'stats') ) : 
            while ( have_rows( 'stats')) : the_row() ;?>
      <div class="hero__stats-item">
        <div class="hero__stats-item--number">
          <?php echo get_sub_field ('stat_number')?>
        </div>
        <div class="hero__stats-item--label">
          <?php echo get_sub_field ('stat_label')?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </section>
  <?php endif ;?>

</section>

<?php endif; ?>