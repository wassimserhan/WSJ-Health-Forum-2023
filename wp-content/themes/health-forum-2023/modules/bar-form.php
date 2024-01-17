<?php if(get_row_layout()=='bar_cta_layout'): 
        $select = get_sub_field( 'select_layout');
        $message = get_sub_field( 'message');
        $cta = get_sub_field( 'cta');
        $signup_cta_text = get_sub_field( 'signup_cta_text');
        $form_id = get_sub_field( 'form_id');
    ?>

    <!-- Layout Choices -->
    <?php switch($select){
        case 'CTA':
        $ctaLayout=true;
        break;  
    
        case 'Signup' :
        $signupLayout=true;
        break;
    };?>


    <section class="bar">

      <?php if($message) :?>
      <div class="bar__title bar__title--light"><?php echo $message ?></div>
      <?php endif ;?>
      <div>

        <?php
          if( $signupLayout): ?>
            <div class="display-flex">
              <input class="bar__input" type="email" id="bar-form-email" placeholder="E-mail Address*">
              <input class="btn--bar-signup" name="Submit" type="submit" onclick="barFormSubmit()" value="<?php echo $signup_cta_text; ?>" />
              <input type="hidden" name="webformnamehiddenField" id="bar-form-name" value="<?php echo $form_id; ?>">
              <input type="hidden" name="formId" id="bar-form-id"
                    value="https://s716031822.t.eloqua.com/e/f2?elqFormName=<?php echo $form_id;?>&elqSiteID=716031822">
            </div>

        <?php endif ?>

        <?php if($ctaLayout): ?>
        <!-- CTA -->
          <?php if ($cta): 
              $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <button class="btn <?php
                  if( $signupLayout) { echo 'btn--bar-signup'; } else { echo 'btn--bar'; } 
                  ?>">
              <a <?php echo get_sub_field('bar_utag')?> id="<?php echo wsj_link_id( 'bar', $cta['title'] ); ?>" class="<?php
                  if( $signupLayout) { echo 'btn--bar-signup__link'; } else { echo 'btn--bar__link'; } 
                  ?>" href="<?php echo $cta['url'] ?>" target="<?php echo $link_target; ?>"><?php echo $cta['title'] ?></a>
            </button>
          <?php endif ;?>

        <?php endif ;?>


      </div>
    </section>
    <?php
      if( $signupLayout): ?>
    <div class="bar__form">
      <p class="bar__form--err">
      Please fill the required fields *.
      </p>
      <p class="bar__form--success">
      Submitted! Thank you
      </p>
    </div>
    <?php endif ?>

    <?php endif ;?>