<?php if(get_row_layout()=='banner'):
$headline = get_sub_field('headline');
$countdown_show = get_sub_field('show_countdown');
$countdown_end = get_sub_field('countdown_end_date');
$cta = get_sub_field('cta');
//Calculate date difference
date_default_timezone_set('America/New_York');
$date = date('F j, Y g:i a', time());
$diff = strtotime($countdown_end) - strtotime($date);
$hours = $diff/3600;
//Calculate date difference
?>


<?php if(get_sub_field('show_banner')) : ?>
<section id="banner" class="banner banner--sticky" data-countdown="<?php echo $countdown_end ?>">
  <img class="banner--close" src="<?php echo get_template_directory_uri(); ?>/dist/img/close.svg" alt="close banner">
  <article class="banner__detail">
    <h3 class="banner__headline"><?php echo $headline ?></h3>

    <div id="countdown-banner" class="countdown-body <?php if( !$countdown_show ) { echo 'hidden' ;}?>">
      <p id="year" class="year">2023</p>
      <div id="countdown" class="countdown">
        <div class="time">
          <h2 id="days">00</h2>
          <small>day<?php if($hours > 48) echo 's' ;?></small>
        </div>
        <div class="time">
          <h2 id="hours">00</h2>
          <small>hours</small>
        </div>
        <div class="time">
          <h2 id="minutes">00</h2>
          <small>mins</small>
        </div>
        <div class="time">
          <h2 id="seconds">00</h2>
          <small>secs</small>
        </div>
      </div>
    </div>


    <?php   $link_target = $cta['target'] ? $cta['target'] : '_self';?>
    <button class="btn banner__btn">
      <a id="<?php echo wsj_link_id( 'nav', $cta['title'] ); ?>" class="banner__btn-link"
        href="<?php echo $cta['url'] ?>" target="<?php echo $link_target; ?>"
        rel="nofollow"><?php echo $cta['title']?></a>
    </button>
  </article>

</section>
<?php endif ?>
<?php endif ?>