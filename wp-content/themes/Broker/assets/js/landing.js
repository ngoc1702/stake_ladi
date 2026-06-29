(function () {
  function ready(callback) {
    if (document.readyState !== 'loading') {
      callback();
      return;
    }

    document.addEventListener('DOMContentLoaded', callback);
  }

  ready(function () {
    var popup = document.querySelector('[data-lp-popup]');
    var copyButtons = document.querySelectorAll('[data-copy-code]');

    copyButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var code = button.getAttribute('data-copy-code') || button.textContent.trim();

        if (!navigator.clipboard || !code) {
          return;
        }

        navigator.clipboard.writeText(code).then(function () {
          button.classList.add('is-copied');
          window.setTimeout(function () {
            button.classList.remove('is-copied');
          }, 1200);
        });
      });
    });

    if (!popup) {
      return;
    }

    var closeButtons = popup.querySelectorAll('[data-lp-popup-close]');
    var close = function () {
      popup.classList.remove('is-open');
      popup.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('lp-popup-open');
    };
    var open = function () {
      popup.classList.add('is-open');
      popup.setAttribute('aria-hidden', 'false');
      document.body.classList.add('lp-popup-open');
    };

    closeButtons.forEach(function (button) {
      button.addEventListener('click', close);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && popup.classList.contains('is-open')) {
        close();
      }
    });

    window.setTimeout(open, 250);
  });
}());
