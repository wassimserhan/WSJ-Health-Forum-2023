'use strict';

window.addEventListener('DOMContentLoaded', () => {
  //   const navLinks = document.querySelectorAll(".js-nav-link");
  //   const sectionNames = [...navLinks].map((navLink) =>
  //     navLink.getAttribute("href")
  //   );
  //   const sections = sectionNames.map((section) =>
  //     document.querySelector(section)
  //   );
  //   highlightNavItems(sections, navLinks);

  const elementsToFadeIn = document.querySelectorAll('.js-animate');
  addClassWhenInView(elementsToFadeIn, 'fadeIn');
});

// Highlights current section in hero nav
// const highlightNavItems = (sections, navItems) => {
//   if (!!window.IntersectionObserver && window.screen.width > 759) {
//     const observer = new IntersectionObserver(
//       function (entries, _) {
//         entries.forEach((entry) => {
//           if (entry.isIntersecting) {
//             navItems.forEach((navItem) =>
//               navItem.classList.remove("hero__nav--active")
//             );
//             navItems[sections.indexOf(entry.target)].classList.add(
//               "hero__nav--active"
//             );
//           }
//         });
//       },
//       { rootMargin: "0px 0px 0px 0px" }
//     );
//     sections.forEach((el) => observer.observe(el));
//   }
// };

// Add class to elements when they are in view
const addClassWhenInView = (elements, classToAdd) => {
  if (!!window.IntersectionObserver) {
    const observer = new IntersectionObserver(
      function (entries, observer) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add(classToAdd);
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: '0px 0px -10px 0px' }
    );
    elements.forEach(el => observer.observe(el));
  } else {
    elements.forEach(el => el.classList.add(classToAdd));
  }
};
