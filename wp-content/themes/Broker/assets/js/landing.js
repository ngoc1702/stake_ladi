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

    function updateStickyHeight() {
      if (!sticky) {
        document.documentElement.style.removeProperty('--hosting-sticky-height');
        return;
      }

      document.documentElement.style.setProperty('--hosting-sticky-height', sticky.offsetHeight + 'px');
    }

    updateStickyHeight();
    window.addEventListener('resize', updateStickyHeight);

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
  });
}());
