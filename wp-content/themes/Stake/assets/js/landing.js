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
  var footer = document.querySelector('#main-landing .stake-site-footer');
  if (landing && footer) landing.appendChild(footer);

  document.querySelectorAll('#main-landing .stake-faq-item button').forEach(function (button) {
    button.addEventListener('click', function () {
      var expanded = button.getAttribute('aria-expanded') === 'true';
      var answer = document.getElementById(button.getAttribute('aria-controls'));
      button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if (answer) answer.hidden = expanded;
    });
  });

  document.querySelectorAll('#main-landing [data-game-slider]').forEach(function (slider) {
    var track = slider.querySelector('[data-slider-track]');
    var previous = slider.querySelector('[data-slider-prev]');
    var next = slider.querySelector('[data-slider-next]');
    if (!track || !previous || !next) return;

    function stepSize() {
      var card = track.querySelector('.stake-game');
      if (!card) return track.clientWidth;
      var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
      return (card.getBoundingClientRect().width + gap) * Math.max(1, Math.floor(track.clientWidth / (card.getBoundingClientRect().width + gap)));
    }

    function updateArrows() {
      var maxScroll = track.scrollWidth - track.clientWidth;
      previous.disabled = track.scrollLeft <= 2;
      next.disabled = track.scrollLeft >= maxScroll - 2;
    }

    previous.addEventListener('click', function () {
      track.scrollBy({ left: -stepSize(), behavior: 'smooth' });
    });
    next.addEventListener('click', function () {
      track.scrollBy({ left: stepSize(), behavior: 'smooth' });
    });
    track.addEventListener('scroll', updateArrows, { passive: true });
    window.addEventListener('resize', updateArrows);
    updateArrows();
  });

  document.querySelectorAll('#main-landing [data-testimonial-slider]').forEach(function (slider) {
    var track = slider.querySelector('[data-testimonial-track]');
    var previous = slider.querySelector('[data-testimonial-prev]');
    var next = slider.querySelector('[data-testimonial-next]');
    if (!track || !previous || !next) return;

    function stepSize() {
      var card = track.querySelector('.stake-testimonial-card');
      if (!card) return track.clientWidth;
      var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
      return card.getBoundingClientRect().width + gap;
    }

    function updateArrows() {
      var maxScroll = track.scrollWidth - track.clientWidth;
      previous.disabled = track.scrollLeft <= 2;
      next.disabled = track.scrollLeft >= maxScroll - 2;
    }

    previous.addEventListener('click', function () {
      track.scrollBy({ left: -stepSize(), behavior: 'smooth' });
    });
    next.addEventListener('click', function () {
      track.scrollBy({ left: stepSize(), behavior: 'smooth' });
    });
    track.addEventListener('scroll', updateArrows, { passive: true });
    window.addEventListener('resize', updateArrows);
    updateArrows();
  });
})();
