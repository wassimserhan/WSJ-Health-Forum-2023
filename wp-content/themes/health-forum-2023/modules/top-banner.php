<?php 


$event_date = get_field( 'event_date');
$show = get_field( 'show_top_banner'); 
     ?>

<?php if ($show) :?>
<section class="top-banner">

  <p class="top-banner__item"><?php echo $event_date ;?></p>
</section>
<?php endif ;?>