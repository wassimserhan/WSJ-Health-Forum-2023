jQuery(document).ready(function () {
  var headerHeight = jQuery('header').height();

  jQuery('a')
    .not('#speakers a, #sponsors a, #program a')
    .on('click', trackingCode);

  function trackingCode() {
    var href = jQuery(this).attr('href');
    var anchorTag = href.substr(href.indexOf('#'));

    var str = window.location.href.slice(window.location.href.indexOf('?') + 1);
    var url = window.location.href.split(/[?#]/)[0];
    var querystring = str.split('?').pop().split('#')[0];

    var baseUrl;
    var getUrl = window.location;

    const pathname = window.location.pathname;
    const pathnameParts = pathname ? pathname.split('/').filter(Boolean) : '';
    const subPage = pathnameParts ? pathnameParts.slice(1).join('/') : '';

    if (
      window.location.hostname == '127.0.0.1' ||
      window.location.hostname == 'localhost'
    ) {
      if (location.pathname.length > 37) {
        baseUrl =
          getUrl.protocol +
          '//' +
          getUrl.host +
          '/' +
          getUrl.pathname.split('/')[1] +
          '/' +
          getUrl.pathname.split('/')[2];
      } else {
        baseUrl = url;
      }
    } else if (
      window.location.hostname == 'djadminstag.dowjones.com' ||
      window.location.hostname == 'djadmin.dowjones.com'
    ) {
      if (subPage) {
        baseUrl =
          getUrl.protocol +
          '//' +
          getUrl.host +
          '/' +
          getUrl.pathname.split('/')[1];
      } else {
        baseUrl = url;
      }
    } else {
      if (location.pathname.substring(1)) {
        baseUrl = window.location.origin;
      } else {
        baseUrl = url;
      }
    }

    if (href && querystring) {
      if (querystring.indexOf('=') >= 0) {
        if (href.indexOf('#') < 0) {
          jQuery(this).attr('href', href + '?' + querystring);
        } else if (href.indexOf('#') >= 0) {
          jQuery(this).attr('href', baseUrl + '?' + querystring + anchorTag);
        } else {
          jQuery(this).attr('href', href + '?' + querystring);
        }
      } else if (href.indexOf('#') >= 0) {
        jQuery(this).attr('href', baseUrl + anchorTag);
      }
    }

    var targetSelector = this.hash;
    var $target = jQuery(targetSelector);

    jQuery('html, body')
      .not('#speakers a, #sponsors a, #program a')
      .animate(
        {
          scrollTop: $target.offset().top - headerHeight
        },
        {
          duration: 2000,
          step: function (now, fx) {
            var newOffset = $target.offset().top - headerHeight;
            if (fx.end !== newOffset) fx.end = newOffset;
          }
        }
      );
  }

  const hamburger = document.querySelector('.hamburger');
  const body = document.getElementsByTagName('body')[0];
  const navItems = document.querySelectorAll('.nav__items');
  const dropdown = document.querySelector('.nav__dropdown');
  const ctaDropdown = document.querySelector('.btn--header--dropdown');

  function menu() {
    if (dropdown.style.display === 'grid') {
      dropdown.style.display = 'none';
      hamburger.classList.remove('is-active');
    } else {
      dropdown.style.display = 'grid';
      hamburger.classList.add('is-active');
    }
  }

  jQuery(window).on('resize', function () {
    var win = jQuery(this); //this = window
    if (win.width() >= 1201) {
      dropdown.style.display = 'none';
      hamburger.classList.remove('is-active');
    }
  });

  hamburger.addEventListener('click', menu);

  navItems.forEach(item => {
    item.addEventListener('click', function () {
      dropdown.style.display = 'none';
      hamburger.classList.remove('is-active');
    });
    body.classList.remove('fixed-postion');
  });

  if (ctaDropdown) {
    ctaDropdown.addEventListener('click', function () {
      dropdown.style.display = 'none';
      hamburger.classList.remove('is-active');
      body.classList.remove('fixed-postion');
    });
  }
});