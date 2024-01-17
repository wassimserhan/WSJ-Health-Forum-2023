<?php 
  $select_intro = get_sub_field('select_intro');
  $intro_headline = get_sub_field('headline');
  $select_background_color = get_sub_field ('select_background_color');
  $section_id = get_sub_field ( 'section_id' );
?>

<section id="<?php echo $section_id ?>" class="intro-section <?php echo $select_background_color; ?>">
  <section class="intro-max-width">

    <?php if ($intro_headline && $select_intro == 'columns' OR $select_intro == 'bullets'): ?>
    <h2 class="intro-section__headline">
      <?php echo $intro_headline; ?>
    </h2>
    <?php endif; ?>



    <section class="intro-section__wrapper">

      <!-- Layout Choices -->


      <?php 
            if ($select_intro == 'columns'): ?>

      <?php 
                $columns = get_sub_field('columns');
                $columnCount = count($columns);
                $column_text_align = get_sub_field('column_text_align');
                $text_align = 'left-text';
                if ($column_text_align == 'center') {
                    $text_align = 'center-text';
                }
                $custom_column_width = '';
                if (count($columns) == 1) {
                    $custom_column_width = 'single-col-width';
                }
                elseif (count($columns) == 2) {
                    $custom_column_width = 'two-col-width';
                }
                $image_option = get_sub_field('image_option');

                foreach($columns as $column):
                ?>

      <article class="intro-section__wrapper--article col-width-<?php echo $columnCount; ?> <?php echo $custom_column_width; ?> <?php echo $text_align; ?>">



        <?php if ($column['image']): ?>
        <div class="intro-section__wrapper--article__icon <?php if ($image_option == 'icon') echo 'intro-section__wrapper--article__icon--icon'; ?>">
          <img class="lazyload intro-section__wrapper--article__icon--img"
            data-src="<?php echo $column['image']['url']; ?>" alt="<?php echo $column['image']['alt']; ?>" />
        </div>
        <?php endif; ?>

        <?php if ($column['title']): ?>
        <h3 class="intro-section__wrapper--article__headline">
          <?php echo $column['title']; ?>
        </h3>
        <?php endif; ?>

        <p class="intro-section__wrapper--article__paragraph js-animate move-up">
          <?php echo nl2br ($column['description']); ?>
        </p>

        <?php if ($column['cta']['title']): ?>
        <div class="intro-section__wrapper--article__cta">
          <a href="<?php echo $column['cta']['url']; ?>" target="<?php echo $column['cta']['target']; ?>"
            class="intro-section__wrapper--article__cta--a">
            <?php echo $column['cta']['title']; ?>
          </a>
        </div>
        <?php endif; ?>



      </article>


      <?php endforeach;?>


      <?php endif; ?>

      <!-- Layout Choices -->

      <?php 
            if ($select_intro == 'quotes'): 
                $quotes = get_sub_field('quotes');
                $name = get_sub_field('name');
                $title = get_sub_field('title');
                $company = get_sub_field('company');
            ?>
      <article class="intro-section__wrapper--article quote-container">

        <?php if ($quotes): ?>
        <p class="intro-section__wrapper--article__quotes">
          <?php echo $quotes; ?>
        </p>
        <?php endif; ?>


        <div class="intro-section__wrapper--article__speaker">
          <?php if ($name): ?>
          <p class="intro-section__wrapper--article__speaker--name">
            <?php echo $name; ?>
          </p>
          <?php endif; ?>
          <?php if ($title): ?>
          <p class="intro-section__wrapper--article__speaker--title">
            <?php echo $title; ?>
          </p>
          <?php endif; ?>
          <?php if ($company): ?>
          <p class="intro-section__wrapper--article__speaker--company">
            <?php echo $company; ?>
          </p>
          <?php endif; ?>
        </div>

      </article>


      <?php endif; ?>





    </section>
    <!-- Layout Choices -->

    <section class="intro-section__wrapper-bullet">
      <?php 
                if ($select_intro == 'bullets'): 
                $bullets = get_sub_field('bullets');
                      $bulletHeadline = get_sub_field('bullet_headline');
                $bulletIntro = get_sub_field('bullet_intro');
            ?>

      <?php if($bulletIntro) :?>
      <h3 class="intro-section__bullet-intro">
        <?php echo $bulletIntro; ?>
      </h3>
      <?php endif;?>



      <?php if($bullets): ?>
      <div>
        <?php if( $bulletHeadline ) : ?>
        <h4 class="intro-section__bullet-list-headline">
          <?php echo $bulletHeadline; ?>
        </h4>
        <?php endif; ?>
        <ol class="intro-section__bullet-list">
          <?php foreach ( $bullets as $bullet ): ?>
          <li class="intro-section__bullet">
            <?php if($bullet['bullet_title']) :?>
            <span class="intro-section__bullet-title"><?php echo $bullet['bullet_title'];?></span>

            <?php endif; ?>

            <?php echo $bullet['bullet'];?>
          </li>
          <?php endforeach;?>
        </ol>
      </div>

      <?php endif; ?>

      <?php endif; ?>
    </section>

  </section>
</section>