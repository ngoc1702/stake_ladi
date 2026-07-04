(function () {
  function ready(callback) {
    if (document.readyState !== 'loading') {
      callback();
      return;
    }

    document.addEventListener('DOMContentLoaded', callback);
  }

  ready(function () {
    var sticky = document.querySelector('[data-hosting-sticky]');
    var popup = document.querySelector('[data-hosting-popup]');
    var popupCloseButtons = popup ? popup.querySelectorAll('[data-hosting-popup-close]') : [];

    function updateStickyHeight() {
      if (!sticky) {
        document.documentElement.style.removeProperty('--hosting-sticky-height');
        return;
      }

      document.documentElement.style.setProperty('--hosting-sticky-height', sticky.offsetHeight + 'px');
    }

    updateStickyHeight();
    window.addEventListener('resize', updateStickyHeight);

    function openPopup() {
      if (!popup) {
        return;
      }

      popup.classList.add('is-visible');
      popup.setAttribute('aria-hidden', 'false');
      document.body.classList.add('hosting-popup-open');

      var closeButton = popup.querySelector('.hosting-bonus-popup__close');

      if (closeButton) {
        closeButton.focus({ preventScroll: true });
      }
    }

    function closePopup() {
      if (!popup) {
        return;
      }

      popup.classList.remove('is-visible');
      popup.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('hosting-popup-open');
    }

    if (popup) {
      window.setTimeout(openPopup, 180);

      popupCloseButtons.forEach(function (button) {
        button.addEventListener('click', closePopup);
      });

      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && popup.classList.contains('is-visible')) {
          closePopup();
        }
      });
    }

    document.querySelectorAll('.hosting-landing a[href^="#"]').forEach(function (link) {
      link.addEventListener('click', function (event) {
        var targetId = link.getAttribute('href');
        var target;

        if (!targetId || targetId === '#') {
          return;
        }

        target = document.querySelector(targetId);

        if (!target) {
          return;
        }

        event.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    document.querySelectorAll('.hosting-landing a[href]').forEach(function (link) {
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
  });
}());
