// This form code below creates a alternative select tags where you can add css to the option tag.
// Iterate over each select element
var formIndustry, formState, formCountry;
jQuery('select').each(function () {
  // Cache the number of options
  var jQuerythis = jQuery(this),
    numberOfOptions = jQuery(this).children('option').length;

  // Hides the select element
  jQuerythis.addClass('s-hidden');

  // Wrap the select element in a div
  jQuerythis.wrap('<div class="select"></div>');

  // Insert a styled div to sit over the top of the hidden select element
  jQuerythis.after('<div class="styledSelect"></div>');

  // Cache the styled div
  var jQuerystyledSelect = jQuerythis.next('div.styledSelect');

  // Show the first select option in the styled div
  jQuerystyledSelect.text(jQuerythis.children('option').eq(0).text());

  // Insert an unordered list after the styled div and also cache the list
  var jQuerylist = jQuery('<ul />', {
    class: 'options'
  }).insertAfter(jQuerystyledSelect);

  // Insert a list item into the unordered list for each select option
  for (var i = 0; i < numberOfOptions; i++) {
    if (i > 0) {
      jQuery('<li />', {
        text: jQuerythis.children('option').eq(i).text().toLowerCase(),
        rel: jQuerythis.children('option').eq(i).data('type'),
        'data-filter': jQuerythis.children('option').eq(i).data('filter')
      }).appendTo(jQuerylist);
    }
  }

  // Cache the list items
  var jQuerylistItems = jQuerylist.children('li');

  // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
  jQuerystyledSelect.click(function (e) {
    e.stopPropagation();
    jQuery('div.styledSelect.active').each(function () {
      jQuery(this).removeClass('active').next('ul.options').hide();
    });
    jQuery(this).toggleClass('active').next('ul.options').toggle();
  });

  // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
  // Updates the select element to have the value of the equivalent option
  jQuerylistItems.click(function (e) {
    e.stopPropagation();
    jQuerystyledSelect.text(jQuery(this).text()).removeClass('active');
    jQuerythis.val(jQuery(this).attr('rel'));

    var selectType = jQuery(this).attr('rel');
    if (selectType == 'country') {
      formCountry = jQuery(this).text();

      if (jQuery('.state-form-field').hasClass('always-hide')) {
        jQuery('.state-form-field').removeClass('always-hide');
      }

      if (formCountry.toLowerCase() == 'united states') {
        jQuery('li[data-filter="united states"]').show();
        jQuery('li[data-filter="canada"]').hide();

        document.getElementById('field100').checked = true;
      } else if (formCountry.toLowerCase() == 'canada') {
        jQuery('li[data-filter="united states"]').hide();
        jQuery('li[data-filter="canada"]').show();
      } else {
        jQuery('.state-form-field').addClass('always-hide');

        document.getElementById('field100').checked = false;
      }
    } else if (selectType == 'state') {
      formState = jQuery(this).text();
    } else if (selectType == 'industry') {
      formIndustry = jQuery(this).text();
    }

    jQuerylist.hide();
    /* alert(jQuerythis.val()); Uncomment this for demonstration! */
  });

  // Hides the unordered list when clicking outside of it
  jQuery(document).click(function () {
    jQuerystyledSelect.removeClass('active');
    jQuerylist.hide();
  });
});

// Form Start Field Input Tagging

function formStart() {
  const formChange = {
    firstInput: false
  };
  let formId = jQuery('#fe12864').val().trim();
  let formType = jQuery('#fe12868').val().trim();
  jQuery('#fe14631').on('change', function () {
    if (formChange.firstInput == false) {
      formChange.firstInput = true;
      utag.link({
        event_name: 'lead_form_start',
        form_name: formId,
        form_id: formId,
        form_type: formType+'|Standalone'
      });
    }
  });
}
