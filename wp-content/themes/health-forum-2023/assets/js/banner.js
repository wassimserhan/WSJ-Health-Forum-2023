// // countdown

const banner = document.getElementById('banner');
const countdownBanner = document.getElementById('countdown-banner');

const days = document.getElementById('days');
const hours = document.getElementById('hours');
const minutes = document.getElementById('minutes');
const seconds = document.getElementById('seconds');
const countdown = document.getElementById('countdown');
const year = document.getElementById('year');

const currentYear = new Date().getFullYear();

if (countdownBanner != null) {
  const newYearTime = new Date(banner.dataset.countdown);

  // // Set background year
  year.innerText = currentYear + 1;

  // // Update countdown time

  function updateCountdown() {
    const currentTime = new Date();
    const diff = newYearTime - currentTime;

    const d = Math.floor(diff / 1000 / 60 / 60 / 24);
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    //   // Add values to DOM
    days.innerHTML = d;
    hours.innerHTML = h < 10 ? '0' + h : h;
    minutes.innerHTML = m < 10 ? '0' + m : m;
    seconds.innerHTML = s < 10 ? '0' + s : s;

    if (diff <= 0) {
      banner.style.display = 'none';
    }
  }

  // // Run every second
  setInterval(updateCountdown, 1000);
}

// Close Banner
jQuery('.banner--close').on('click', function () {
  jQuery('.banner').css({
    position: 'initial'
  });
});

// Remove close (x) when banner is not bottom 0
jQuery(window).scroll(function () {
  var bottomBanner = jQuery('.banner');
  if (bottomBanner.length>0) {
    var a = bottomBanner.offset().top;
    var b = bottomBanner.height();
    var c = jQuery(window).height();
    var d = jQuery(window).scrollTop();
    if (c + d > a + b) {
      //bottom of #mydiv has just become visible
      jQuery('.banner--close').addClass('hidden');
      bottomBanner.removeClass('banner--sticky');
    } else {
      jQuery('.banner--close').removeClass('hidden');
      bottomBanner.addClass('banner--sticky');
    }
  }

});
