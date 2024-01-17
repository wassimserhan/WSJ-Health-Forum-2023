<?php if(get_row_layout()=='speakers_layout'): 
        $select = get_sub_field( 'select_layout');
        $select_background_color = get_sub_field ('select_background_color');
        $speakers = get_sub_field ( 'speakers' ); 
      $number_of_days = count( get_sub_field( 'speakers_multiday' ) );

        ?>
<section id="speakers" class="speakers <?php echo $select_background_color; ?>">

  <?php if ( have_rows('speaker_section') ): 
                while( have_rows('speaker_section') ): the_row();
              
                  $number_of_days = count( get_sub_field( 'speakers_multiday' ) );
                ?>

  <?php endwhile; endif; ?>

  <?php if ( have_rows('speaker_section') ): 
                while( have_rows('speaker_section') ): the_row();
                
                 $section_headline = get_sub_field( 'section_headline');  
                  $days = count( get_sub_field( 'speakers_multiday' ) );
             
                 $hide_partial_speakers = get_sub_field ( 'hide_partial_speakers');
                  
                ?>




  <?php if ( have_rows('speakers_multiday') ) : ?>





  <?php while( have_rows('speakers_multiday') ): the_row();?>


  <div class="speakers__multiday speaker-day-<?php echo get_row_index()  ?>" data-days="<?php echo $days?>">
    <h2 id="multi-speaker" class="speakers__headline">
      <?php echo $section_headline; ?></h2>
    <!-- Day Buttons -->
    <section class="btn-group">
      <?php
        $dayNumbers = [ONE, TWO, THREE];
      if($days != 1) {
        for ($i = 1; $i <= $days; $i++) { ?>

      <button onclick="showSpeakers(<?php echo $i ?>)"
        class="btn btn--primary btn--days <?php if( get_row_index() == $i) echo "btn--days--active" ?>">
        Day <?php echo $dayNumbers[$i-1] ?>
      </button>

      <?php }?>
      <?php }?>
    </section>

    <div class=" speakers__max-width">
      <div class="speakers__grid" data-count="9">


        <?php 

                            
                            $speakers_day = get_sub_field ( 'speaker_day' ); 
                             $s=0;
                            foreach ($speakers_day as $speaker_day):     
                             
                            $name = get_the_title($speaker_day, $speaker_day->ID);
                            $title = get_field('title', $speaker_day->ID);
                            $company = get_field('company', $speaker_day->ID);
                            $bio = get_field('bio',$speaker_day->ID );
                            $multiple_jobs = get_field('multiple_jobs', $speaker_day->ID);
                  
                            $img = get_field('image', $speaker_day->ID);
                            $image = $img['url'];
                            $speakerCount = count( $speakers_day );
                          
                        ?>

        <div class="card speakers__card <?php if ($s > 7 && $hide_partial_speakers) echo 'hidden'; ?>">
          <a href="#speakers/<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
            <figure onclick=" utag.link({'event_name': 'Speaker Bio' + '_' + '<?php echo $name ;?>' })"
              class="card__image <?php if( $image_shape == 'round') echo 'card__image--round'?>">
              <img class="modal__image lazyload <?php if( $image_shape == 'round') echo 'round-image'?>"
                data-src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
            </figure>
          </a>
          <div class="card__header">
            <div class="card__title modal__name">
              <?php echo $name; ?>
            </div>
            <div class="card__subtitle modal__title">
              <?php echo $title ; ?>
            </div>
            <div class="card__subtitle modal__company">
              <?php echo $company ; ?>
            </div>

            <div class="modal__bio" style="display: none;"><?php echo $bio ;?></div>

          </div>


        </div>


        <?php $s++;?>
        <?php endforeach; ?>



      </div>
    </div>
    <?php if($s > 7 && $hide_partial_speakers) : ?>
    <div class="bar-bg speakers__bar-view">
      <p>View All</p>
      <span class="button-down"></span>
    </div>
    <?php endif ?>

  </div>





  <?php endwhile; endif; ?>


  <?php endwhile; endif; ?>



</section>






<?php endif; ?>