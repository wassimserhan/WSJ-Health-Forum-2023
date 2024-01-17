<?php get_header(); ?>
<main class="main-container">
  <section class="error-404">
    <h2 class="error-404__headline">404 ERROR (Page Not Found)</h2>
    <p class="error-404__copy">Uh oh! I'm afraid you've found a page that doesn't really exist. That can happen when you
      follow a link to
      something that has since been deleted. Or the link was incorrect to begin with. </p>

    <h3 class="error-404__copy">To go back, please click <a href="<?php echo get_home_url(); ?>/">HERE</a>.</h3>
  </section>
</main>
<?php get_footer(); ?>