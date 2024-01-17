jQuery(document).ready(function () {
  var pastEventsDiv = jQuery('.carousel-past-events');

  if (pastEventsDiv.length > 0) {
    var carouselPastEvents = pastEventsDiv.flickity({
      fullscreen: true,
      lazyLoad: 2,
      cellAlign: 'left',
      contain: true,
      initialIndex: 0,
      dragThreshold: 10,
      adaptiveHeight: true,
      arrowShape: {
        x0: 20,
        x1: 65,
        y1: 45,
        x2: 70,
        y2: 40,
        x3: 30
      }
    });

    var flktyPastEvents = carouselPastEvents.data('flickity');
  }

  var testimonialDiv = jQuery('.carousel-testimonial');

  if (testimonialDiv.length > 0) {
    var carouselTestimonial = testimonialDiv.flickity({
      fullscreen: true,
      lazyLoad: 2,
      cellAlign: 'center',
      contain: true,
      initialIndex: 0,
      dragThreshold: 10,
      adaptiveHeight: true,
      arrowShape: {
        x0: 20,
        x1: 65,
        y1: 45,
        x2: 70,
        y2: 40,
        x3: 30
      }
    });

    var flktyTestimonial = carouselTestimonial.data('flickity');
  }

  var gallerySlidesDiv = jQuery('.carousel-gallery-slides');

  if (gallerySlidesDiv.length > 0) {
    var carouselGallerySlides = gallerySlidesDiv.flickity({
      lazyLoad: 2,
      cellAlign: 'center',
      contain: true,
      initialIndex: 0,
      dragThreshold: 10,
      adaptiveHeight: true,
      groupCells: true,
      arrowShape: {
        x0: 20,
        x1: 65,
        y1: 45,
        x2: 70,
        y2: 40,
        x3: 30
      }
    });

    var flktyGallerySlides = carouselGallerySlides.data('flickity');
  }

  var eventHighlightsDiv = jQuery('.carousel-main');

  if (eventHighlightsDiv.length > 0) {
    var carouselEventHighlights = eventHighlightsDiv.flickity({
      fullscreen: true,
      lazyLoad: 2,
      cellAlign: 'left',
      contain: true,
      initialIndex: 0,
      dragThreshold: 10,
      adaptiveHeight: true,
      arrowShape: {
        x0: 20,
        x1: 65,
        y1: 45,
        x2: 70,
        y2: 40,
        x3: 30
      }
    });

    var flktyEventHighlights = carouselEventHighlights.data('flickity');

    var carouselEventHighlightsNav = jQuery('.carousel-nav').flickity({
      initialIndex: 0,
      asNavFor: '.carousel-main',
      contain: true,
      prevNextButtons: false
    });

    var flktyEventHighlights = carouselEventHighlightsNav.data('flickity');
    const carouselVideos = document.getElementsByTagName('video');
    const videosLength = carouselVideos.length;
    flktyEventHighlights.on('change', changeSlide);
    function changeSlide(index) {
      for (let i = 0; i < videosLength; i++) {
        carouselVideos[i].currentTime = 0;
        carouselVideos[i].pause();
      }
    }
  }
});
