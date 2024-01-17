<?php
/**
 * The Footer template
 *
 * Displays all of the footer-content section to end tag of html.
 *
 * @package WSJ EVENT TEMPLATE
 */

?>

<?php
  $select_background_color = get_field('select_background_color', get_option( 'page_on_front' ) );
  $footer_links = get_field('footer_links', get_option( 'page_on_front' ) );
  $footer_cta = get_field('footer_cta', get_option( 'page_on_front' ));
  $mailto_subject = get_field('mailto_subject', get_option( 'page_on_front' ));
  ?>

<!-- Scroll to Top -->

<section id="scrollBtn" class="scroll-button">
  <figure class="scroll-button__scroll-arrow">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/top.svg" title="scroll arrow" width="100%">
  </figure>
  <p class="scroll-button__p">TO TOP</p>
</section>




<footer class="footer <?php echo $select_background_color; ?>">
  <figure>
    <img loading="lazy" class="bar__image" src="<?php echo get_template_directory_uri(); ?>/dist/img/brand-logo.svg"
      alt="<?php echo get_bloginfo( 'name' ); ?> logo" title="<?php echo get_bloginfo( 'name' ); ?>" width="100%">
  </figure>
  <ul class="footer__nav">



    <?php 
      if (have_rows('nav_items', get_option( 'page_on_front' ))):
      while( have_rows('nav_items', get_option( 'page_on_front' ))) : the_row();
      $item = get_sub_field('nav_item',get_option( 'page_on_front' ));
      $nav_item = $item;
      $nav_url = 'href="' . get_home_url().'/#'.$nav_item . '" target="_self"';
      $custom_nav_text = get_sub_field('custom_nav_text', get_option( 'page_on_front' ));
      $custom_url = get_sub_field('custom_url', get_option( 'page_on_front' ));
      if ($custom_url) {
        $nav_url = 'href="' . $custom_url . '" target="_self"';
      }
      if (have_rows('nav_sub_links')) {
        $nav_url = '';
      }
      ?>

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

    <li class="footer__item">
      <a onclick="utag.link({'event_name':'<?php echo $sub_nav_item ?>'})"
        id="<?php echo wsj_link_id( 'footer-nav', $sub_nav_item ); ?>" class="footer__link"
        data-name="<?php echo $sub_nav_item ?>" href="<?php echo $sub_nav_url ;?>"><?php echo $sub_nav_text ;?></a>
    </li>



    <?php 
            endwhile;
            
            ?>
    <?php 
          } else {
        ?>

    <li class="footer__item">
      <a onclick="utag.link({'event_name':'<?php echo $nav_item ?>'})"
        id="<?php echo wsj_link_id( 'footer-nav', $nav_item ); ?>" class="footer__link"
        data-name="<?php echo $nav_item ?>" <?php echo $nav_url ;?>><?php echo $custom_nav_text ;?></a>
    </li>
    <?php 
          }
        ?>




    <?php 
      endwhile;
      endif;
      ?>
  </ul>
  <!-- CTA -->
  <?php if ($footer_cta): ?>
  <?php $link_target = $footer_cta['target'] ? $footer_cta['target'] : '_self';?>
  <button class="btn btn--primary btn--footer">
    <a class="btn--link" <?php echo get_sub_field('contact_utag')?>
      href="<?php echo $footer_cta['url']."?subject=". $mailto_subject?>"
      target="<?php echo $link_target; ?>"><?php echo $footer_cta['title'] ?></a>
  </button>
  <?php endif ;?>

  <div class="footer__legal">
    <p class="footer__copyright">&copy; Copyright
      <script type="text/javascript">
      document.write(new Date().getFullYear());
      </script>
      Dow Jones &amp; Company, Inc. All Rights Reserved.
    </p>
    <p class="footer__notices">

      <?php foreach ($footer_links as $link): ?>

      <a class="footer__link" id="home-footer-legal-www-dowjones-com" href="<?php echo $link['links']['url']?>"
        target="_blank" rel="noopener">
        <?php echo $link['links']['title']?> </a>

      <?php endforeach; ?>
      <!-- Regulation Links -->
      <a id="regulation-links" class="footer__regulation-links" href="#" target="_self"></a>

    </p>
  </div>

  <!-- Modal popup for speakers & sponsors -->
  <section id="modal" class="modal">


    <section id="modal-content" class="modal__content">
      <img class="modal--close" src="<?php echo get_template_directory_uri(); ?>/dist/img/close.svg" alt="close modal">
      <article class="modal__content--copy">
        <h2 id="modal__name" class="modal__name"></h2>
        <a id="modal__link" class="modal__link" href="" target="_blank"></a>
        <p id="modal__title" class="modal__details"></p>
        <p id="modal__company" class="modal__details"></p>
        <p id="modal__extra-title" class="modal__details"></p>
        <p id="modal__extra-company" class="modal__details"></p>
        <p id="modal__bio" class="modal__details modal__bio"></p>
      </article>
      <img id="modal__image" class="modal__image" src="" alt="">
    </section>

  </section>


</footer>

<?php wp_footer(); ?>


<!-- Regulation Links -->
<script>
__ace('djcmp', 'getRegulationLinkRenderer', (RegulationLink) => {
  const linkConfigurations = __ace('djcmp', 'getRegulationLinkConfigurations');
  new RegulationLink(linkConfigurations).render();
});
</script>

<script async src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" rel="preload"></script>



</body>

</html>