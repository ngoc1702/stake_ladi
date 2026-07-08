(function () {
  function ready(callback) {
    if (document.readyState !== 'loading') {
      callback();
      return;
    }

    document.addEventListener('DOMContentLoaded', callback);
  }

  ready(function () {
    var landing = document.querySelector('.student-landing');

    if (!landing) {
      return;
    }

    landing.querySelectorAll('a[href^="#"]').forEach(function (link) {
      link.addEventListener('click', function (event) {
        var targetId = link.getAttribute('href');
        var target = targetId && targetId !== '#' ? document.querySelector(targetId) : null;

        if (!target) {
          return;
        }

        event.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    landing.querySelectorAll('a[href]').forEach(function (link) {
      var href = link.getAttribute('href') || '';

      if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:')) {
        return;
      }

      if (!link.getAttribute('target')) {
        link.setAttribute('target', '_blank');
      }

      if (!link.getAttribute('rel')) {
        link.setAttribute('rel', 'noopener noreferrer');
      }
    });

    (function initRevealAnimations() {
      var selectors = [
        '.student-hero__copy h1',
        '.student-hero__copy p',
        '.student-hero__media',
        '.student-section-heading',
        '.student-about-card',
        '.student-program__media',
        '.student-benefits',
        '.student-testimonial',
        '.student-start-card',
        '.student-event',
        '.student-journey-step',
        '.student-footer__inner > div'
      ];
      var revealItems = [];
      var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      selectors.forEach(function (selector) {
        landing.querySelectorAll(selector).forEach(function (element, index) {
          if (element.classList.contains('student-reveal')) {
            return;
          }

          element.classList.add('student-reveal');
          element.style.setProperty('--student-reveal-delay', Math.min((index % 5) * 70, 280) + 'ms');
          revealItems.push(element);
        });
      });

      if (!revealItems.length) {
        return;
      }

      if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach(function (element) {
          element.classList.add('is-visible');
        });
        return;
      }

      var revealObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }

          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        });
      }, {
        rootMargin: '0px 0px -8% 0px',
        threshold: 0.12
      });

      revealItems.forEach(function (element) {
        revealObserver.observe(element);
      });
    }());

    landing.querySelectorAll('[data-student-testimonials]').forEach(function (slider) {
      var track = slider.querySelector('[data-student-testimonial-track]');
      var slides = slider.querySelectorAll('[data-student-slide]');
      var dots = slider.querySelectorAll('[data-student-dot]');
      var activeIndex = 0;
      var touchStartX = 0;

      if (!track || !slides.length) {
        return;
      }

      function showSlide(index) {
        var nextIndex = parseInt(index, 10);

        if (Number.isNaN(nextIndex)) {
          nextIndex = 0;
        }

        if (nextIndex < 0) {
          nextIndex = slides.length - 1;
        }

        if (nextIndex >= slides.length) {
          nextIndex = 0;
        }

        activeIndex = nextIndex;
        track.style.transform = 'translateX(-' + (activeIndex * 100) + '%)';

        slides.forEach(function (slide) {
          slide.classList.toggle('is-active', slide.getAttribute('data-student-slide') === String(activeIndex));
        });

        dots.forEach(function (dot) {
          var isActive = dot.getAttribute('data-student-dot') === String(activeIndex);
          dot.classList.toggle('is-active', isActive);
          dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });
      }

      dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
          showSlide(dot.getAttribute('data-student-dot'));
        });
      });

      slider.addEventListener('touchstart', function (event) {
        touchStartX = event.touches[0].clientX;
      }, { passive: true });

      slider.addEventListener('touchend', function (event) {
        var touchEndX = event.changedTouches[0].clientX;
        var delta = touchEndX - touchStartX;

        if (Math.abs(delta) < 48) {
          return;
        }

        showSlide(activeIndex + (delta < 0 ? 1 : -1));
      }, { passive: true });

      showSlide(0);
    });
  });
}());
