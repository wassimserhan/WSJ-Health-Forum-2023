<?php 

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'past-events') == true) {
  $nav_cta = get_field('nav_cta');
  $nav_utag = get_field('nav_utag');
  $past_event = "past-event";
} else {
  $nav_cta = get_field('nav_cta', get_option( 'page_on_front' ));
  $nav_utag = get_field('nav_utag', get_option( 'page_on_front' ));
}
 ?>

<nav class="nav">

  <div class="nav__content">




    <div class="hamburger hamburger--squeeze <?php echo $past_event ?>" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>

    <div class="brand__container brand__container--fixed">
      <figure class="brand__container__fig">
        <a id="<?php echo wsj_link_id( 'header logo', 'home' ); ?>" class="brand__container__fig--a"
          href="<?php echo get_home_url(); ?>">
          <img class="brand__logo brand__logo--no-scroll"
            src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-horiz.svg"
            alt="<?php echo get_bloginfo( 'name' ); ?> logo" title="<?php echo get_bloginfo( 'name' ); ?>" width="100%">

        </a>
      </figure>
    </div>

    <?php if (strpos($url,'past-events') != true) :?>

    <ul class="nav__links">
      <?php 
        if (have_rows('nav_items', get_option( 'page_on_front' ))):
        while(have_rows('nav_items', get_option( 'page_on_front' ))) : the_row();
        $nav_item = get_sub_field('nav_item', get_option( 'page_on_front' ));
        $custom_nav_text = get_sub_field('custom_nav_text', get_option( 'page_on_front' ));
        $custom_url = get_sub_field('custom_url');
        $nav_sub_links = get_sub_field('nav_sub_links');
        $nav_url = 'href="' . get_home_url().'/#'.$nav_item . '" target="_self"';
        if ($custom_url) {
          $nav_url = 'href="' . $custom_url . '" target="_self"';
        }
        if (have_rows('nav_sub_links')) {
          $nav_url = '';
        }
        ?>

      <li class="nav__links__list" role="menuitem">
        <a onclick="utag.link({'event_name':'<?php echo $nav_item ?>'})"
          id="<?php echo wsj_link_id( 'nav', $nav_item ); ?>" class="nav__items nav__items--main nav-links"
          data-name="<?php echo $nav_item ?>" <?php echo $nav_url ;?>><?php echo $custom_nav_text ;?></a>

        <?php
            if (have_rows('nav_sub_links')):
          ?>

        <ul class="nav__links__list__sub" role="menu">
          <?php 
              
              while( have_rows('nav_sub_links')) : the_row();
              $sub_nav_text = get_sub_field('sub_nav_text');
              $sub_nav_item = get_sub_field('sub_nav_item');
              $sub_custom_url = get_sub_field('sub_custom_url');
              $sub_nav_url = get_home_url().'/#'.$sub_nav_item;
              if ($sub_custom_url) {
                $sub_nav_url = $sub_custom_url;
              }
              ?>

          <li class="nav__links__list__sub--list" role="menuitem">
            <a onclick="utag.link({'event_name':'<?php echo $sub_nav_item ?>'})"
              id="<?php echo wsj_link_id( 'nav', $nav_item ); ?>" class="nav__items nav-links"
              data-name="<?php echo $sub_nav_item ?>" href="<?php echo $sub_nav_url ;?>"
              target="_self"><?php echo $sub_nav_text; ?></a>
          </li>



          <?php 
              endwhile;
              
              ?>
        </ul>



        <?php 
            endif;
          ?>

      </li>

      <?php 
        endwhile;
        endif;
        ?>
    </ul>
    <?php endif ?>
  </div>






  <!-- CTA -->
  <?php if ($nav_cta) {
                              $link_target = $nav_cta['target'] ? $nav_cta['target'] : '_self';?>
  <button class=" btn btn--primary btn--header" <?php echo $nav_utag; ?>>
    <a <?php echo get_field('bar_utag')?> id="<?php echo wsj_link_id( 'nav', $nav_cta['title'] ); ?>"
      class="btn--primary__link" href="<?php echo $nav_cta['url'] ?>"
      target="<?php echo $link_target; ?>"><?php echo $nav_cta['title'] ?></a>
  </button>
  <?php } ;?>




  </div>



  <div class="nav__dropdown <?php echo $past_event ?>">

    <?php 
      if (have_rows('nav_items', get_option( 'page_on_front' ))):
      while( have_rows('nav_items',get_option( 'page_on_front' ))) : the_row();
      $nav_item = get_sub_field('nav_item', get_option( 'page_on_front' ));
      $custom_nav_text = get_sub_field('custom_nav_text', get_option( 'page_on_front' ));
      $custom_url = get_sub_field('custom_url');
      $nav_sub_links = get_sub_field('nav_sub_links');
      $nav_url = 'href="' . get_home_url().'/#'.$nav_item . '" target="_self"';
      if ($custom_url) {
        $nav_url = 'href="' . $custom_url . '" target="_self"';
      }
      if (have_rows('nav_sub_links')) {
        $nav_url = '';
      }
      ?>

    <?php if (strpos($url,'past-events') != true) :?>

    <div class="nav__links__list" role="menuitem">


      <?php
          if (have_rows('nav_sub_links')) {
        ?>
      <?php 
            
            while( have_rows('nav_sub_links')) : the_row();
            $sub_nav_text = get_sub_field('sub_nav_text');
            $sub_nav_item = get_sub_field('sub_nav_item');
            $sub_custom_url = get_sub_field('sub_custom_url');
            $sub_nav_url = get_home_url().'/#'.$sub_nav_item;
            if ($sub_custom_url) {
              $sub_nav_url = $sub_custom_url;
            }
            ?>

      <a onclick="utag.link({'event_name':'<?php echo $sub_nav_item ?>'})"
        id="<?php echo wsj_link_id( 'mobile-nav', $sub_nav_item ); ?>" class="nav__items nav-links"
        data-name="<?php echo $sub_nav_item ?>" href="<?php echo $sub_nav_url ;?>" target="_self">
        <?php echo $sub_nav_text; ?>
      </a>



      <?php 
            endwhile;
            
            ?>
      <?php 
          } else {
        ?>
      <a onclick="utag.link({'event_name':'<?php echo $nav_item ?>'})"
        id="<?php echo wsj_link_id( 'mobile-nav', $nav_item ); ?>" class="nav__items nav__items--main nav-links"
        data-name="<?php echo $nav_item ?>" <?php echo $nav_url ;?>><?php echo $custom_nav_text ;?>
      </a>
      <?php 
          }
        ?>



    </div>
    <?php endif ;?>

    <?php 
      endwhile;
      endif;
      ?>
    <!-- CTA -->
    <?php if ($nav_cta) {
                            $link_target = $nav_cta['target'] ? $nav_cta['target'] : '_self';?>
    <button class=" btn btn--primary btn--header--dropdown" <?php echo $nav_utag; ?>>
      <a <?php echo get_field('bar_utag')?> id="<?php echo wsj_link_id( 'nav', $nav_cta['title'] ); ?>"
        class="btn--primary__link" href="<?php echo $nav_cta['url'] ?>"
        target="<?php echo $link_target; ?>"><?php echo $nav_cta['title'] ?></a>
    </button>
    <?php } ;?>

  </div>
  </div>

</nav>