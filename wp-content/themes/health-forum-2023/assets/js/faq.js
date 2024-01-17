const accordionsFaq = document.querySelectorAll('.accordion-faq');

const openAccordionFaq = accordion => {
  const content = accordion.querySelector('.accordion-faq__content');
  accordion.classList.add('accordion-faq__active');
  content.style.maxHeight = content.scrollHeight + 5 + 'px';
};

const closeAccordionFaq = accordion => {
  const content = accordion.querySelector('.accordion-faq__content');
  accordion.classList.remove('accordion-faq__active');
  content.style.maxHeight = null;
  content.style.paddingTop = null;
};

accordionsFaq.forEach(accordion => {
  const intro = accordion.querySelector('.accordion-faq__wrapper');
  const content = accordion.querySelector('.accordion-faq__content');

  intro.onclick = () => {
    if (content.style.maxHeight) {
      closeAccordionFaq(accordion);
    } else {
      accordionsFaq.forEach(accordion => closeAccordionFaq(accordion));
      openAccordionFaq(accordion);
    }
  };
});