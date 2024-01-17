<?php 
  $select_background_color = get_sub_field ('select_background_color');
  $sponsor_tiers = get_sub_field('sponsor_tiers');
  $include_titles = get_sub_field('titles');
  $section_id = get_sub_field ( 'section_id' );

?>
<section id="sponsors" class="supporters <?php echo $select_background_color; ?>">
  <div class="supporters__container max-width">

    <?php 
        foreach($sponsor_tiers as $sponsor_tier):
            $select_sponsor = $sponsor_tier['sponsor_select'];
            $sponsor_headline = $sponsor_tier['headline'];
           
        ?>
    <?php if ($sponsor_headline): ?>
    <h2 class="supporters__headline">
      <?php echo $sponsor_headline; ?>
    </h2>
    <?php endif; ?>

    <div class="supporters__grid <?php echo $select_sponsor; ?>-tier">

      <?php 
            $sponsors = $sponsor_tier['sponsors'];
            foreach($sponsors as $sponsor):
                $name = get_the_title($sponsor);
                $img = get_field( 'image', $sponsor );
                $bio = get_field( 'bio', $sponsor );
                $link = get_field( 'link', $sponsor );
                $link_title = $link['title'];
                $link_title = preg_replace('#^https?://#', '',  $link_title);
                $image = $img['url'];
                $image_alt = $img['alt'];
                $sponsor_width = get_field( 'sponsor_width', $sponsor);
                $sponsor_height = get_field( 'sponsor_height', $sponsor);
            ?>

      <div class="card sponsors__card">
        <a href="#sponsors/<?php echo str_replace(' ', '-', strtolower($name)) ; ?>">
          <figure style="width:<?php echo $sponsor_width ;?>; height:<?php echo $sponsor_height ;?>"
            onclick="utag.link({'event_name': 'Sponsor'  + '_' + '<?php echo $name ;?>' })"
            class="card__image custom-supporters-width">
            <img class="modal__image lazyload" data-src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
          </figure>
        </a>
        <div class="card__header">

          <a style="display: none;" class="post-info__link modal__link" href="<?php echo $link['url']; ?>"
            target="_blank">
            <?php echo $link_title; ?>
          </a>



          <div style="display: none" class="card__title modal__name">
            <?php echo $name; ?>
          </div>


          <div style="display: none;" class="post-info__text modal__bio"><?php echo $bio; ?>
          </div>
        </div>
      </div>


      <?php endforeach;?>


    </div>


    <?php endforeach;?>

    <?php 
            $sponsor_description = get_sub_field('sponsor_description');
            $contact_link = get_sub_field('contact_link');
            if ($sponsor_description || $contact_link):
        ?>

    <div class="supporters__footer dark-underline-top">
      <p class="supporters__footer--desc">
        <?php echo $sponsor_description; ?>
      </p>
      <a class="supporters-link" href="<?php echo $contact_link['url']; ?>"
        target="<?php echo $contact_link['target']; ?>">
        <?php echo $contact_link['title']; ?>
      </a>
    </div>

    <?php endif; ?>

  </div>

</section>