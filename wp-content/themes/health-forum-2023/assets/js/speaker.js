let speakerDay = 1;

function showSpeakers(speakerDay) {
  jQuery('.speakers__multiday').hide();
  jQuery('.speaker-day-' + speakerDay).show();
}
showSpeakers(speakerDay);

// View More or Less

jQuery('.speakers__bar-view').on('click', function () {
  let speakerViewText = jQuery(this).children('p').text();

  if (speakerViewText == 'View All') {
    jQuery(this).children('p').text('View Less');
    jQuery(this).children('span').toggleClass('button-up');

    jQuery([document.documentElement, document.body]).animate(
      {
        scrollTop:
          jQuery(this).parent().find('.speakers__grid:last-child').offset()
            .top + 300
      },
      800
    );
  } else if (speakerViewText == 'View Less') {
    jQuery(this).children('p').text('View All');
    jQuery(this).children('span').toggleClass('button-up');

    jQuery([document.documentElement, document.body]).animate(
      {
        scrollTop:
          jQuery(this).parent().find('.speakers__card').first().offset().top -
          400
      },
      800
    );
  }

  let countspeaker = jQuery('.speakers__grid').data('count');

  jQuery(this).parent().children('.speakers__grid');

  jQuery(this)
    .parent()
    .find('.speakers__grid div:nth-child(n+' + countspeaker + ')')
    .toggleClass('hidden');
});