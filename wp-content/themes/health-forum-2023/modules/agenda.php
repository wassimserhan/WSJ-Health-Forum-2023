<?php if(get_row_layout()=='agenda_layout'):   
$select_background_color = get_sub_field ('select_background_color');       
$agenda = get_sub_field( 'agenda_days');
$agenda_items = get_sub_field ( 'agenda_items' );
$section_id = get_sub_field ( 'section_id' );
$hide_bar = get_sub_field ( 'hidden');
$hide_partial_agenda = get_sub_field ( 'hide_partial_agenda');
$timezone_str = get_sub_field ( 'select_agenda_timezone');
$siteTitle = get_bloginfo('name ');
?>




<section id="program" class="agenda <?php echo $select_background_color; ?>">
  <!-- <?php if(count( $agenda ) > 1):?>
  <div class="agenda__arrow-buttons">
    <div class="agenda__arrow-left" onclick="showPrevAgenda();">
    </div>
    <div class="agenda__arrow-right" onclick="showNextAgenda();"></div>
    <div class="prev-agenda-day" onclick="showPrevAgenda();">Day 1</div>
    <div class="next-agenda-day" onclick="showNextAgenda();">Day 2</div>

  </div>
  <?php endif; ?> -->

  <?php $a = 1; foreach ($agenda as $post): ?>
  <?php setup_postdata($post);?>
  <?php 
    $timestamp = get_field( 'agenda_date' ); 
    if ($timestamp && $timezone_str) {
      $current_date = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
      $current_date->setTimeZone(new DateTimeZone($timezone_str));
      $currentDate = $current_date->format('Y-m-d');
      $currentDateTimeZone = strtotime($currentDate);
      $currentTimeZone = $current_date->format('H:i:s');

      $agenda_date_timestamp = strtotime($timestamp);

      $datediff = $agenda_date_timestamp - $currentDateTimeZone;
      $difference = floor($datediff/(60*60*24));
      $isEventDay = false; 
      $isFutureEvent = false;
      if ($difference==0) {
        $isEventDay = true; 
      }
      if ($difference>0 ) {
        $isFutureEvent = true; 
      }
    }

  ?>

  <?php 
