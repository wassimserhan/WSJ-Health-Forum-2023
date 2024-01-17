// Detect all clicks on the document
var modalOpen = false;
var modalClick = 0;
document.addEventListener('click', function (event) {
  // If user clicks inside the element, do nothing
  if (event.target.closest('.calendar')) {
  } else {
    jQuery('.calendar__body').addClass('always-hide');
  }

  // close the modals if clicked outside it's elements 
  if (modalOpen && modalClick == 2) {
    if (event.target.closest('.modal__content')) {
    } else {
      jQuery('body').removeClass('body-open');
      jQuery('.modal').removeClass('modal--open');
      modalClick = 0;

      history.pushState(
        '',
        document.title,
        window.location.pathname + window.location.search
      );
    }
  } else {
    if (jQuery('body').hasClass('body-open')) {
      modalClick = 2;
    }
  }
});

// close all popups if ESC key is pressed 
document.onkeydown = function(event) {
  event = event || window.event;
  var isEscape = false;
  if ("key" in event) {
      isEscape = (event.key === "Escape" || event.key === "Esc");
  } else {
      isEscape = (event.keyCode === 27);
  }
  if (isEscape) {
    jQuery('.calendar__body').addClass('always-hide');
    if (modalOpen && modalClick == 2) {
      if (event.target.closest('.modal__content')) {
      } else {
        jQuery('body').removeClass('body-open');
        jQuery('.modal').removeClass('modal--open');
        modalClick = 0;
  
        history.pushState(
          '',
          document.title,
          window.location.pathname + window.location.search
        );
      }
    } else {
      if (jQuery('body').hasClass('body-open')) {
        modalClick = 2;
      }
    }
  }
};
