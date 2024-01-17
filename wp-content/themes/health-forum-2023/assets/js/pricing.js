var priceTier = 0;

function showPricing() {
  jQuery('.pricing-card').hide();
  jQuery('.pricing-card:eq(' + priceTier + ')').show();
}
showPricing();

// Desktop Tier Change
jQuery('.pricing-bar__option').click(function () {
  priceTier = jQuery(this).index('.pricing-bar__option');
  showPricing();
});

//Mobile Tier Change
jQuery('.custom-option').on('click', function () {
  priceTier = jQuery(this).attr('value');
  showPricing();
});

//Desktop Active State
jQuery('.pricing-bar__option:eq(' + priceTier + ')').toggleClass(
  'pricing-bar__option--active'
);
jQuery('.pricing-bar__option').on('click', function () {
  jQuery(this).addClass('pricing-bar__option--active');
  jQuery('.pricing-bar__option')
    .not(this)
    .removeClass('pricing-bar__option--active');
});

const selectWrapper = document.querySelector('.custom-select-wrapper');

if (selectWrapper) {
  selectWrapper.addEventListener('click', function () {
    this.querySelector('.custom-select').classList.toggle('open');
  });

  for (const option of document.querySelectorAll('.custom-option')) {
    option.addEventListener('click', function () {
      if (!this.classList.contains('selected')) {
        this.parentNode
          .querySelector('.custom-option.selected')
          .classList.remove('selected');
        this.classList.add('selected');
        this.closest('.custom-select').querySelector(
          '.custom-select__trigger span'
        ).textContent = this.textContent;
      }
    });
  }
}
