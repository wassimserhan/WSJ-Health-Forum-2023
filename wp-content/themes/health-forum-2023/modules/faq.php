<?php if(get_row_layout()=='faq_layout'):          
  $section_name = get_sub_field( 'section_name');
  $select_background_color = get_sub_field ('select_background_color');  
?>


<section id="faq" class="faq <?php echo $select_background_color; ?>">
  <div class="faq__max-width">
    <h2 class="faq__headline"><?php echo $section_name ?></h2>
    <?php if ( have_rows('faq') ): 
                while( have_rows('faq') ): the_row();
                $faq_question = get_sub_field( 'question' );
                $faq_answer = get_sub_field( 'answer' );
                ?>

    <article class="accordion-faq">
      <div class="accordion-faq__wrapper">
        <p class="accordion-faq__intro">
        <?php echo $faq_question ;?>
        </p>
        <div class="plus"></div>
      </div>
      <p class="accordion-faq__content">
        <?php echo  $faq_answer;?>
      </p>
    </article>
    <?php endwhile ;?>

    <?php endif ;?>
  </div>
</section>




<?php endif ?>