// Modal

jQuery(document).ready(function () {
  // Agenda Speakers
  jQuery('.event__speaker-name').on('click', function () {
    var itemName = jQuery(this).find('.event__speaker-name__link').text();
    var itemLink = jQuery(this).find('.modal__link').attr('href');
    var itemLinkText = jQuery(this).find('.modal__link').text();
    var itemTitle = jQuery(this).siblings('.event__speaker-title').text();
    var itemCompany = jQuery(this).siblings('.event__speaker-company').text();
    var itemImage = jQuery(this).siblings('.event__speaker__image').data('src');
    var itemBio = jQuery(this).siblings('.event__speaker__bio').text();

    jQuery('#modal__image').attr('src', itemImage);
    jQuery('#modal__image').attr('alt', itemName);

    jQuery('#modal__name').html(itemName);
    jQuery('#modal__link').attr('href', itemLink);
    jQuery('#modal__link').html(itemLinkText);
    jQuery('#modal__title').html(itemTitle);
    jQuery('#modal__company').html(itemCompany);
    jQuery('#modal__bio').html(itemBio);

    // Show the modal popup
    jQuery('.modal').addClass('modal--open');
    jQuery('body').addClass('body-open');
    modalOpen = true;
    modalClick += 1;
  });

  // Agenda Sponsor Session
  jQuery('.agenda-modal-supporters').on('click', function () {
    var itemName = jQuery(this).find('.event__speaker-name__link').text();
    var itemLink = jQuery(this).find('.modal__link').attr('href');
    var itemLinkText = jQuery(this).find('.modal__link').text();
    var itemTitle = jQuery(this).find('.event__speaker-title').text();
    var itemCompany = jQuery(this).find('.event__speaker-company').text();
    var itemImage = jQuery(this).find('.event__speaker__image').data('src');
    var itemBio = jQuery(this).find('.event__speaker__bio').text();

    jQuery('#modal__image').attr('src', itemImage);
    jQuery('#modal__image').attr('alt', itemName);

    jQuery('#modal__name').html(itemName);
    jQuery('#modal__link').attr('href', itemLink);
    jQuery('#modal__link').html(itemLinkText);
    jQuery('#modal__title').html(itemTitle);
    jQuery('#modal__company').html(itemCompany);

    jQuery('#modal__bio').html(itemBio);

    // Show the modal popup
    jQuery('.modal').addClass('modal--open');
    jQuery('body').addClass('body-open');
    modalOpen = true;
    modalClick += 1;
  });

  // Agenda Sponsors
  jQuery('.agenda-modal-sponsors').on('click', function () {
    var itemName = jQuery(this).find('.event__sponsor__name').text();
    var itemLink = jQuery(this).find('.event__sponsor__link').attr('href');
    var itemLinkText = jQuery(this).find('.event__sponsor__link').text();
    var itemTitle = jQuery(this).find('.event__speaker-title').text();
    var itemCompany = jQuery(this).find('.event__speaker-company').text();
    var itemImage = jQuery(this).find('.event__sponsor__image').data('src');
    var itemBio = jQuery(this).find('.event__sponsor__bio').text();

    jQuery('#modal__image').attr('src', itemImage);
    jQuery('#modal__image').attr('alt', itemName);

    jQuery('#modal__name').html(itemName);
    jQuery('#modal__link').attr('href', itemLink);
    jQuery('#modal__link').html(itemLinkText);
    jQuery('#modal__title').html(itemTitle);
    jQuery('#modal__company').html(itemCompany);
    jQuery('#modal__bio').html(itemBio);

    // Show the modal popup
    jQuery('.modal').addClass('modal--open');
    jQuery('body').addClass('body-open');
    modalOpen = true;
    modalClick += 1;
  });

  // Click event for close button
  jQuery('.modal--close').on('click', function () {
    jQuery('body').removeClass('body-open');
    jQuery('.modal').removeClass('modal--open');

    history.pushState(
      '',
      document.title,
      window.location.pathname + window.location.search
    );
    // jQuery('#modal-content').reset();
  });
});