$days = count( $agenda )
  ?>

  <div id="day-<?php echo $a; ?>" class="agenda__multiday" data-days="<?php echo $days ?>">
    <div class="agenda__details">

      <h2 class="agenda__date">
        Program
      </h2>
      <h3 class="agenda__intro">
        <?php echo the_field('agenda_title'); ?>
      </h3>
      <h3 class="agenda__intro">
        <?php echo the_field('agenda_headline'); ?>
      </h3>

      <!-- Day Buttons -->

      <?php
        $dayNumbers = [ONE, TWO, THREE];
      if($days != 1) {
        for ($i = 0; $i < $days; $i++) { ?>
      <button onclick="showAgenda(<?php echo $i ?>)"
        class="btn btn--primary btn--days <?php if(($i+1) == $a) echo "btn--days--active" ?>">
        Day <?php echo $dayNumbers[$i] ?>
      </button>
      <?php }?>
      <?php }?>


    </div>




    <?php if ( have_rows('agenda_items') ): 
       $z=0;
      while( have_rows('agenda_items') ): the_row();
        $hide_add_to_calendar = get_sub_field('hide_add_to_calendar');
        $time = get_sub_field( 'time' );
        $start_time = get_sub_field( 'start_time' );
        $end_time = get_sub_field( 'end_time' );
        $topic = get_sub_field( 'topic' );
        $sponsored = get_sub_field('sponsored');
        $sponsored_banner = get_sub_field('sponsored_banner');
        $detail = get_sub_field( 'detail' );
        $agenda_speakers = get_sub_field( 'speakers');
        $agenda_moderators = get_sub_field( 'moderators' );
        $agenda_sponsors = get_sub_field( 'sponsors' );
        $isCalendarPastTime = false;
        $live_time = false;
        $start_time_military = date("H:i:s", strtotime($start_time));
        $end_time_military = date("H:i:s", strtotime($end_time));

        if ($timestamp && $timezone_str) {
          if (($start_time_military <= $currentTimeZone) && ($end_time_military >= $currentTimeZone) && ($isEventDay)) {
            $live_time = true;
          }

          if ((($start_time_military >= $currentTimeZone) && $isEventDay) OR ($isFutureEvent)) {
            $isCalendarPastTime = true;
          }
          
          $event_datetime_start = new DateTime($timestamp . 'T' . $start_time_military, new DateTimeZone($timezone_str));
          $event_datetime_start->setTimezone(new DateTimeZone(date_default_timezone_get()));
          $iso_date_start = $event_datetime_start->format('Ymd\THis') . 'Z';


          $event_datetime_end = new DateTime($timestamp . 'T' . $end_time_military, new DateTimeZone($timezone_str));
          $event_datetime_end->setTimezone(new DateTimeZone(date_default_timezone_get()));
          $iso_date_end = $event_datetime_end->format('Ymd\THis') . 'Z';

          $topic_url = strip_tags($topic);
            if ($detail) {
              $detail_url = strip_tags($detail);
          } else {
            $detail_url = $siteTitle;
          }
          $apple_calendar = 'data:text/plain;charset=utf-8,BEGIN:VCALENDAR%0AVERSION:2.0%0APRODID:-//LearnPHP.co//NONSGML ' . $siteTitle . '//EN%0AMETHOD:REQUEST%0ABEGIN:VEVENT%0ADTSTART:' . $iso_date_start . '%0ADTEND:' . $iso_date_end . '%0ASUMMARY:' . $topic_url . '%0ADESCRIPTION:' . $detail_url . '%0AEND:VEVENT%0AEND:VCALENDAR';
          $google_calendar = 'https://calendar.google.com/calendar/u/0/r/eventedit?text=' . $siteTitle . '%20' . $topic_url . '&dates=' . $iso_date_start . '/' . $iso_date_end . '&details=' . $detail_url;
          $yahoo_calendar = 'https://calendar.yahoo.com/?v=60&view=d&type=20&title=' . $siteTitle . '%20' . $topic_url . '&st=' . $iso_date_start . '&et' . $iso_date_end . '&desc=' . $detail_url;
        }
        ?>
    <div
      class="event <?php if($sponsored) echo 'event__supporters-mobile';?> <?php if ($z > 4 && $hide_partial_agenda) echo 'hidden'; ?>">


      <div class="event__info-block">
        <?php if($time) {;?>
        <div class="event__time ">
          <?php if ($live_time) { ?>
          <div class="event__time--live">LIVE</div>
          <?php } ?>
          <div class="event__time--box">
            <?php echo $time; ?>
          </div>
        </div>
        <?php } else {; ?>
        <div class="event__time event__time--empty">
          &nbsp
        </div>
        <?php }; ?>
        <?php if($topic) {;?>

        <div class="event__title--wrapper <?php if($sponsored) echo 'event__supporters-title';?>">
          <div class="event__title">

            <div class="event__title--text">
              <h3 class="event__title--text__h3 <?php if ($z > 0) echo 'collapsed'; ?>">
                <?php echo $topic ?>
              </h3>
            </div>
            <?php 
            if ($start_time && $isCalendarPastTime && ($hide_add_to_calendar == false)) { 
              ;?>
            <div class="calendar calendar-wrapper">
              <div class="calendar__title">
                <div class="calendar__title--icon">
                </div>
                <div class="calendar__title--text">
                  ADD TO CALENDAR
                </div>
              </div>
              <div class="calendar__body always-hide">
                <div class="calendar__body__list">
                  <a href='<?php echo $google_calendar; ?>' target='_blank' class='calendar__body__list--item'>
                    google
                  </a>
                  <a href='<?php echo $yahoo_calendar; ?>' target='_blank' class='calendar__body__list--item'>
                    yahoo
                  </a>
                  <a download="test-date.ics" href='<?php echo $apple_calendar; ?>' class='calendar__body__list--item'>
                    outlook
                  </a>
                  <a download="test-date.ics" href='<?php echo $apple_calendar; ?>' class='calendar__body__list--item'>
                    apple
                  </a>

                </div>
              </div>

            </div>
            <?php
            } 
            ;?>


          </div>

          <?php 
         
         if($detail OR $agenda_speakers OR $agenda_moderators OR $agenda_sponsors) {?>
          <div class="event__detail-block <?php if ($z > 0) echo 'hide-me'; ?>"
            style="<?php if ($z == 0) echo 'max-height:100%;'; ?>">

            <div class="event__detail  <?php if($sponsored) echo 'event__supporters-detail'; ?>">

              <div class="<?php if($sponsored) echo 'event__supporters__col'; ?>">
                <div class="event__wrapper">

                  <?php if(get_sub_field( 'detail' )) {;?>
                  <div class="event__description">
                    <?php echo get_sub_field( 'detail' ) ?>
                  </div>
                  <?php }; ?>
                  <!-- Speakers -->
                  <?php if($sponsored) {; ?>
                  <?php if($agenda_speakers) {; ?>
                  <div class="event__participants">
                    <?php if(get_sub_field ( 'speakers_section' )) :?>
                    <div class="event__speakers-title">
                      <?php echo get_sub_field ( 'speakers_section' ); ?>
                    </div>
                    <?php endif ;?>
                    <div class="event__speakers <?php if ($sponsored) echo 'event__speakers-block';?>">
                      <?php foreach ($agenda_speakers as $agenda_speaker) : 
                                        $name = get_the_title($agenda_speaker);
                                      
                                      ?>
                      <div class="event__speaker-item">
                        <div>
                          <div class="event__speaker-name-supporters agenda-modal-supporters">
                            <a onclick="utag.link({'event_name': 'Speaker Bio'  + '_' + '<?php echo $name ;?>' })"
                              class="event__speaker-name__link"
                              href="#<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
                              <?php echo $name; ?></a>
                            <span
                              class="event__speaker-title-supporters <?php if ($sponsored) echo 'event__speaker-title-supporters-padding-left';?>">
                              <?php echo get_field('title', $agenda_speaker->ID); ?><?php if ($sponsored) echo ',' ;?>
                            </span>

                            <span class="event__speaker-title-supporters">
                              <?php echo get_field('company', $agenda_speaker->ID); ?>
                            </span>

                            <div class="event__speaker-title" style="display: none;">
                              <?php echo get_field('title', $agenda_speaker->ID); ?></div>
                            <div class="event__speaker-company" style="display: none;">
                              <?php echo get_field('company', $agenda_speaker->ID); ?></div>

                            <div class="event__speaker__bio" style="display: none;">
                              <?php echo get_field( 'bio', $agenda_speaker->ID ) ;?></div>

                            <img class="event__speaker__image" style="display: none;"
                              data-src="<?php echo get_field( 'image', $agenda_speaker->ID )['url']; ?>">

                          </div>


                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <?php }; ?>
                  <?php }; ?>

                  <?php if(!$sponsored) {; ?>
                  <?php if($agenda_speakers) {; ?>
                  <div class="event__participants">
                    <?php if(get_sub_field ( 'speakers_section' )) :?>
                    <div class="event__speakers-title">
                      <?php echo get_sub_field ( 'speakers_section' ); ?>
                    </div>
                    <?php endif ;?>
                    <div class="event__speakers">
                      <?php foreach ($agenda_speakers as $agenda_speaker) : 
                                        $name = get_the_title($agenda_speaker);
                                      
                                      ?>
                      <div class="event__speaker-item">
                        <div class="event__speaker-item-wrapper">
                          <div class="event__speaker-name">
                            <a onclick="utag.link({'event_name': 'Speaker Bio'  + '_' + '<?php echo $name ;?>' })"
                              class="event__speaker-name__link"
                              href="#<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
                              <?php echo $name; ?></a>
                          </div>
                          <div class="event__speaker-title">
                            <?php echo get_field('title', $agenda_speaker->ID); ?>
                          </div>
                          <div class="event__speaker-company">
                            <?php echo get_field('company', $agenda_speaker->ID); ?>
                          </div>
                          <div class="event__speaker__bio" style="display: none;">
                            <?php echo get_field( 'bio', $agenda_speaker->ID ) ;?></div>

                          <img class="event__speaker__image" style="display: none;"
                            data-src="<?php echo get_field( 'image', $agenda_speaker->ID )['url']; ?>">
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <?php }; ?>
                  <?php }; ?>
                  <!-- Moderators -->
                  <?php if($sponsored) {; ?>
                  <?php  if($agenda_moderators) {; ?>
                  <div class="event__participants">
                    <div class="event__speakers-title">
                      <?php echo get_sub_field ( 'moderators_section' ); ?>
                    </div>
                    <div class="event__speakers event__speakers-block">
                      <?php foreach ($agenda_moderators as $agenda_moderator ) : 
                      $name = get_the_title( $agenda_moderator );
                      ?>
                      <div class="event__speaker-item">
                        <div>
                          <div class="event__speaker-name-supporters agenda-modal-supporters">

                            <a onclick="utag.link({'event_name': 'Speaker Bio'  + '_' + '<?php echo $name ;?>' })"
                              class="event__speaker-name__link"
                              href="#<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
                              <?php echo $name; ?>
                            </a>
                            <span
                              class="event__speaker-title-supporters <?php if ($sponsored) echo 'event__speaker-title-supporters-padding-left';?>">
                              <?php echo get_field('title', $agenda_moderator->ID); ?>,&nbsp;
                            </span>
                            <span class="event__speaker-title-supporters">
                              <?php echo get_field('company', $agenda_moderator->ID); ?>
                            </span>
                            <div class="event__speaker-title" style="display: none;">
                              <?php echo get_field('title', $agenda_moderator->ID); ?></div>
                            <div class="event__speaker-company" style="display: none;">
                              <?php echo get_field('company', $agenda_moderator->ID); ?></div>
                            <div class="event__speaker__bio" style="display: none;">
                              <?php echo get_field( 'bio', $agenda_moderator->ID ) ;?></div>

                            <img class="event__speaker__image" style="display: none;"
                              data-src="<?php echo get_field( 'image', $agenda_moderator->ID )['url']; ?>">
                          </div>
                        </div>
                      </div>
                      <?php endforeach;?>
                    </div>
                  </div>
                  <?php }; ?>
                  <?php }; ?>

                  <?php if(!$sponsored) {; ?>
                  <?php  if($agenda_moderators) {; ?>
                  <div class="event__participants">
                    <div class="event__speakers-title">
                      <?php echo get_sub_field ( 'moderators_section' ); ?>
                    </div>
                    <div class="event__speakers">
                      <?php foreach ($agenda_moderators as $agenda_moderator ) : 
                                      $name = get_the_title( $agenda_moderator );
                                      ?>
                      <div class="event__speaker-item">
                        <div class="event__speaker-item-wrapper">
                          <div class="event__speaker-name">
                            <a class="event__speaker-name__link"
                              href="#<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
                              <?php echo $name; ?></a>
                          </div>
                          <div class="event__speaker-title">
                            <?php echo get_field('title', $agenda_moderator->ID); ?>
                          </div>
                          <div class="event__speaker-company">
                            <?php echo get_field( 'company', $agenda_moderator->ID ); ?>
                          </div>

                          <div class="event__speaker__bio" style="display: none;">
                            <?php echo get_field( 'bio', $agenda_moderator->ID ) ;?></div>

                          <img class="event__speaker__image" style="display: none;"
                            data-src="<?php echo get_field( 'image', $agenda_moderator->ID )['url']; ?>">

                        </div>

                      </div>
                      <?php endforeach;?>
                    </div>
                  </div>
                  <?php }; ?>
                  <?php }; ?>

                  <!-- Sponsors -->

                  <?php  
                  if($agenda_sponsors && (count($agenda_sponsors) > 1)) {; 
                  ?>

                  <div class="event__participants">
                    <div class="event__speakers-title">
                      <?php echo get_sub_field ( 'sponsors_section' ); ?>
                    </div>
                    <div class="event__supporters">
                      <?php foreach ( $agenda_sponsors as $agenda_sponsor ) : 
                                  $img = get_field( 'image', $agenda_sponsor->ID );
                                  $image = $img['url'];
                                  $image_alt = $img['alt'];
                                  $name = get_the_title($agenda_sponsor);
                                  ?>
                      <a class="event__supporters--a" href="<?php the_permalink($agenda_sponsor) ?>">
                        <figure class="card__image--agenda-supporters agenda-supporters-width light-background-opacity">
                          <img class="lazyload" data-src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
                        </figure>
                      </a>

                      <?php endforeach;?>
                    </div>

                  </div>
                  <?php }; ?>

                </div>
                <?php  
                  if($agenda_sponsors && (count($agenda_sponsors) < 2)) {
                  ;?>
                <div class="event__supporters__col__wrapper">
                  <div class="event__supporters__col__wrapper--headline">
                    <?php echo get_sub_field ( 'sponsors_section' ); ?>
                  </div>
                  <?php foreach ( $agenda_sponsors as $agenda_sponsor ) : 
                                  $img = get_field( 'image', $agenda_sponsor->ID );
                                  $image = $img['url'];
                                  $image_alt = $img['alt'];
                                  $name = get_the_title($agenda_sponsor);
                                  $link = get_field( 'link', $agenda_sponsor->ID );
                                  $link_title = $link['title'];
                                  $link_title = preg_replace('#^https?://#', '',  $link_title);
                                  ?>
                  <div class="agenda-modal-sponsors">
                    <a class="supporters-card-link"
                      href="#sponsors/<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
                      <figure class="card__image custom-supporters-width">
                        <img class="lazyload event__sponsor__image" data-src="<?php echo $image; ?>"
                          alt="<?php echo $image_alt; ?>">
                      </figure>
                    </a>
                    <div class="event__sponsor__name" style="display: none;">
                      <?php echo $name ;?></div>

                    <a style="display: none;" class="event__sponsor__link" href="<?php echo $link['url']; ?>"
                      target="_blank">
                      <?php echo $link_title; ?>
                    </a>

                    <div class="event__sponsor__bio" style="display: none;">
                      <?php echo get_field( 'bio', $agenda_sponsor->ID ) ;?></div>

                  </div>



                  <?php endforeach;?>
                </div>
                <?php } ;?>
              </div>
              <?php 

              

              
              if($sponsored_banner) {;?>
              <div class="event__supporters-banner">
                <?php
                 echo $sponsored_banner;
                  ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>

          <?php if($detail OR $agenda_speakers OR $agenda_moderators OR $agenda_sponsors) : ?>
          <div class="plus <?php if ($z < 1) echo 'plus-active'; ?>"></div>
          <?php endif;?>
        </div>


        <?php }; ?>
      </div>


    </div>
    <?php $z++;?>
    <?php endwhile; endif; ?>
    <!--  Comment out below to hide view all button  -->
    <?php if($z > 4 && $hide_partial_agenda) : ?>
    <div class="bar-bg bar-view">
      <p>View All</p>
      <span class="button-down"></span>
    </div>
    <?php endif ?>

  </div>



  <?php $a++; ?>

  <?php wp_reset_postdata(); endforeach; ?>






</section>

<?php endif ;?>