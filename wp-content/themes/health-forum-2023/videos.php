<?php /* Template Name: Videos */?>


<?php get_header(); ?>
<main class="main-container">


  <div class="videos__border"></div>



  <section id="videos" class="videos">
    <div class="max-width">

      <?php 
                if( have_rows('videos_section') ):
                    while ( have_rows('videos_section') ) : the_row(); ?>


      <h2 class="videos__title"><?php echo get_sub_field('title')?></h2>
      <div class="videos__line"></div>



      <?php 
                if( have_rows('videos') ):
                    while ( have_rows('videos') ) : the_row();

                    $videoLink = get_sub_field('video_link');
                    $title = get_sub_field('video_title');
                    $copy = get_sub_field('video_copy');
                    $speakers = get_sub_field( 'speakers' );
                    $interviewTitle = get_sub_field('interview_title');
                    $interviewers = get_sub_field('interviewer');

                ?>


      <div class="videos__module">
        <div class="videos__items">
          <div class="videos__item-video videos__resp-container ">

            <iframe class="videos__resp-iframe" allowfullscreen="true" webkitallowfullscreen="true"
              mozallowfullscreen="true" frameborder="0" scrolling="no" src="<?php echo $videoLink ?>"></iframe>

          </div>
          <div class="videos__item-details">
            <h2 class="videos__video-title"><?php echo $title ?></h2>
            <div class="videos__video-copy"><?php echo $copy ?></div>

            <?php if ( $speakers ) : ?>
            <?php foreach ($speakers as $speaker): 
              $name = get_the_title($speaker, $speaker->ID);
              $title = get_field('title', $speaker->ID);
              $company = get_field('company', $speaker->ID);
              
              ?>
            <div class="videos__speaker-wrapper">

              <div class="videos__speaker-name">
                <?php echo $name; ?>
              </div>
              <d, class="videos__speaker-title">
                <?php echo $title; ?>, <?php echo  $company; ?>
            </div>


            <?php endforeach ;?>
            <?php endif;?>

            <br>
            <?php if ( $interviewers ) : ?>

            <div class="videos__speakers-title"><?php echo $interviewTitle ?></div>
            <?php foreach ($interviewers as $interviewer): 
              $name = get_the_title($interviewer);
               $title = get_field('title', $interviewer->ID);
                $company = get_field('company', $interviewer->ID);
              ?>
            <div class="event__speaker-name">
              <?php echo $name; ?>
            </div>
            <span class="event__speaker-title">
              <?php echo $title; ?></span>, <span class="event__speaker-company"> <?php echo  $company; ?> </span>
            <?php endforeach ;?>
            <?php endif;?>

          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>

      <?php endwhile; ?>
      <?php endif; ?>



  </section>



</main>



<?php get_footer(); ?>