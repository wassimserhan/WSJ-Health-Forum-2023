<?php 
  $past_events_list = get_sub_field('past_events_list');
  $select_background_color = get_sub_field ('select_background_color');
?>

<div class="past-events-list <?php echo $select_background_color; ?>">
  <div class="max-width">
    <?php if ($past_events_list): ?>

    <ul>
      <?php                     
                    foreach($past_events_list as $past_event_list):
                        
                        $link = $past_event_list['link']
                    ?>
      <li class="past-events-list__list past-events-list__list-underline">
        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
          <div class=" past-events-list__items">
            <div class="past-events-list__item-year"> <?php echo $link['title']; ?></div>


            <!-- <svg class="past-events__container__links--each__text--svg" id="SideArrow_2" data-name="SideArrow 2"
              xmlns="http://www.w3.org/2000/svg" width="28.951" height="20.005" viewBox="0 0 28.951 20.005">
              <path id="Path_24" data-name="Path 24"
                d="M19.313,98.962,28.8,89.471a.515.515,0,0,0,0-.73l-9.488-9.492a.53.53,0,0,0-.728,0,.517.517,0,0,0,0,.729l8.609,8.612H.514a.516.516,0,0,0,0,1.032H27.193l-8.608,8.612a.517.517,0,0,0,0,.73A.527.527,0,0,0,19.313,98.962Z"
                transform="translate(0 -79.103)" fill="#579b43" />
            </svg> -->

            <svg class="past-events__container__links--each__text--svg" width="28" height="50" viewBox="0 0 28 50"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M0.999977 46.8456L3.34998 49.1956L27.2001 25.3042L2.34998 0.45416L-2.45546e-05 2.80411L22.4834 25.3042L0.999977 46.8456Z"
                fill="#000" />
            </svg>




          </div>
        </a>
      </li>
      <?php endforeach;?>
    </ul>
    <?php endif; ?>
  </div>
</div>