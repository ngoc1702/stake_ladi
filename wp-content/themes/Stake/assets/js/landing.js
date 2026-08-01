(function () {
  'use strict';

  document.querySelectorAll('#main-landing a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (event) {
      var target = link.getAttribute('href');
      if (!target || target === '#') return;
      var section = document.querySelector(target);
      if (!section) return;
      event.preventDefault();
      section.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  var landing = document.querySelector('#main-landing');
  var faq = document.querySelector('#main-landing .stake-faq-section');
  var footer = document.querySelector('#main-landing .stake-site-footer');
  if (landing && faq) landing.appendChild(faq);
  if (landing && footer) landing.appendChild(footer);

  document.querySelectorAll('#main-landing .stake-faq-item button').forEach(function (button) {
    button.addEventListener('click', function () {
      var expanded = button.getAttribute('aria-expanded') === 'true';
      var answer = document.getElementById(button.getAttribute('aria-controls'));
      button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if (answer) answer.hidden = expanded;
    });
  });
})();
