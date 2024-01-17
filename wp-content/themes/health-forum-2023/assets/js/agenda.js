let agendaDiv = 0; //Agenda Posts
let agendaDay = 1; // Days

let agendaCount = jQuery('.agenda__multiday').data('days');

// View More or Less

jQuery('.bar-view').on('click', function () {
  let agendaViewText = jQuery(this).children('p').text();

  if (agendaViewText == 'View All') {
    jQuery(this).children('p').text('View Less');
    jQuery(this).children('span').toggleClass('button-up');

    jQuery(this)
      .parent()
      .children('.event')
      .eq(4)
      .nextAll('.event')
      .toggleClass('hidden');

    jQuery([document.documentElement, document.body]).animate(
      {
        scrollTop:
          jQuery(this).parent().children('.event').last().offset().top - 300
      },
      800
    );
  } else if (agendaViewText == 'View Less') {
    jQuery(this).children('p').text('View All');
    jQuery(this).children('span').toggleClass('button-up');

    jQuery(this)
      .parent()
      .children('.event')
      .eq(4)
      .nextAll('.event')
      .toggleClass('hidden');
    jQuery([document.documentElement, document.body]).animate(
      {
        scrollTop:
          jQuery(this).parent().children('.event').first().offset().top - 400
      },
      800
    );
  }
});

function showAgenda(agendaDiv) {
  jQuery('.agenda__multiday').hide();
  jQuery('.agenda__multiday:eq(' + agendaDiv + ')').show();
}

showAgenda(agendaDiv);

jQuery('.event__title--text').on('click', function (e) {
  var contentBlock = jQuery(this).parent().siblings('.event__detail-block');
  const content = e.currentTarget.parentElement.nextElementSibling;

  if (contentBlock.hasClass('hide-me')) {
    content.style.maxHeight = content.scrollHeight + 5 + 'px';
  } else {
    contentBlock.css({ maxHeight: '0' });
  }
  jQuery(this).parent().siblings('.event__detail-block').toggleClass('hide-me');

  jQuery(this).find('.event__title--text__h3').toggleClass('collapsed');

  jQuery(this).parent().siblings('.plus').toggleClass('plus-active');
});

jQuery('.event__title--wrapper .plus').on('click', function (e) {
  var contentBlock = jQuery(this).siblings('.event__detail-block');
  const content = e.currentTarget.parentElement.children[1];

  if (contentBlock.hasClass('hide-me')) {
    content.style.maxHeight = content.scrollHeight + 5 + 'px';
  } else {
    contentBlock.css({ maxHeight: '0' });
  }
  jQuery(this)
    .parent()
    .find('.event__title--text__h3')
    .toggleClass('collapsed');
  jQuery(this).siblings('.event__detail-block').toggleClass('hide-me');

  jQuery(this).toggleClass('plus-active');
});

jQuery('.calendar__title').on('click', function (event) {
  var thisCalendarBody = jQuery(this)
    .siblings('.calendar__body')
    .hasClass('always-hide');

  if (thisCalendarBody == false) {
  } else {
    jQuery('.calendar__body').addClass('always-hide');
  }

  jQuery(this).siblings('.calendar__body').toggleClass('always-hide');
});
