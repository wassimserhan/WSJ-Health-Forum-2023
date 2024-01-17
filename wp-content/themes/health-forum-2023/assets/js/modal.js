// Modal

jQuery(document).ready(function () {
  jQuery('.speakers__card, .sponsors__card').on('click', function () {
    var itemName = jQuery(this).find('.modal__name').text();
    var itemLink = jQuery(this).find('.modal__link').attr('href');
    var itemLinkText = jQuery(this).find('.modal__link').text();
    var itemTitle = jQuery(this).find('.modal__title').text();
    var itemCompany = jQuery(this).find('.modal__company').text();
    var itemImage = jQuery(this).find('.modal__image').data('src');
    var itemBio = jQuery(this).find('.modal__bio').text();

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
    // jQuery('#speaker-modal-content img:last-child').remove();
    jQuery('body').removeClass('body-open');
    jQuery('.modal').removeClass('modal--open');
  });
});
