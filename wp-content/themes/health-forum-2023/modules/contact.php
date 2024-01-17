        <?php if(get_row_layout()=='contact'): 
        $section_name = get_sub_field( 'section_name');           
        $headline = get_sub_field( 'headline');
        $contacts = get_sub_field( 'contacts');
        $select_background_color = get_sub_field ('select_background_color');
        ?>

        <section id="contact" class="contact <?php echo $select_background_color; ?>">
            <div class="contact__max-width">
                <h2 class="contact__headline"><?php echo $section_name ?></h2>
                <?php if($headline):?>
                <h3 class="contact__heading"><?php echo  $headline; ?></h3>
                <?php endif?>

                <?php foreach ($contacts as $contact): ?>

                <hr>
                <h4 class="contact__subheading"><?php echo $contact['department'] ?></h4>

                <?php if($contact['name']):?>
                <h5 class="contact__name"><?php echo $contact['name'] ?></h5>
                <?php endif?>

                <?php if($contact['phone']) {;?>
                <a class="contact__link"
                    href="mailto:<?php echo $contact['phone'] ?>"><?php echo $contact['phone'] ?></a>
                <br>
                <?php } ;?>


                <a class="contact__link"
                    href="mailto:<?php echo $contact['email'] ?>"><?php echo $contact['email'] ?></a>

                <?php endforeach ?>

            </div>
        </section>

        <?php endif ;?>