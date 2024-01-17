<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<main class="main-container">
  <?php if ( have_rows('main') ):?>
  <?php while( have_rows('main') ): the_row();?>
  <?php if ( get_row_layout() == 'hero_layout'): ?>
  <?php get_template_part( 'modules/hero' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'bar_cta_layout'): ?>
  <?php get_template_part( 'modules/bar-form' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'speakers_layout'): ?>
  <?php get_template_part( 'modules/speakers' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'agenda_layout'): ?>
  <?php get_template_part( 'modules/agenda' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'pricing'): ?>
  <?php get_template_part( 'modules/pricing' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'contact'): ?>
  <?php get_template_part( 'modules/contact' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'divider'): ?>
  <?php get_template_part( 'modules/divider' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'intro_layout'): ?>
  <?php get_template_part( 'modules/intro' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'past_events_layout'): ?>
  <?php get_template_part( 'modules/past-events' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'past_events_list_layout'): ?>
  <?php get_template_part( 'modules/past-events-list' ) ;?>
  <?php endif; ?>
  <?php if ( get_row_layout() == 'sponsors_layout'): ?>
  <?php get_template_part( 'modules/sponsors' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'gallery_layout'): ?>
  <?php get_template_part( 'modules/gallery' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'text-image_layout'): ?>
  <?php get_template_part( 'modules/text-image' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'event_highlights_layout'): ?>
  <?php get_template_part( 'modules/event-highlights' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'testimonial_layout'): ?>
  <?php get_template_part( 'modules/testimonial' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'gallery_slides_layout'): ?>
  <?php get_template_part( 'modules/gallery-slides' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'custom_form_layout'): ?>
  <?php get_template_part( 'modules/custom-form' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'faq_layout'): ?>
  <?php get_template_part( 'modules/faq' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'banner'): ?>
  <?php get_template_part( 'modules/banner' ) ;?>
  <?php endif; ?>

  <?php if ( get_row_layout() == 'custom_form_attendee_layout'): ?>
  <?php get_template_part( 'modules/custom-form-attendee' ) ;?>
  <?php endif; ?>

  <?php endwhile; ?>
  <?php endif;?>
</main>



<?php get_footer(); ?>