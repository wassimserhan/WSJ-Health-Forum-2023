jQuery(document).ready(function () {
  let modalUrl = window.location.href;
  let modalUrlName = modalUrl.split('/').pop();
  if (window.location.href.indexOf('#speakers') != -1) {
    jQuery('#speakers a').each(function () {
      let speakerSlug = jQuery(this).attr('href').split('/').pop();
      if (speakerSlug == modalUrlName) {
        var itemName = jQuery(this).parent().find('.modal__name').text();
        var itemLink = jQuery(this).parent().find('.modal__link').attr('href');
        var itemLinkText = jQuery(this).parent().find('.modal__link').text();
        var itemTitle = jQuery(this).parent().find('.modal__title').text();
        var itemCompany = jQuery(this).parent().find('.modal__company').text();
        var itemExtraTitle = jQuery(this)
          .parent()
          .find('.modal__extra-title')
          .text();
        var itemExtraCompany = jQuery(this)
          .parent()
          .find('.modal__extra-company')
          .text();
        var itemImage = jQuery(this).parent().find('.modal__image').data('src');
        var itemBio = jQuery(this).parent().find('.modal__bio').text();

        jQuery('#modal__image').attr('src', itemImage);
        jQuery('#modal__image').attr('alt', itemName);

        jQuery('#modal__name').html(itemName);
        jQuery('#modal__link').attr('href', itemLink);
        jQuery('#modal__link').html(itemLinkText);
        jQuery('#modal__title').html(itemTitle);
        jQuery('#modal__company').html(itemCompany);
        jQuery('#modal__extra-title').html(itemExtraTitle);
        jQuery('#modal__extra-company').html(itemExtraCompany);
        jQuery('#modal__bio').html(itemBio);

        // Show the modal popup
        jQuery('.modal').addClass('modal--open');
        jQuery('body').addClass('body-open');
        modalOpen = true;
        modalClick += 1;
      }
    });
  }
});

jQuery(document).ready(function () {
  let modalUrl = window.location.href;
  let modalUrlName = modalUrl.split('/').pop();
  if (window.location.href.indexOf('#sponsors') != -1) {
    jQuery('#sponsors a').each(function () {
      let speakerSlug = jQuery(this).attr('href').split('/').pop();
      if (speakerSlug == modalUrlName) {
        var itemName = jQuery(this).parent().find('.modal__name').text();
        var itemLink = jQuery(this).parent().find('.modal__link').attr('href');
        var itemLinkText = jQuery(this).parent().find('.modal__link').text();
        var itemTitle = jQuery(this).parent().find('.modal__title').text();
        var itemCompany = jQuery(this).parent().find('.modal__company').text();
        var itemImage = jQuery(this).parent().find('.modal__image').data('src');
        var itemBio = jQuery(this).parent().find('.modal__bio').text();

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
      }
    });
  }
});
